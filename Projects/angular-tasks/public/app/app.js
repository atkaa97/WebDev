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
