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