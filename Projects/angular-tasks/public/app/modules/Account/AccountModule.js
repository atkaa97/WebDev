angular.module('app')
    .controller('AccountIndexController', function (AuthService) {
        console.log(123);
        AuthService.me();
    });