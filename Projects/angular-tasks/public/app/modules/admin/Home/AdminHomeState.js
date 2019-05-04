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