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