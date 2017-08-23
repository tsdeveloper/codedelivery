angular.module('starter.controllers', [])
    .controller('LoginCtrl', ['$scope', 'OAuth', function ($scope, OAuth) {
        $scope.user = {
            username: '',
            password: ''

        }

        // $scope.name = $stateParams.name;
        $scope.login = function () {
            OAuth.getAccessToken($scope.user)
                .then(function (data) {
            console.log("login success...");
            }, function (responseError) {

            });
        }
    }]);