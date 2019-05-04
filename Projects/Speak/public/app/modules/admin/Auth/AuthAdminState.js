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