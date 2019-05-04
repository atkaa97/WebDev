angular.module('app')
    .factory('PendingRegistrationService', ['$resource', function($resource) {
        return $resource(null, {id: '@id'}, {
            get : {
                url   : `${BASE_URL}/admin/registrations/:status`,
                method: 'GET',
                meta : {
                    adminRoute: true
                }
            },
            approve : {
                url   : `${BASE_URL}/admin/registrations/approve`,
                method: 'PUT',
                meta : {
                    adminRoute: true
                }
            },
            reject : {
                url   : `${BASE_URL}/admin/registrations/reject`,
                method: 'PUT',
                meta : {
                    adminRoute: true
                }
            }
        });
    }]);