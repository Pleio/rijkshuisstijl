var $ = require("jquery");

(function () {
    'use strict';

    var $subMenuTrigger = $('[data-nav-link] > a'),
        $backBtn = $("[data-back-btn]");

    $subMenuTrigger.on("click", function(e){
        if ($(window).width() < 1024) {
            e.preventDefault();
            var $thisVal = $(this).parent().data("nav-link");
            $("body").toggleClass("mobile-sub-open");
            $('[data-nav-target="' + $thisVal + '"]').toggleClass("mobile-sub-open");
        }
    });

    $backBtn.on("click", function(){
        $("body").removeClass("mobile-sub-open");
        $('[data-nav-target]').removeClass("mobile-sub-open");
    });

})();