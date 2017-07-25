/*global
 angular
 */

angular.module("starter").directive("sbPadlock", function(Application) {
    return {
        restrict: "A",
<<<<<<< HEAD
        controller: function($cordovaBarcodeScanner, $ionicHistory, $ionicModal, $rootScope, $scope, $state, $stateParams, $timeout, $translate, $window, Application, Customer, Dialog, Padlock, AUTH_EVENTS, PADLOCK_EVENTS) {
=======
        controller: function($cordovaBarcodeScanner, $ionicHistory, Modal, $rootScope, $scope, $state, $stateParams,
                             $timeout, $translate, $window, Application, Customer, Dialog, Padlock, SB) {
>>>>>>> upstream/master

            $scope.is_webview = Application.is_webview;

            if(Application.is_locked) {
                $ionicHistory.clearHistory();
            }

            $rootScope.$on(SB.EVENTS.AUTH.loginSuccess, function() {
                $scope.is_logged_in = true;
            });

            $rootScope.$on(SB.EVENTS.AUTH.logoutSuccess, function() {
                $scope.is_logged_in = false;
            });

            $scope.is_logged_in = Customer.isLoggedIn();
            $scope.value_id = Padlock.value_id = $stateParams.value_id;

<<<<<<< HEAD
            Padlock.findUnlockTypes().success(function(data) {
                $scope.unlock_by_account_type = data.unlock_by_account;
                $scope.unlock_by_qrcode_type = data.unlock_by_qrcode;
            });

            $scope.login = function($scope) { 
            	$rootScope.loginFeature = true; 
            	Customer.loginModal($scope) ;
            };

            $scope.logout = function() {
=======
            Padlock.findUnlockTypes()
                .then(function(data) {
                    $scope.unlock_by_account_type = data.unlock_by_account;
                    $scope.unlock_by_qrcode_type = data.unlock_by_qrcode;
                });

            $scope.padlock_login = function () {
                Customer.display_account_form = false;
                Customer.loginModal($scope, function() {
                    $rootScope.$broadcast(SB.EVENTS.PADLOCK.unlockFeatures);

                    if(Application.is_locked) {
                        $ionicHistory.clearHistory();
                        $state.go("home");
                    } else {
                        $ionicHistory.goBack();
                    }
                });
            };

            $scope.padlock_signup = function () {
                Customer.display_account_form = true;
                Customer.loginModal($scope);
            };

            $scope.padlock_logout = function() {
>>>>>>> upstream/master
                $scope.is_loading = true;
                Customer.logout()
                    .then(function() {
                        $scope.is_loading = false;
                    });
            };

            $scope.openScanCamera = function() {
                $scope.scan_protocols = ["sendback:"];

                $cordovaBarcodeScanner.scan().then(function(barcodeData) {

                    if(!barcodeData.cancelled && (barcodeData.text !== "")) {

                        $timeout(function () {
                            for (var i = 0; i < $scope.scan_protocols.length; i++) {
                                if (barcodeData.text.toLowerCase().indexOf($scope.scan_protocols[i]) == 0) {
                                    $scope.is_loading = true;

                                    var qrcode = barcodeData.text.replace($scope.scan_protocols[i], "");

                                    Padlock.unlockByQRCode(qrcode)
                                        .then(function() {

<<<<<<< HEAD
                                        Padlock.unlocked_by_qrcode = true;
=======
                                            Padlock.unlocked_by_qrcode = true;
>>>>>>> upstream/master

                                            $scope.is_loading = false;

                                            $window.localStorage.setItem('sb-uc', qrcode);

                                            $rootScope.$broadcast(SB.EVENTS.PADLOCK.unlockFeatures);

<<<<<<< HEAD
                                        if(Application.is_locked) {
                                            $ionicHistory.clearHistory();
			                                      $state.go("home");
                                        } else {
                                            $ionicHistory.goBack();
                                        }
=======
                                            if(Application.is_locked) {
                                                $ionicHistory.clearHistory();
                                                $state.go("home");
                                            } else {
                                                $ionicHistory.goBack();
                                            }
>>>>>>> upstream/master

                                        }, function (data) {

                                            var message_text = $translate.instant('An error occurred while reading the code.');
                                            if(angular.isObject(data)) {
                                                message_text = data.message;
                                            }

                                            Dialog.alert("Error", message_text, "OK", -1);

                                        }).then(function () {
                                            $scope.is_loading = false;
                                        });

                                    break;
                                }
                            }

                        });

                    }

                }, function(error) {
<<<<<<< HEAD
                    Dialog.alert(
                        $translate.instant('Error'),
                        $translate.instant('An error occurred while reading the code.'),
                        $translate.instant("OK")
                    );
=======
                    Dialog.alert("Error", "An error occurred while reading the code.", "OK", -1);
>>>>>>> upstream/master
                });
            };

        }
    };
});
