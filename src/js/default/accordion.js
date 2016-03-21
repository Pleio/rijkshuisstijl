(function () {
    'use strict';


    /*!
     * accordion
     */

    var $accordionTrigger = $('[data-accordion-trigger]');
    $accordionTrigger.on('click', function() {
        var $this = $(this);
        var $parent = $this.parent('[data-accordion-item]');

        if($parent.hasClass("open")){
            $parent.removeClass("open");
        } else {
            $('[data-accordion-item]').removeClass("open");
            $parent.toggleClass('open');
        }
    });


})();