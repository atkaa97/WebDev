angular.module('app')
    .controller('PendingRegistrationsIndexController', function (PendingRegistrationService, $scope, toastr, AdminTeamService) {
        $scope.status = 'pending';
        $scope.selectedUser = {
            user_id : null,
            team_id : null
        };

        $scope.data = {};
        $scope.teams = [];

        AdminTeamService.get({all : true}, (res) => {
            $scope.teams = res.teams;
        });

        $scope.getData = function (page) {
            PendingRegistrationService.get({status : $scope.status, page : page}, (res) => {
                $scope.data = res.users;
            }, (err) => {})
        };

        $scope.getData();


        $scope.approve = function () {
            if(confirm('Are you sure you want approve this user?')) {
                PendingRegistrationService.approve($scope.selectedUser, (res) => {
                    toastr.success('Successfully Approved');
                    $scope.getData(1);
                }, (err) => {
                    toastr.error('Error in approving.');
                })
            }
        }

        $scope.reject = function (userID) {
            if(confirm('Are you sure you want to reject this user?')) {
                PendingRegistrationService.reject({user_id : userID}, (res) => {
                    toastr.success('Successfully Rejected.');
                    $scope.getData(1);
                }, (err) => {
                    toastr.error('Error in rejection.');
                })
            }
        }
    });