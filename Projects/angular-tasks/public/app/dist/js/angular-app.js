const APP = angular.module('app', ['ui.router', 'ngResource', 'ngAnimate', 'toastr']);


APP.run(function ($http, AuthManager, $transitions, $state, $rootScope) {
    window.BASE_URL = 'http://api.angular-tasks.com/api';
    AuthManager.checkAuth();

    $transitions.onStart({}, function(transition) {
        const next = transition.to();

        const isAdmin     = next.data ? next.data.isAdmin : false;
        const requireAuth = next.data ? next.data.requiresAuth : null;

        if(isAdmin) {
            if(requireAuth === true && !AuthManager.isAuthenticatedAdmin()) {
                return $state.target('loginAdmin');
            } else if(requireAuth === false && AuthManager.isAuthenticatedAdmin()) {
                return $state.target('admin');
            } else return true;
        } else {
            if(requireAuth === true && !AuthManager.isAuthenticated()) {
                return $state.target('login');
            } else if(requireAuth === false && AuthManager.isAuthenticated()) {
                return $state.target('home');
            } else return true;
        }
    });

    $rootScope.logout = function (event) {
        event.preventDefault();
        localStorage.removeItem('token');
        localStorage.removeItem('user');
        AuthManager.checkAuth();
        $state.go('home');
    }

    $rootScope.logoutAdmin = function (event) {
        console.log(123);
        event.preventDefault();
        localStorage.removeItem('token_admin');
        localStorage.removeItem('admin');
        AuthManager.checkAuthAdmin();
        $state.go('loginAdmin');
    }
})

APP.config(['$locationProvider',  function($locationProvider) {
    $locationProvider.html5Mode(true);
}]);


APP.config(function Config($httpProvider) {
        $httpProvider.interceptors.push(['$injector', '$q', function($injector, $q) {
            // let state  = $injector.get('$state');
            return {
                'request': function(config) {
                    const tokenName = (config.meta && config.meta.adminRoute) ? 'token_admin' : 'token';
                    config.headers['Authorization'] = localStorage.getItem(tokenName);
                    return config;
                },

                'response': function(response) {
                    // same as above
                    return response;
                },
                'responseError': function (rejection) {
                    const toastr = $injector.get('toastr');
                    if(rejection.status === 401) {
                        toastr.error('Unauthorized');
                        // state.go('login');
                    }

                    return $q.reject(rejection);
                }
            };
        }]);
    });


APP.directive('pagination', function() {
    return {
        restrict: 'E',
        replace: true,
        scope: {
            total       : '=',
            currentPage : '=',
            perPage     : '=',
            action      : '='
        },
        templateUrl: 'modules/_partials/_pagination.html',
        link: function(scope, element, attributes) {
            scope.pages = 0;
            scope.changePage = function (page) {
                scope.action(page);
            }

            scope.$watch('total', (newVal) => {
                if(newVal) {
                    scope.pages = new Array(Math.ceil(scope.total / scope.perPage));
                }
            })
        }
    };
});

angular.module('app')
    .controller('AccountIndexController', function (AuthService) {
        console.log(123);
        AuthService.me();
    });
angular.module('app')
    .controller('AuthAdminLoginController', function ($scope, AuthService, $state, AuthManager) {
        $scope.user = {};

        $scope.login = function (event) {
            event.preventDefault();
            AuthService.loginAdmin($scope.user, (res) => {
                AuthManager.setTokenAdmin(res.token);
                AuthService.meAdmin({}, (res) => {
                    localStorage.setItem('admin', JSON.stringify(res.user));
                    AuthManager.checkAuthAdmin();
                    $state.go('admin');
                })
            }, (err) => {})
        }
    });

angular.module('app')
    .controller('AdminHomeIndexController', function () {

    });
angular.module('app')
    .controller('PendingRegistrationsIndexController', function (PendingRegistrationService, $scope, toastr, AdminTeamService) {
        $scope.status = 'pending';
        $scope.selectedUser = {
            user_id : null,
            team_id : null
        };

        $scope.data = {};
        $scope.teams = [];

        AdminTeamService.get({all : true}, (res) => {
            $scope.teams = res.teams;
        });

        $scope.getData = function (page) {
            PendingRegistrationService.get({status : $scope.status, page : page}, (res) => {
                $scope.data = res.users;
            }, (err) => {})
        };

        $scope.getData();


        $scope.approve = function () {
            if(confirm('Are you sure you want approve this user?')) {
                PendingRegistrationService.approve($scope.selectedUser, (res) => {
                    toastr.success('Successfully Approved');
                    $scope.getData(1);
                }, (err) => {
                    toastr.error('Error in approving.');
                })
            }
        }

        $scope.reject = function (userID) {
            if(confirm('Are you sure you want to reject this user?')) {
                PendingRegistrationService.reject({user_id : userID}, (res) => {
                    toastr.success('Successfully Rejected.');
                    $scope.getData(1);
                }, (err) => {
                    toastr.error('Error in rejection.');
                })
            }
        }
    });
angular.module('app')
    .controller('AdminTeamIndexController', function (AdminTeamService, $scope, toastr) {
        $scope.data = {};

        $scope.getData = function (page) {
            AdminTeamService.get({page : page}, (res) => {
                $scope.data = res.teams;
            }, (err) => {})
        };

        $scope.getData();

        $scope.delete = function (teamID) {
            if(confirm('Are you sure want to delete this team?')) {
                AdminTeamService.delete({id : teamID}, (res) => {
                    toastr.success('Successfully Deleted.');
                    $scope.getData(1);
                }, (err) => {});
            }
        }
    });

angular.module('app')
    .controller('AdminTeamMembersController', function (AdminTeamService, $scope, toastr) {
        $scope.data = {};

        $scope.getData = function (page) {
            AdminTeamService.get({page : page}, (res) => {
                $scope.data = res.teams;
            }, (err) => {})
        };

        $scope.getData();

        $scope.delete = function (teamID) {
            if(confirm('Are you sure want to delete this team?')) {
                AdminTeamService.delete({id : teamID}, (res) => {
                    toastr.success('Successfully Deleted.');
                    $scope.getData(1);
                }, (err) => {});
            }
        }
    });

angular.module('app')
    .controller('AdminTeamEditController', function (AdminTeamService, $scope, toastr, $stateParams, $state) {
        $scope.isEdit = $stateParams.id > 0;

        $scope.team = {};

        if($scope.isEdit) {
            AdminTeamService.show({id : $stateParams.id}, (res) => {
                $scope.team = res.team;
            })
        }

        $scope.save = function (event) {
            event.preventDefault();

            if($scope.isEdit) {
                AdminTeamService.update($scope.team, (res) => {
                    toastr.success('Successfully Updated Team.');
                    $state.go('admin.teams');
                }, (err) => {})
            } else {
                AdminTeamService.store($scope.team, (res) => {
                    toastr.success('Successfully Created Team.');
                    $state.go('admin.teams');
                }, (err) => {})
            }
        }
    });
angular.module('app')
    .controller('AuthLoginController', function ($scope, AuthService, $state, AuthManager) {
        $scope.user = {};

        $scope.login = function (event) {
            event.preventDefault();
            AuthService.login($scope.user, (res) => {
                AuthManager.setToken(res.token);
                AuthService.me({}, (res) => {
                    localStorage.setItem('user', JSON.stringify(res.user));
                    AuthManager.checkAuth();
                    $state.go('account');
                })
            }, (err) => {})
        }
    });


angular.module('app')
    .controller('AuthRegisterController', function ($scope, AuthService) {
        $scope.days = new Array(31);
        $scope.months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $scope.years = new Array(110);
        $scope.user = {

        }
        
        $scope.register = ($event) => {
            $event.preventDefault();
            $scope.user.date_of_birth = [$scope.user.month, $scope.user.day, $scope.user.year].join(' ');
            AuthService.register($scope.user, (res) => {

            },  (err) => {

            })
        }
    });
angular.module('app')
    .controller('HomeIndexController', function () {

    });
angular.module('app')
    .config(function ($stateProvider) {
        $stateProvider
            .state({
                name: 'account',
                url: '/account',
                views: {
                    'header@': {
                        templateUrl: '/modules/_partials/_header.html',
                    },
                    'main@': {
                        templateUrl: '/modules/Account/views/index.html',
                        controller : 'AccountIndexController'
                    },
                    'footer@': {
                        templateUrl: '/modules/_partials/_footer.html',
                    }
                },
                data : {
                    requiresAuth : true
                }
            })
    });
angular.module('app')
    .config(function ($stateProvider) {
        $stateProvider
            .state({
                name: 'loginAdmin',
                url: '/admin-login',
                views: {
                    'main@': {
                        templateUrl: '/modules/admin/Auth/views/login.html',
                        controller : 'AuthAdminLoginController'
                    }
                },
                data : {
                    isAdmin      : true,
                    requiresAuth : false
                }
            })
    });
angular.module('app')
    .config(function ($stateProvider) {
        $stateProvider
            .state({
                name: 'admin',
                url: '/admin',
                views: {
                    'header@' : {
                        templateUrl: '/modules/_partials/_admin_header.html',
                    },
                    'main@': {
                        templateUrl: '/modules/admin/Home/views/index.html',
                        controller : 'AdminHomeIndexController'
                    },
                    'sidebar@admin' : {
                        templateUrl: '/modules/_partials/_admin_sidebar.html',
                    }
                },
                data : {
                    isAdmin      : true,
                    requiresAuth : true
                }
            })
    });
angular.module('app')
    .config(function ($stateProvider) {
        $stateProvider
            .state({
                name: 'admin.pendingRegistrations',
                url: '/registrations/pending',
                views: {
                    'header@' : {
                        templateUrl: '/modules/_partials/_admin_header.html',
                    },
                    'main@': {
                        templateUrl: '/modules/admin/PendingRegistrations/views/index.html',
                        controller : 'PendingRegistrationsIndexController'
                    },
                    'sidebar@admin.pendingRegistrations' : {
                        templateUrl: '/modules/_partials/_admin_sidebar.html',
                    }
                },
                data : {
                    isAdmin      : true,
                    requiresAuth : true
                }
            })
    });
angular.module('app')
    .config(function ($stateProvider) {
        $stateProvider
            .state({
                name: 'admin.teams',
                url: '/teams',
                views: {
                    'header@' : {
                        templateUrl: '/modules/_partials/_admin_header.html',
                    },
                    'main@': {
                        templateUrl: '/modules/admin/Team/views/index.html',
                        controller : 'AdminTeamIndexController'
                    },
                    'sidebar@admin.teams' : {
                        templateUrl: '/modules/_partials/_admin_sidebar.html',
                    }
                },
                data : {
                    isAdmin      : true,
                    requiresAuth : true
                }
            })
            .state({
                name: 'admin.teams.edit',
                url: '/:id/edit',
                views: {
                    'header@' : {
                        templateUrl: '/modules/_partials/_admin_header.html',
                    },
                    'main@': {
                        templateUrl: '/modules/admin/Team/views/edit.html',
                        controller : 'AdminTeamEditController'
                    },
                    'sidebar@admin.teams.edit' : {
                        templateUrl: '/modules/_partials/_admin_sidebar.html',
                    }
                },
                data : {
                    isAdmin      : true,
                    requiresAuth : true
                }
            })

            .state({
                name: 'admin.teams.members',
                url: '/:id/members',
                views: {
                    'header@' : {
                        templateUrl: '/modules/_partials/_admin_header.html',
                    },
                    'main@': {
                        templateUrl: '/modules/admin/Team/views/show.html',
                        controller : 'AdminTeamMembersController'
                    },
                    'sidebar@admin.teams.members' : {
                        templateUrl: '/modules/_partials/_admin_sidebar.html',
                    }
                },
                data : {
                    isAdmin      : true,
                    requiresAuth : true
                }
            })
    });
angular.module('app')
    .config(function ($stateProvider) {
        $stateProvider
            .state({
                name: 'login',
                url: '/login',
                views: {
                    'header@': {
                        templateUrl: '/modules/_partials/_header.html',
                    },
                    'main@': {
                        templateUrl: '/modules/Auth/views/login.html',
                        controller : 'AuthLoginController'
                    },
                    'footer@': {
                        templateUrl: '/modules/_partials/_footer.html',
                    }
                },
                data : {
                    requiresAuth : false
                }
            })
            .state({
                name: 'register',
                url: '/register',
                views: {
                    'header@': {
                        templateUrl: '/modules/_partials/_header.html',
                    },
                    'main@': {
                        templateUrl: '/modules/Auth/views/register.html',
                        controller : 'AuthRegisterController'
                    },
                    'footer@': {
                        templateUrl: '/modules/_partials/_footer.html',
                    }
                },
                data : {
                    requiresAuth : false
                }
            })
    });
angular.module('app')
    .config(function ($stateProvider) {
        $stateProvider
            .state({
                name: 'home',
                url: '/',
                views: {
                    'header': {
                        templateUrl: '/modules/_partials/_header.html',
                    },
                    'main@': {
                        templateUrl: '/modules/Home/views/index.html',
                        controller : 'HomeIndexController'
                    },
                    'footer': {
                        templateUrl: '/modules/_partials/_footer.html',
                    }
                }
            })
    });
angular.module('app')
    .factory('PendingRegistrationService', ['$resource', function($resource) {
        return $resource(null, {id: '@id'}, {
            get : {
                url   : `${BASE_URL}/admin/registrations/:status`,
                method: 'GET',
                meta : {
                    adminRoute: true
                }
            },
            approve : {
                url   : `${BASE_URL}/admin/registrations/approve`,
                method: 'PUT',
                meta : {
                    adminRoute: true
                }
            },
            reject : {
                url   : `${BASE_URL}/admin/registrations/reject`,
                method: 'PUT',
                meta : {
                    adminRoute: true
                }
            }
        });
    }]);
angular.module('app')
    .factory('AdminTeamService', ['$resource', function($resource) {
        return $resource(`${BASE_URL}/admin/teams/:id`, {id: '@id'}, {
            get     : {method : 'GET',      meta : {adminRoute: true}},
            show    : {method : 'GET',      meta : {adminRoute: true}},
            store   : {method : 'POST',     meta : {adminRoute: true}},
            update  : {method : 'PUT',      meta : {adminRoute: true}},
            delete  : {method : 'DELETE',   meta : {adminRoute: true}}
        });
    }]);


angular.module('app')
    .factory('AuthManager', ['$rootScope', function($rootScope) {
        return {
            isAuthenticated() {
                return localStorage.getItem('token') !== null;
            },
            setToken(token) {
                localStorage.setItem('token', token);
            },
            user() {
                return JSON.parse(localStorage.getItem('user'));
            },
            checkAuth() {
                $rootScope.user = this.user();
                $rootScope.isAuthenticated = this.isAuthenticated();
            },


            isAuthenticatedAdmin() {
                return localStorage.getItem('token_admin') !== null;
            },
            setTokenAdmin (token) {
                localStorage.setItem('token_admin', token);
            },
            admin() {
                return JSON.parse(localStorage.getItem('admin'));
            },
            checkAuthAdmin() {
                $rootScope.user = this.admin();
                $rootScope.isAuthenticated = this.isAuthenticatedAdmin();
            },
        }
    }]);
angular.module('app')
    .factory('AuthService', ['$resource', function($resource) {
        return $resource(null, {id: '@id'}, {
            login : {
                url   : `${BASE_URL}/auth/login`,
                method: 'POST'
            },
            loginAdmin : {
                url   : `${BASE_URL}/auth/login/admin`,
                method: 'POST'
            },
            register: {
                url   : `${BASE_URL}/auth/register`,
                method: 'POST'
            },
            me : {
                url   : `${BASE_URL}/me`,
                method: 'GET'
            },
            meAdmin : {
                url   : `${BASE_URL}/me`,
                method: 'GET',
                meta : {
                    adminRoute: true
                }
            }
        });
}]);