angular.module('app')
    .controller('AdminTeamIndexController', function (AdminTeamService, $scope, toastr) {
        $scope.data = {};

        $scope.getData = function (page) {
            AdminTeamService.get({page : page}, (res) => {
                $scope.data = res.teams;
            }, (err) => {})
        };

        $scope.getData();

        $scope.delete = function (teamID) {
            if(confirm('Are you sure want to delete this team?')) {
                AdminTeamService.delete({id : teamID}, (res) => {
                    toastr.success('Successfully Deleted.');
                    $scope.getData(1);
                }, (err) => {});
            }
        }
    });

angular.module('app')
    .controller('AdminTeamMembersController', function (AdminTeamService, $scope, toastr) {
        $scope.data = {};

        $scope.getData = function (page) {
            AdminTeamService.get({page : page}, (res) => {
                $scope.data = res.teams;
            }, (err) => {})
        };

        $scope.getData();

        $scope.delete = function (teamID) {
            if(confirm('Are you sure want to delete this team?')) {
                AdminTeamService.delete({id : teamID}, (res) => {
                    toastr.success('Successfully Deleted.');
                    $scope.getData(1);
                }, (err) => {});
            }
        }
    });

angular.module('app')
    .controller('AdminTeamEditController', function (AdminTeamService, $scope, toastr, $stateParams, $state) {
        $scope.isEdit = $stateParams.id > 0;

        $scope.team = {};

        if($scope.isEdit) {
            AdminTeamService.show({id : $stateParams.id}, (res) => {
                $scope.team = res.team;
            })
        }

        $scope.save = function (event) {
            event.preventDefault();

            if($scope.isEdit) {
                AdminTeamService.update($scope.team, (res) => {
                    toastr.success('Successfully Updated Team.');
                    $state.go('admin.teams');
                }, (err) => {})
            } else {
                AdminTeamService.store($scope.team, (res) => {
                    toastr.success('Successfully Created Team.');
                    $state.go('admin.teams');
                }, (err) => {})
            }
        }
    });