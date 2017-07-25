<<<<<<< HEAD
App.config(function($stateProvider, HomepageLayoutProvider) {

    $stateProvider.state("folder-category-list", {
        url: BASE_PATH+"/folder/mobile_list/index/value_id/:value_id",
        templateUrl: function(param) {
            var layout_id = HomepageLayoutProvider.getLayoutIdForValueId(param.value_id);
            switch(layout_id) {
                case "2": layout_id = "l2"; break;
                case "3": layout_id = "l3"; break;
                case "4": layout_id = "l4"; break;
                case "1":
                default: layout_id = "l1";
            }
            return 'templates/folder/'+layout_id+'/list.html';
        },
        controller: 'FolderListController',
        cache: false
    }).state("folder-subcategory-list", {
        url: BASE_PATH+"/folder/mobile_list/index/value_id/:value_id/category_id/:category_id",
        controller: "FolderListController",
        templateUrl: function(param) {
            var layout_id = HomepageLayoutProvider.getLayoutIdForValueId(param.value_id);
            switch(layout_id) {
                case "2": layout_id = "l2"; break;
                case "3": layout_id = "l3"; break;
                case "4": layout_id = "l4"; break;
                case "1":
                default: layout_id = "l1";
            }
            return 'templates/folder/'+layout_id+'/list.html';
        }
    })

}).controller('FolderListController', function($sbhttp, $ionicModal, $ionicPopup, $location, $rootScope, $scope, $stateParams, $window, $translate, $timeout, Analytics, AUTH_EVENTS, PADLOCK_EVENTS, Customer, Folder, LinkService, Padlock, Url) {

    $scope.$on("connectionStateChange", function(event, args) {
        if(args.isOnline == true) {
            $scope.loadContent();
        }
    });

    $scope.is_loading = true;
    $scope.value_id = Folder.value_id = $stateParams.value_id;
    $scope.search = {};
=======
/*global
 App, angular, BASE_PATH
 */

angular.module("starter").controller("FolderListController", function($scope, $stateParams, $ionicNavBarDelegate,
                                                                      $timeout, SB, Customer, Folder, Padlock) {

    angular.extend($scope, {
        is_loading      : true,
        value_id        : $stateParams.value_id,
        search          : {},
        card_design     : false
    });

    Folder.setValueId($stateParams.value_id);
    Folder.setCategoryId(_.get($stateParams, "category_id", null));
>>>>>>> upstream/master

    $scope.computeCollections = function() {
        var unlocked = Customer.can_access_locked_features || Padlock.unlocked_by_qrcode;

        var compute = function(collection) {
            var destination = [];
            angular.forEach(collection, function(folder_item) {
                if(unlocked || !folder_item.is_locked || (folder_item.code === "padlock")) {
                    if(unlocked && (folder_item.code === "padlock")) {
                        return;
                    }

                    this.push(folder_item);
                }
            }, destination);
            return destination;
        };

        $scope.collection = compute($scope.collection_data);
        $scope.search_list = compute($scope.search_list_data);
    };

<<<<<<< HEAD
    function computeCollections() {
        var unlocked = Customer.can_access_locked_features || Padlock.unlocked_by_qrcode;

        function compute(collection) {
            var destination = [];
            angular.forEach(collection, function(folder_item) {
                if((unlocked || !folder_item.is_locked || folder_item.code == "padlock")) {
                    if(unlocked && folder_item.code == "padlock")
                        return;

                    this.push(folder_item);
                }
            }, destination);
            return destination;
        }

        $scope.collection = compute($scope.collection_data);
        $scope.search_list = compute($scope.search_list_data);
    }

    $scope.$on(AUTH_EVENTS.loginStatusChanged, computeCollections);
    $scope.$on(PADLOCK_EVENTS.unlockFeatures, computeCollections);

    $scope.loadContent = function() {
        Folder.findAll().success(function(data) {
=======
    $scope.loadContent = function() {
        Folder.findAll()
            .then(function(data) {

                var values = angular.copy(data);

                $scope.cover        = values.cover;

                $ionicNavBarDelegate.title(values.page_title);
                $timeout(function() {
                    $scope.page_title   = values.page_title;
                });

                $scope.collection_data      = values.folders;
                $scope.search_list_data     = values.search_list;
>>>>>>> upstream/master

                $scope.computeCollections();

<<<<<<< HEAD
            $scope.collection_data = data.folders;
            $scope.search_list_data = data.search_list;
            computeCollections();

            $scope.show_search = data.show_search == "1";
=======
                $scope.show_search = values.show_search;
>>>>>>> upstream/master

                return values;

            }).then(function(data) {
                $scope.is_loading = false;

                /** Pre-load any sub-folder */
                var sub_folders = _.filter(data.folders, {
                    is_subfolder: true
                });

                angular.forEach(sub_folders, function(sub_folder) {
                    if(_.find(Folder.collection, {category_id: sub_folder.category_id}) === undefined) {
                        Folder.findAll($scope.value_id, sub_folder.category_id, {
                            refresh: true
                        }).then(function(folder) {
                            Folder.collection.push(folder);
                        });
                    }

<<<<<<< HEAD
    };

    $scope.goTo = function(feature) {

        if(feature.code == "code_scan") {
        	$window.scan_camera_protocols = JSON.stringify(["tel:", "http:", "https:", "geo:", "ctc:"]);
            Application.openScanCamera({protocols: ["tel:", "http:", "https:", "geo:", "ctc:"]}, function(qrcode) {}, function() {});
        } else if(feature.offline_mode !== true && $rootScope.isOffline) {
            $rootScope.onlineOnly();
            return;
        }  else if(feature.is_link) {
            var options = {
                "hide_navbar" : (feature.hide_navbar ? true : false),
                "use_external_app" : (feature.use_external_app ? true : false)
            };
            LinkService.openLink(feature.url,options);
        } else {
            $location.path(feature.url);
        }

        Analytics.storePageOpening(feature);
    };

=======
                });

            });

    };

    $scope.$on(SB.EVENTS.AUTH.loginSuccess, function() {
        $scope.loadContent();
    });

    $scope.$on(SB.EVENTS.AUTH.logoutSuccess, function() {
        $scope.loadContent();
    });

    $scope.$on(SB.EVENTS.PADLOCK.unlockFeatures, function() {
        $scope.loadContent();
    });

    $scope.$on(SB.EVENTS.PADLOCK.lockFeatures, function() {
        $scope.loadContent();
    });

>>>>>>> upstream/master
    $scope.loadContent();

});
