/*global
 App, device, angular
 */

/**
 * Radio
 *
 * @author Xtraball SAS
 */
angular.module("starter").factory("Radio", function($pwaRequest) {

    var factory = {
        value_id: null,
        extendedOptions: {}
    };

    /**
     *
     * @param value_id
     */
    factory.setValueId = function(value_id) {
        factory.value_id = value_id;
    };

    /**
     *
     * @param options
     */
    factory.setExtendedOptions = function(options) {
        factory.extendedOptions = options;
    };


    factory.find = function() {

        if(!this.value_id) {
            return $pwaRequest.reject("[Factory::Radio.find] missing value_id");
        }

        /* Instant content */
        var payload = $pwaRequest.getPayloadForValueId(factory.value_id);
        if(payload !== false) {

            return $pwaRequest.resolve(payload);

        } else {
            /** Otherwise fallback on PWA */
            return $pwaRequest.get("radio/mobile_radio/find", angular.extend({
                urlParams: {
                    value_id: this.value_id
                }
            }, factory.extendedOptions));
        }


    };

    return factory;
});