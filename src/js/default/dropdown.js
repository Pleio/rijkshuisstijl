var $ = require("jquery");

(function () {
    'use strict';


    /*!
     * dropdown
     */

    var $dropdownTrigger = $('[data-dropdown-trigger]');

    $dropdownTrigger.on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        var $parent = $this.parent('div');
        $parent.addClass("dropdown--open");
        $(".rhs-mobile-navigation").addClass("mobile-sub-open");
    });

    $(".rhs-dropdown__back").on('click', function(e) {
        e.preventDefault();
        $(".rhs-mobile-navigation .rhs-dropdown").removeClass("dropdown--open");
        $(".rhs-mobile-navigation").removeClass("mobile-sub-open");
    });

    $(document).ready(function(){
        if($("[data-dropdown-trigger]").hasClass("active")){
            var $thisEl = $('.rhs-dropdown__trigger.active');
            var $parent = $thisEl.parent(".rhs-dropdown");

            $parent.addClass("dropdown--open");
            $(".rhs-mobile-navigation").addClass("mobile-sub-open");
        }
    });

})();