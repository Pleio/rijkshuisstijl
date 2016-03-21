/*
 * Radio buttons
 */

 (function () {
    'use strict';

    var $body = $('body');

    $body.on('change', '.rhs-radio__input', function (e) {
        var $input = $(e.target);
        var $label = $input.closest('label');
        var $radios = $input.closest('.rhs-radios');
        var $submitButton = $input.closest('form').find('button[type="submit"]');

        $radios.find('.chosen').removeClass('chosen');
        $label.addClass('chosen');
        $submitButton.removeAttr('disabled');
    }).on('focusin', '.rhs-radio__input', function (e) {
        var $input = $(e.target);
        var $label = $input.parent('label');
        $label.addClass('focus');
    }).on('focusout', '.rhs-radio__input', function (e) {
        var $input = $(e.target);
        var $label = $input.parent('label');
        $label.removeClass('focus');
    });

    // "Check" the radio (on page load)

})();