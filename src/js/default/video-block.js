var $ = require("jquery");

(function () {
    'use strict';

    /*!
     * video-block
     */

    var $videoblock = $('[data-video-block-trigger]');

    $videoblock.on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        var $parent = $this.parents('[data-video-block]');

        $("body").toggleClass("rhs-video-block--is-open");
        $parent.toggleClass("rhs-video-block--open");
    });


})();