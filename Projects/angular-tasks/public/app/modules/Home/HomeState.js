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