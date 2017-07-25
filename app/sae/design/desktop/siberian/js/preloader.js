/*global
<<<<<<< HEAD
    localStorage, XMLHttpRequest
 */

$(document).ready(function() {
    if(localStorage.getItem("latest-cache") != version) {

        var preload = [
            "/var/apps/browser/prod.js",
            "/var/apps/browser/prod.css",
            "/var/apps/browser/cordova.js",
            "/var/apps/browser/cordova_plugins.js",
            "/var/apps/browser/templates/sourcecode/l1/view.html",
            "/var/apps/browser/templates/booking/l1/view.html",
            "/var/apps/browser/templates/fanwall/l1/header.html",
            "/var/apps/browser/templates/fanwall/l1/edit.html",
            "/var/apps/browser/templates/fanwall/l1/gallery.html",
            "/var/apps/browser/templates/topic/l1/list.html",
            "/var/apps/browser/templates/socialgaming/l1/view.html",
            "/var/apps/browser/templates/rss/l1/view.html",
            "/var/apps/browser/templates/application/l1/tc/view.html",
            "/var/apps/browser/templates/application/l1/colors/view.html",
            "/var/apps/browser/templates/wordpress/l1/view.html",
            "/var/apps/browser/templates/catalog/category/l1/product/view.html",
            "/var/apps/browser/templates/catalog/setmeal/l1/view.html",
            "/var/apps/browser/templates/links/l1/view.html",
            "/var/apps/browser/templates/discount/l1/view.html",
            "/var/apps/browser/templates/maps/l1/view.html",
            "/var/apps/browser/templates/padlock/l1/view.html",
            "/var/apps/browser/templates/weather/l1/view.html",
            "/var/apps/browser/templates/tip/l1/view.html",
            "/var/apps/browser/templates/form/l1/view.html",
            "/var/apps/browser/templates/facebook/l1/header.html",
            "/var/apps/browser/templates/facebook/l1/view.html",
            "/var/apps/browser/templates/inbox/l1/view/bottom_bar.html",
            "/var/apps/browser/templates/inbox/l1/view/subheader.html",
            "/var/apps/browser/templates/inbox/l1/comment/view.html",
            "/var/apps/browser/templates/inbox/l1/comment/post.html",
            "/var/apps/browser/templates/inbox/l1/list.html",
            "/var/apps/browser/templates/home/l12/view.html",
            "/var/apps/browser/templates/home/l2/view.html",
            "/var/apps/browser/templates/home/l6/view.html",
            "/var/apps/browser/templates/home/modal/view.html",
            "/var/apps/browser/templates/home/l4/view.html",
            "/var/apps/browser/templates/home/l1/view.html",
            "/var/apps/browser/templates/home/l13/view.html",
            "/var/apps/browser/templates/home/view.html",
            "/var/apps/browser/templates/home/l3/view.html",
            "/var/apps/browser/templates/home/l7/view.html",
            "/var/apps/browser/templates/home/l10/modal.html",
            "/var/apps/browser/templates/home/l10/view.html",
            "/var/apps/browser/templates/home/l11/view.html",
            "/var/apps/browser/templates/home/l5/view.html",
            "/var/apps/browser/templates/home/l9/view.html",
            "/var/apps/browser/templates/loyaltycard/l1/view.html",
            "/var/apps/browser/templates/loyaltycard/l1/pad.html",
            "/var/apps/browser/templates/contact/l1/view.html",
            "/var/apps/browser/templates/contact/l1/form.html",
            "/var/apps/browser/templates/html/l2/list.html",
            "/var/apps/browser/templates/html/l6/list.html",
            "/var/apps/browser/templates/html/l1/maps.html",
            "/var/apps/browser/templates/html/l1/loading.html",
            "/var/apps/browser/templates/html/l1/comment.html",
            "/var/apps/browser/templates/html/l1/view.html",
            "/var/apps/browser/templates/html/l1/sidebar.html",
            "/var/apps/browser/templates/html/l1/list.html",
            "/var/apps/browser/templates/html/l3/list.html",
            "/var/apps/browser/templates/html/l5/list.html",
            "/var/apps/browser/templates/mcommerce/l1/cart.html",
            "/var/apps/browser/templates/mcommerce/l1/sales/success.html",
            "/var/apps/browser/templates/mcommerce/l1/sales/error.html",
            "/var/apps/browser/templates/mcommerce/l1/sales/store.html",
            "/var/apps/browser/templates/mcommerce/l1/sales/delivery.html",
            "/var/apps/browser/templates/mcommerce/l1/sales/confirmation.html",
            "/var/apps/browser/templates/mcommerce/l1/sales/payment.html",
            "/var/apps/browser/templates/mcommerce/l1/sales/stripe.html",
            "/var/apps/browser/templates/mcommerce/l1/sales/customer.html",
            "/var/apps/browser/templates/mcommerce/l1/product.html",
            "/var/apps/browser/templates/customer/account/l1/login.html",
            "/var/apps/browser/templates/event/l1/view.html",
            "/var/apps/browser/templates/event/l1/list.html",
            "/var/apps/browser/templates/folder/l1/list.html",
            "/var/apps/browser/templates/media/video/l1/list.html",
            "/var/apps/browser/templates/media/music/l1/album/boxes.html",
            "/var/apps/browser/templates/media/music/l1/album/view.html",
            "/var/apps/browser/templates/media/music/l1/album/list.html",
            "/var/apps/browser/templates/media/music/l1/playlist/list.html",
            "/var/apps/browser/templates/media/music/l1/playlist/albums.html",
            "/var/apps/browser/templates/media/music/l1/player/view.html",
            "/var/apps/browser/templates/media/music/l1/player/playlist.html",
            "/var/apps/browser/templates/media/music/l1/player/mini.html",
            "/var/apps/browser/templates/media/music/l1/track/list.html",
            "/var/apps/browser/templates/media/image/l1/list.html",
            "/var/apps/browser/templates/cms/privacypolicy/l1/view.html",
            "/var/apps/browser/templates/cms/page/l1/view/subheader.html",
            "/var/apps/browser/templates/cms/page/l1/view.html",
            "/var/apps/browser/templates/page/side-menu.html",
            "/var/apps/browser/img/placeholder/530.272.png",
            "/var/apps/browser/img/pictos/sprite-play.png",
            "/var/apps/browser/img/ionic.png",
            "/var/apps/browser/img/loyaltycard/point.png",
            "/var/apps/browser/img/loyaltycard/point-validated.png",
            "/var/apps/browser/js/libraries/ionRadio.js",
            "/var/apps/browser/js/libraries/ion-gallery.min.js",
            "/var/apps/browser/js/libraries/angular-touch.min.js",
            "/var/apps/browser/js/libraries/angular-carousel.js",
            "/var/apps/browser/js/libraries/angular-ios9-uiwebview.js",
            "/var/apps/browser/lib/ngCordova/dist/ng-cordova.min.js",
            "/var/apps/browser/lib/ionic/fonts/ionicons.ttf",
            "/var/apps/browser/lib/ionic/fonts/ionicons.eot",
            "/var/apps/browser/lib/ionic/fonts/ionicons.woff",
            "/var/apps/browser/lib/ionic/fonts/ionicons.svg"
=======
    localStorage, XMLHttpRequest, current_release
 */

$(document).ready(function() {
    if(localStorage.getItem("latest-cache") !== current_release) {

        var preload = [
            "/var/apps/overview/dist/app.bundle-min.js",
            "/var/apps/overview/cordova.js",
            "/var/apps/overview/cordova_plugins.js",
            "/var/apps/overview/img/placeholder/530.272.png",
            "/var/apps/overview/img/pictos/sprite-play.png",
            "/var/apps/overview/img/ionic.png",
            "/var/apps/overview/img/loyaltycard/point.png",
            "/var/apps/overview/img/loyaltycard/point-validated.png",
            "/var/apps/overview/js/libraries/ion-gallery.min.js",
            "/var/apps/overview/js/libraries/angular-touch.min.js",
            "/var/apps/overview/lib/ngCordova/dist/ng-cordova.min.js",
            "/var/apps/overview/lib/ionic/fonts/ionicons.ttf",
            "/var/apps/overview/lib/ionic/fonts/ionicons.eot",
            "/var/apps/overview/lib/ionic/fonts/ionicons.woff",
            "/var/apps/overview/lib/ionic/fonts/ionicons.svg"
>>>>>>> upstream/master
        ];

        var request = function(filename) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', filename);
            xhr.send(null);
        };

<<<<<<< HEAD
        preload.forEach(function(element, index, obj) {
            request(element+"?version="+version);
        });

        /** Save information */
        localStorage.setItem("latest-cache", version);
=======
        preload.forEach(function(element) {
            request(element + "?version=" + current_release);
        });

        /** Save information */
        localStorage.setItem("latest-cache", current_release);
>>>>>>> upstream/master
    }

});