var $ = require("jquery");

(function () {
    'use strict';

    var $modalTrigger = $("[data-modal-trigger]");
    var $body = $("body");
    var bodyClass = "rhs-question-modal--open";


    /*!
     * modal
     */

    $modalTrigger.on('click', function(e) {
        e.preventDefault();
        $body.addClass(bodyClass);
    });

    $(".rhs-overlay, .rhs-question-modal__close").on("click", function(){
        $body.removeClass(bodyClass);
    });


})();
