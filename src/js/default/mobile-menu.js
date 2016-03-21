(function () {
    'use strict';

    var $mobileNavTrigger = $("[data-mobile-nav-trigger]"),
        $body = $("body");

    $mobileNavTrigger.on("click", function(e){
        e.preventDefault();
        $body.toggleClass("mobile-menu--open");

        $(".rhs-overlay").on("click", function(){
            $body.removeClass("mobile-menu--open");
        });
    });





})();
