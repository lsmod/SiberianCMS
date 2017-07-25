/*global
 App, angular, isOverview, BASE_PATH, IS_NATIVE_APP, Camera
 */

angular.module("starter").controller("FormViewController", function(Location, $scope, $stateParams, $translate, Dialog, Form,
                                             GoogleMaps, Picture) {

    angular.extend($scope, {
        is_loading          : true,
        value_id            : $stateParams.value_id,
        formData            : {},
        preview_src         : {},
        geolocation         : {},
        can_take_pictures   : IS_NATIVE_APP,
        card_design         : false
    });

<<<<<<< HEAD
}).controller('FormViewController', function($cordovaCamera, $cordovaGeolocation, $sbhttp, $ionicActionSheet, $ionicPopup, $location, $rootScope, $scope, $stateParams, $timeout, $translate, Application, Dialog, Form, GoogleMaps) {
=======
    Form.setValueId($stateParams.value_id);
>>>>>>> upstream/master

    $scope.loadContent = function() {

        Form.findAll()
            .then(function(data) {
                $scope.sections = data.sections;
                $scope.page_title = data.page_title;

            }).then(function() {

                $scope.is_loading = false;

            });

    };

    $scope.getLocation = function(field) {

        if($scope.geolocation[field.id]) {

            $scope.is_loading = true;

            Location.getLocation()
                .then(function(position) {

                    GoogleMaps.reverseGeocode(position.coords).then(function(results) {
                        if (results[0]) {
                            $scope.formData[field.id] = results[0].formatted_address;
                        } else {
                            $scope.formData[field.id] = position.coords.latitude + ", " + position.coords.longitude;
                        }
                        $scope.is_loading = false;
                    }, function(data) {
                        $scope.formData[field.id] = null;
                        $scope.geolocation[field.id] = false;
                        $scope.is_loading = false;
                    });

                }, function(e) {
                    $scope.is_loading = false;

                    $scope.formData[field.id] = null;
                    $scope.geolocation[field.id] = false;

                });

        } else {
            $scope.formData[field.id] = null;
        }
    };

    /**
     * @param field
     */
    $scope.takePicture = function(field) {

        Picture.takePicture()
            .then(function(success) {
                $scope.preview_src[field.id]    = success.image;
                $scope.formData[field.id]       = success.image;
            });

    };

    $scope.post = function() {

        $scope.is_loading = true;

        if(_.isEmpty($scope.formData)) {

            Dialog.alert("Error", "You must fill at least one field!", "OK", -1)
                .then(function() {
                    $scope.is_loading = false;
                });

            return;
        }

        Form.post($scope.formData)
            .then(function(data) {

                /** Reset form */
                $scope.formData = {};
                $scope.preview_src = {};

                Dialog.alert("Success", data.message, "OK", -1);

            }, function(data) {

                Dialog.alert("Error", data.message, "OK", -1);

<<<<<<< HEAD
        Form.post($scope.formData).success(function(data) {
            $scope.formData = {};
            $scope.preview_src = {};
            if(data.success) {
                Dialog.alert("", data.message, $translate.instant("OK"));
            }
        }).error(function(data) {
            if(data && angular.isDefined(data.message)) {
                $ionicPopup.show({
                    template: "<div style='text-align:center;font-weight:bold;margin-bottom: 10px;'>" + $translate.instant("Error") + "</div>" + data.message,
                    scope: $scope,
                    buttons: [{
                        text: $translate.instant('OK'),
                        type: 'button-custom',
                        onTap: function(e) {
                            return true;
                        }
                    }]
                }).then(function(result) {

                });
            }
        }).finally(function() {
            $scope.is_loading = false;
        });
=======
            }).then(function() {

                $scope.is_loading = false;

            });
>>>>>>> upstream/master
    };

    $scope.loadContent();

});
