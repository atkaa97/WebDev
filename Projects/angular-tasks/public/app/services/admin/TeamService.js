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

