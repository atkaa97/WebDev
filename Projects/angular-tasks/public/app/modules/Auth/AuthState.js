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