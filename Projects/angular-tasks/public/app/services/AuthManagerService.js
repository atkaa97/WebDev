angular.module('app')
    .factory('AuthManager', ['$rootScope', function($rootScope) {
        return {
            isAuthenticated() {
                return localStorage.getItem('token') !== null;
            },
            setToken(token) {
                localStorage.setItem('token', token);
            },
            user() {
                return JSON.parse(localStorage.getItem('user'));
            },
            checkAuth() {
                $rootScope.user = this.user();
                $rootScope.isAuthenticated = this.isAuthenticated();
            },


            isAuthenticatedAdmin() {
                return localStorage.getItem('token_admin') !== null;
            },
            setTokenAdmin (token) {
                localStorage.setItem('token_admin', token);
            },
            admin() {
                return JSON.parse(localStorage.getItem('admin'));
            },
            checkAuthAdmin() {
                $rootScope.user = this.admin();
                $rootScope.isAuthenticated = this.isAuthenticatedAdmin();
            },
        }
    }]);