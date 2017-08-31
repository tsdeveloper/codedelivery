// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter', ['ionic', 'starter.controllers', 'angular-oauth2'])

    // .service('meuService', function () {
    //     this.largura = 10;
    //     this.altura = 10;
    //     this.calcular = function () {
    //         console.log('Service with Method initialize...');
    //         console.log('Values: ' + this.largura * this.altura);
    //
    //     }
    //     console.log('Service Recipe initialize...');
    // })
    //
    // .constant('meuConstant', {
    //     name: 'Web Developer',
    //     endereco: 'Rua xxx',
    //     minhaFuncao: function () {
    //         console.log('Constant Recipe initialize..');
    //     }
    // })

    // .run(['$rootScope', '$window', 'OAuth', '$ionicPlatform', 'meuConstant', 'meuService',
    .run(['$rootScope', '$window', 'OAuth', '$ionicPlatform',
        // function ($rootScope, $window, OAuth, $ionicPlatform, meuConstant, meuService) {
        function ($rootScope, $window, OAuth, $ionicPlatform) {
            // meuService.calcular();
            // console.log(meuConstant);
            // meuConstant.minhaFuncao();
            // meuConstant.name = 'Change Name Constant';
            // console.log(meuConstant);

            $ionicPlatform.ready(function () {
                if (window.cordova && window.cordova.plugins.Keyboard) {
                    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
                    // for form inputs)
                    cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);

                    // Don't remove this line unless you know what you are doing. It stops the viewport
                    // from snapping when text inputs are focused. Ionic handles this internally for
                    // a much nicer keyboard experience.
                    cordova.plugins.Keyboard.disableScroll(true);
                }
                if (window.StatusBar) {
                    StatusBar.styleDefault();
                }
            });
            $rootScope.$on('oauth:error', function (event, rejection) {
                // Ignore `invalid_grant` error - should be catched on `LoginController`.
                if ('invalid_grant' === rejection.data.error) {
                    return;
                }

                // Refresh token when a `invalid_token` error occurs.
                if ('invalid_token' === rejection.data.error) {
                    return OAuth.getRefreshToken();
                }

                // Redirect to `/login` with the `error_reason`.
                return $window.location.href = '/login?error_reason=' + rejection.data.error;
            });
        }])

    .config(function ($stateProvider, $urlRouterProvider, OAuthProvider, OAuthTokenProvider) {
        OAuthProvider.configure({
            baseUrl: 'http://localhost:8000/',
            clientId: 'fm_app_entrada',
            clientSecret: '$2y$10$YaFsJ2kBVmFYNHDW39igdOsRtRwU3/Cr9', // optional
            grantPath: '/oauth/access_token'
        });

        OAuthTokenProvider.configure({
            name: 'token',
            options: {
                secure: false
            }
        });
        $stateProvider
            .state('home', {
                url: '/home',
                templateUrl: 'templates/home.html',
                controller: 'HomeCtrl'
            })
            .state('login', {
                url: '/login',
                templateUrl: 'templates/login.html',
                controller: 'LoginCtrl'
            })
            .state('main', {
                url: '/main',
                templateUrl: 'templates/main.html'
            });

        $urlRouterProvider.otherwise('/')
    });
