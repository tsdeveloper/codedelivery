angular.module('starter.controllers', [])
    .controller('LoginCtrl', ['$scope', 'OAuth', '$cookies', '$ionicPopup', '$timeout', '$state', function ($scope, OAuth, $cookies, $ionicPopup, $timeout, $state) {
        $scope.user = {
            username: '',
            password: ''

        }
        // Triggered on a button click, or some other target
        // Triggered on a button click, or some other target
        $scope.showPopup = function() {
            $scope.data = {};

            // An elaborate, custom popup
            var myPopup = $ionicPopup.show({
                template: '<input type="password" ng-model="data.wifi">',
                title: 'Enter Wi-Fi Password',
                subTitle: 'Please use normal things',
                scope: $scope,
                buttons: [
                    { text: 'Cancel' },
                    {
                        text: '<b>Save</b>',
                        type: 'button-positive',
                        onTap: function(e) {
                            if (!$scope.data.wifi) {
                                //don't allow the user to close unless he enters wifi password
                                e.preventDefault();
                            } else {
                                return $scope.data.wifi;
                            }
                        }
                    }
                ]
            });

            myPopup.then(function(res) {
                console.log('Tapped!', res);
            });

            $timeout(function() {
                myPopup.close(); //close the popup after 3 seconds for some reason
            }, 3000);
        };

        // A confirm dialog
        $scope.showConfirm = function() {
            var confirmPopup = $ionicPopup.confirm({
                title: 'Consume Ice Cream',
                template: 'Are you sure you want to eat this ice cream?'
            });

            confirmPopup.then(function(res) {
                if(res) {
                    console.log('You are sure');
                } else {
                    console.log('You are not sure');
                }
            });
        };

        // An alert dialog
        $scope.showAlert = function() {
            var alertPopup = $ionicPopup.alert({
                title: 'Don\'t eat that!',
                template: 'It might taste good'
            });

            alertPopup.then(function(res) {
                console.log('Thank you for not eating my delicious ice cream cone');
            });
        };

        // $scope.name = $stateParams.name;
        $scope.login = function () {
            OAuth.getAccessToken($scope.user)
                .then(function (data) {
                    console.log(data);
                    console.log($cookies.getObject('token'));
                    var myPopup = $ionicPopup.alert({
                        title: 'Seja bem vindo',
                        template: 'Parabéns você conseguiu entrar no sistema!',
                        buttons: [
                            { text: 'OK' },

                        ]

                    });
                    $state.go('home');
                    $timeout(function() {
                        myPopup.close(); //close the popup after 3 seconds for some reason
                    }, 3000);
                });
                }, function (responseError) {
                $ionicPopup.alert({
                    title: 'Advertência',
                    template: 'Login e/ou senha inválidos',
                    buttons: [
                        { text: 'button-assertive' },

                    ]

                });

        }
    }]);