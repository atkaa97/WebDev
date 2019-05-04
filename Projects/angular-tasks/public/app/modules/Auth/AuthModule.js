angular.module('app')
    .controller('AuthLoginController', function ($scope, AuthService, $state, AuthManager) {
        $scope.user = {};

        $scope.login = function (event) {
            event.preventDefault();
            AuthService.login($scope.user, (res) => {
                AuthManager.setToken(res.token);
                AuthService.me({}, (res) => {
                    localStorage.setItem('user', JSON.stringify(res.user));
                    AuthManager.checkAuth();
                    $state.go('account');
                })
            }, (err) => {})
        }
    });


angular.module('app')
    .controller('AuthRegisterController', function ($scope, AuthService) {
        $scope.days = new Array(31);
        $scope.months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $scope.years = new Array(110);
        $scope.user = {

        }
        
        $scope.register = ($event) => {
            $event.preventDefault();
            $scope.user.date_of_birth = [$scope.user.month, $scope.user.day, $scope.user.year].join(' ');
            AuthService.register($scope.user, (res) => {

            },  (err) => {

            })
        }
    });