const APP = angular.module('app', ['ui.router', 'ngResource', 'ngAnimate', 'toastr']);

APP.run(function ($http, AuthManager, $transitions, $state, $rootScope, toastr) {
    window.BASE_URL = 'http://api.speak.com/api';
    AuthManager.checkAuth();

    $transitions.onStart({}, function (transition) {
        const next = transition.to();

        const isAdmin = next.data ? next.data.isAdmin : false;
        const requireAuth = next.data ? next.data.requiresAuth : null;

        if (isAdmin) {
            if (requireAuth === true && !AuthManager.isAuthenticatedAdmin()) {
                return $state.target('loginAdmin');
            } else if (requireAuth === false && AuthManager.isAuthenticatedAdmin()) {
                return $state.target('admin');
            } else return true;
        } else {
            if (requireAuth === true && !AuthManager.isAuthenticated()) {
                return $state.target('login');
            } else if (requireAuth === false && AuthManager.isAuthenticated()) {
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
        toastr.success('Why you left my friend? :(');
    };

    $rootScope.logoutAdmin = function (event) {
        event.preventDefault();
        localStorage.removeItem('token_admin');
        localStorage.removeItem('admin');
        AuthManager.checkAuthAdmin();
        $state.go('loginAdmin');
        toastr.success('Why you left my friend? :( ');
    }
});

APP.config(['$locationProvider', function ($locationProvider) {
    $locationProvider.html5Mode(true);
}]);


APP.config(function Config($httpProvider) {
    $httpProvider.interceptors.push(['$injector', '$q', function ($injector, $q) {
        return {
            'request': function (config) {
                const tokenName = (config.meta && config.meta.adminRoute) ? 'token_admin' : 'token';
                config.headers['Authorization'] = localStorage.getItem(tokenName);
                return config;
            },

            'response': function (response) {
                return response;
            },
            'responseError': function (rejection) {
                if (rejection.status === 401) {
                    console.log('Unauthorized');
                }

                return $q.reject(rejection);
            }
        };
    }]);
});


APP.directive('pagination', function () {
    return {
        restrict: 'E',
        replace: true,
        scope: {
            total: '=',
            currentPage: '=',
            perPage: '=',
            action: '='
        },
        templateUrl: 'modules/_partials/_pagination.html',
        link: function (scope) {
            scope.pages = 0;
            scope.changePage = function (page) {
                scope.action(page);
            };

            scope.$watch('total', (newVal) => {
                if (newVal) {
                    scope.pages = new Array(Math.ceil(scope.total / scope.perPage));
                }
            })
        }
    };
});
