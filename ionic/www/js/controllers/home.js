angular.module('starter.controllers', [])
    .controller('HomeCtrl', function ($scope,$state, $stateParams) {
        $scope.state = $state.current;
        $scope.name = $stateParams.name;
    });