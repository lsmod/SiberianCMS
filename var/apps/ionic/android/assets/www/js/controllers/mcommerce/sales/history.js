<<<<<<< HEAD
App.config(function ($stateProvider) {

    $stateProvider.state('mcommerce-sales-history', {
        url: BASE_PATH+"/mcommerce/mobile_sales_customer/history/value_id/:value_id",
        controller: 'MCommerceSalesHistoryViewController',
        templateUrl: "templates/mcommerce/l1/sales/history.html",
        cache:false
    }).state('mcommerce-sales-history-details', {
        url: BASE_PATH+"/mcommerce/mobile_sales_customer/history_details/value_id/:value_id/order_id/:order_id",
        controller: 'MCommerceSalesHistoryDetailsController',
        templateUrl: "templates/mcommerce/l1/sales/history_details.html",
        cache:false
    });

}).controller('MCommerceSalesHistoryViewController', function ($ionicLoading, $scope, $state, $stateParams, $timeout, $translate, McommerceSalesCustomer) {
=======
/*global
    App, BASE_PATH
 */
angular.module("starter").controller("MCommerceSalesHistoryViewController", function (Loader, $scope, $state, $stateParams,
                                                               $translate, McommerceSalesCustomer) {
>>>>>>> upstream/master

    $scope.value_id = $stateParams.value_id;

    $scope.page_title = $translate.instant("Order history");

    $scope.showLoader = function() {
<<<<<<< HEAD
        $ionicLoading.show({
            template: "<ion-spinner class=\"spinner-custom\"></ion-spinner>"
        });
    };

    $scope.orders = new Array();
=======
        Loader.show();
    };

    $scope.orders = [];
>>>>>>> upstream/master
    $scope.offset = 0;
    $scope.can_load_older_posts = true;

    McommerceSalesCustomer.value_id = $stateParams.value_id;

    $scope.loadContent = function() {

        $scope.showLoader();

<<<<<<< HEAD
        McommerceSalesCustomer.getOrderHistory($scope.offset).success(function(data) {

            $scope.orders = $scope.orders.concat(data.orders);
            $scope.offset += data.orders.length;

            if(data.orders.length <= 0) {
                $scope.can_load_older_posts = false;
            }
            console.log("can load:", $scope.can_load_older_posts);
        }).finally(function() {
            $scope.$broadcast('scroll.infiniteScrollComplete');
            $ionicLoading.hide();
        });
=======
        McommerceSalesCustomer.getOrderHistory($scope.offset)
            .then(function(data) {

                if(data.orders) {
                    $scope.orders = $scope.orders.concat(data.orders);
                    $scope.offset += data.orders.length;

                    if(data.orders.length <= 0) {
                        $scope.can_load_older_posts = false;
                    }
                    return true;
                } else {
                    $scope.orders = [];
                    return false;
                }

            }).then(function(refresh) {
                if(refresh) {
                    $scope.$broadcast('scroll.infiniteScrollComplete');
                }
                Loader.hide();
            });
>>>>>>> upstream/master
    };

    $scope.loadContent();

    $scope.showDetails = function(order_id) {
        $state.go("mcommerce-sales-history-details", {value_id: $scope.value_id, order_id: order_id});
    };

    $scope.loadMore = function() {
<<<<<<< HEAD
        console.log("load more");
        $scope.loadContent();
    };

}).controller('MCommerceSalesHistoryDetailsController', function ($ionicLoading, $scope, $state, $stateParams, $timeout, $translate, McommerceSalesCustomer) {

    $scope.value_id = $stateParams.value_id;

    $scope.page_title = $translate.instant("Order details");

    $scope.order_id = $stateParams.order_id;

    $ionicLoading.show({
        template: "<ion-spinner class=\"spinner-custom\"></ion-spinner>"
    });
=======
        $scope.loadContent();
    };

}).controller("MCommerceSalesHistoryDetailsController", function (Loader, $scope, $stateParams,
                                                                  $translate, McommerceSalesCustomer) {

    $scope.value_id = $stateParams.value_id;
    $scope.page_title = $translate.instant("Order details");
    $scope.order_id = $stateParams.order_id;

    Loader.show();
>>>>>>> upstream/master

    McommerceSalesCustomer.value_id = $stateParams.value_id;

    $scope.loadContent = function() {

<<<<<<< HEAD
        McommerceSalesCustomer.getOrderDetails($scope.order_id).success(function(data) {

            $scope.order = data.order;

        }).finally(function() {
            $ionicLoading.hide();
        });
=======
        McommerceSalesCustomer.getOrderDetails($scope.order_id)
            .then(function(data) {

                $scope.order = data.order;

            }).then(function() {
                Loader.hide();
            });
>>>>>>> upstream/master
    };

    $scope.loadContent();

});