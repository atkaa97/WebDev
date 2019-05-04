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