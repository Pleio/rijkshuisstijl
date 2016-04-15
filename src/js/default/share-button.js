var $ = require("jquery");

(function () {
    'use strict';

    var $shareBtn = $("[data-share-toggle]");

    $shareBtn.on("click", function(e){
        e.preventDefault();

        $(this).toggleClass("active");

        $("[data-share-target]").toggleClass("icons-open");
    });


})();