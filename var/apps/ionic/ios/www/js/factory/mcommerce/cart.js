/*global
    App
 */
angular.module("starter").factory("McommerceCart", function($pwaRequest, $session) {

<<<<<<< HEAD
App.factory('McommerceCart', function($rootScope, $sbhttp, httpCache, Url, $q) {

    var factory = {};

    factory.value_id = null;
=======
    var factory = {
        value_id: null
    };
>>>>>>> upstream/master

    factory.find = function() {

        if(!this.value_id) {
            return $pwaRequest.reject("[McommerceCart::find] missing value_id.");
        }

        return $pwaRequest.get("mcommerce/mobile_cart/find", {
            urlParams: {
                value_id: this.value_id
            },
            cache: false
        });
    };
    
    factory.addProduct = function (form) {

        if (!this.value_id) {
            return $pwaRequest.reject("[McommerceCart::addProduct] missing value_id.");
        }

        return $pwaRequest.post("mcommerce/mobile_cart/add", {
            urlParams: {
                value_id: this.value_id
            },
            data: {
                form: form
            }
        });
    };


    factory.adddiscount = function (discount_code, use_clean_code) {

<<<<<<< HEAD
        if (!this.value_id) return use_clean_code ? $q.reject() : false;

        //if no discount added, it's valid
        if(discount_code.length === 0 && !use_clean_code) return true;

        var url = Url.get("mcommerce/mobile_cart/adddiscount", {value_id: this.value_id});

        var data = {discount_code: discount_code, customer_uuid: window.device.uuid};

        return $sbhttp.post(url, data);
=======
        if (!this.value_id) {
            return use_clean_code ? $pwaRequest.reject("[McommerceCart::adddiscount] missing value_id.") : false;
        }

        //if no discount added, it's valid
        if(discount_code.length === 0 && !use_clean_code) {
            return true;
        }

        return $pwaRequest.post("mcommerce/mobile_cart/adddiscount", {
            urlParams: {
                value_id: this.value_id
            },
            data: {
                discount_code: discount_code,
                customer_uuid: $session.getDeviceUid()

            }
        });
>>>>>>> upstream/master
    };

    factory.addTip = function (cart) {

        if (!this.value_id) {
            return $pwaRequest.reject("[McommerceCart::addTip] missing value_id.");
        }

        return $pwaRequest.post("mcommerce/mobile_cart/addtip", {
            urlParams: {
                value_id: this.value_id
            },
            data: {
                tip: cart.tip ? cart.tip : 0
            }
        });
    };

    factory.compute = function () {

        if (!this.value_id) {
            return $pwaRequest.reject("[McommerceCart::compute] missing value_id.");
        }

        return $pwaRequest.post("mcommerce/mobile_cart/compute", {
            urlParams: {
                value_id: this.value_id,
                customer_uuid: $session.getDeviceUid()
            }
        });
    };

    factory.deleteLine = function (line_id) {

        if (!this.value_id || !line_id) {
            return $pwaRequest.reject("[McommerceCart::deleteLine] missing value_id or line_id.");
        }
        
<<<<<<< HEAD
        return $sbhttp.get(url, data);
=======
        return $pwaRequest.get("mcommerce/mobile_cart/delete", {
            urlParams: {
                value_id: this.value_id,
                line_id: line_id
            }
        });
>>>>>>> upstream/master
                                          
    };

    factory.modifyLine = function (line) {

        if (!this.value_id) {
            return $pwaRequest.reject("[McommerceCart::modifyLine] missing value_id.");
        }

        return $pwaRequest.post("mcommerce/mobile_cart/modify", {
            data: {
                line_id: line.id,
                qty : line.qty,
                format: line.format
            }
        });

    };

    factory.useFidelityPoints = function(points) {

        if (!this.value_id) {
            return $pwaRequest.reject("[McommerceCart::useFidelityPoints] missing value_id.");
        }

        return $pwaRequest.post("mcommerce/mobile_cart/usefidelitypointsforcart", {
            data: {
                points: points
            }
        });
    };

    factory.removeAllDiscount = function() {

        if (!this.value_id) {
            return $pwaRequest.reject("[McommerceCart::removeAllDiscount] missing value_id.");
        }

        return $pwaRequest.post("mcommerce/mobile_cart/removealldiscount");
    };

    return factory;
});
