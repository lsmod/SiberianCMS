<<<<<<< HEAD
App.service('$translate', function($sbhttp, Url) {
=======
/*global
 angular
 */
angular.module("starter").service('$translate', function() {

>>>>>>> upstream/master
    var service = {};

    service.translations = [];

    service.instant = function(text) {
        return angular.isDefined(service.translations[text]) ? service.translations[text] : text;
    };

<<<<<<< HEAD
    /**
     * @deprecated
     * @param is_retry
     */
    service.findTranslations = function(is_retry) {
        return $sbhttp({
            method: 'GET',
            url: Url.get("/application/mobile_translation/findall", {add_language: true}),
            cache: true,
            responseType: 'json',
            timeout: 4000
        }).success(function (translations) {
            service.translations = translations;
        }).error(function() {
            if(is_retry !== true) {
                return service.findTranslations(true);
            }
        });
    };

=======
>>>>>>> upstream/master
    return service;

});
