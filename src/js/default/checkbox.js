/*
 * Checkbox input
 */

var $ = require("jquery");

 (function () {
    'use strict';

    var $body = $('body');

    $body.on('change', '.rhs-checkbox__input', function (e) {
        var $input = $(e.target);
        var $label = $input.parent('label');

        if ( $label.hasClass('chosen') ) {
            $label.removeClass('chosen');
        } else {
            $label.addClass('chosen');
        }
    }).on('focusin', '.rhs-checkbox__input', function (e) {
        var $input = $(e.target);
        var $label = $input.parent('label');
        $label.addClass('focus');
    }).on('focusout', '.rhs-checkbox__input', function (e) {
        var $input = $(e.target);
        var $label = $input.parent('label');
        $label.removeClass('focus');
    });

    // "Check" the checkbox switches (on page load)

    $('.rhs-checkbox__input').each( function(e){
        var $input = $(this);
        var $label = $input.parent('label');

        if ( $input.prop('checked') ) {
            $label.addClass('chosen');
        } else {
            $label.removeClass('chosen');
        }
    });

})();