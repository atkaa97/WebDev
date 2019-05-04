angular.module('app')
    .controller('AuthAdminLoginController', function ($scope, AuthService, $state, AuthManager) {
        $scope.user = {};

        $scope.login = function (event) {
            event.preventDefault();
            AuthService.loginAdmin($scope.user, (res) => {
                AuthManager.setTokenAdmin(res.token);
                AuthService.meAdmin({}, (res) => {
                    localStorage.setItem('admin', JSON.stringify(res.user));
                    AuthManager.checkAuthAdmin();
                    $state.go('admin');
                })
            }, (err) => {})
        }
    });
