var $ = require("jquery");

(function () {
    'use strict';

    $('.rhs-step').each(function() {
        var $step = $(this);

        $(this).find('[data-step-next]').on('click', function(e) {
            e.preventDefault();
            validateStep($step);
        })
    });

    var step = 0;

    $('[data-step-previous]').on('click', function(e) {
        if (step > 0) {
            step -= 1;
        } else {
            return;
        }

        var steps = $('.rhs-step');
        $(steps[(step+1)]).hide();
        $(steps[step]).show();
    });

    var nextStep = function() {
        var steps = $('.rhs-step');

        if (step <= steps.length) {
            step += 1;
        } else {
            return;
        }

        $(steps[(step-1)]).hide();
        $(steps[step]).show();
    }

    var validateBecon = function($input) {
        elgg.action('rijkshuisstijl/validate_becon', {
            data: { becon: $input.val() },
            success: function(json) {
                if (json.output.is_valid) {
                    hideError($input);
                    nextStep();
                } else {
                    showError($input);
                }
            }
        });
    }

    var validateRegisterEmail = function($input, onSuccess) {
        elgg.action("profile_manager/register/validate", {
                data: { name: "email", email: $input.val() },
                success: function(data) {
                    if (data.output) {
                        if (data.output.status) {
                            hideError($input);
                            if (onSuccess) {
                                onSuccess();
                            }
                        } else {
                            showError($input, data.output.text);
                        }
                    }
                }
        });
    };

    $('.js-validateRegisterEmail').on('change', function(e) {
        validateRegisterEmail($(e.target));
    });

    var validateStep = function($step) {
        var $beconInput = $step.find('.js-validateBecon');
        if ($beconInput.length > 0) {
            return validateBecon($beconInput);
        }

        var $emailInput = $step.find('.js-validateRegisterEmail');
        if ($emailInput.length > 0) {
            return validateRegisterEmail($emailInput, function() {
                nextStep();
            });
        }
    };

    var showError = function($input, validationMessage) {
        var $label = $input.parent('label');

        if (!validationMessage) {
            validationMessage = $input.attr('data-validationMessage');
        }

        if (!$label.hasClass('__problem')) {
            $label.addClass('__invalid');
            $label.addClass('__problem');
            $label.append('<span class="rhs-form__label-message rhs-form__label-message--above-input rhs-form__label-message--problem">'+validationMessage+'</span>');
        }
    };

    var hideError = function($input) {
        var $label = $input.parent('label');

        $label.removeClass('__problem');
        $label.removeClass('__required');
        $label.children('.rhs-form__label-message').remove();
    };

})();