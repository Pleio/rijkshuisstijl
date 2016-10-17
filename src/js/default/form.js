var $ = require("jquery");

(function () {
    'use strict';

    var $body = $('body');

    var validate = function($input, showMessage) {
        var $label = $input.parent('label');

        var value = $input.val();
        var required = $input.prop('required');
        var validation = $input.attr('data-validation');
        var validationMessage = $input.attr('data-validationMessage');

        if ( /^duplicateOf=\w+$/.test(validation) ) { // duplicateOf
            var duplicateInputId = '#'+validation.replace(/^duplicateOf=/,'')
            var $duplicateInput = $(duplicateInputId);
            var valid = ($duplicateInput.val() === value);
        } else if (/^number(=(\d*)(?:-(\d*)|)|)$/.test(validation) ) { // number
            var valid = true;
            var parseIntValue = parseInt(value);
            var numberMatches = validation.match(/number(?:=(\d*)(?:-(\d*)|))/);
                var min = parseInt(numberMatches[1]) || false;
                var max = parseInt(numberMatches[2]) || false;

            if( value === '' ) {
                valid = false;
            } else if( /^\d+$/.test(value) ) {
                if( min && (parseIntValue < min) ) {
                    valid = false;
                }
                if( max && (parseIntValue > max) ) {
                    valid = false;
                }
            } else {
                valid = false;
            }
        } else { // regex
            var valid = (new RegExp('^'+validation+'$', 'm')).test(value);
        }

        // Show indication
        if( showMessage ) {

            if( required && ! /.+/.test(value) ) {
                if( !$label.hasClass('__problem') ){
                    $label.addClass('__required');
                    $label.addClass('__problem');
                    if( validationMessage ) {
                        $label.append('<span class="rhs-form__label-message rhs-form__label-message--problem">Dit veld is verplicht</span>');
                    }
                }
            } else if( ! valid ){
                if( !$label.hasClass('__problem') ){
                    $label.addClass('__invalid');
                    $label.addClass('__problem');
                    if( validationMessage ) {
                        $label.append('<span class="rhs-form__label-message rhs-form__label-message--problem">'+validationMessage+'</span>');
                    }
                }
            } else {
                $label.removeClass('__problem');
                $label.removeClass('__required');
                $label.children('.rhs-form__label-message').remove();
            }

        }

        return valid;
    }

    var validateInputs = function($label, showMessage) {
        var valid = true;
        var inputIds = ($label.attr('data-inputids')).split(/, /);
        var validationMessage = $label.attr('data-validationMessage');

        for( var i=0; i<inputIds.length; i++ ) {
            var $input = $('#'+inputIds[i]);
            var $inputLabel = $input.parent('label');

            if( $inputLabel.hasClass('__problem') ) {
                valid = false;
            }
        }

        if( showMessage ) {
            if( !valid ) {
                if( $label.children('.rhs-form__label-message').length === 0 ){
                    $label.append('<span class="rhs-form__label-message rhs-form__label-message--above-input rhs-form__label-message--problem">'+validationMessage+'</span>');
                }
            }
        }

        if( valid ) {
            $label.children('.rhs-form__label-message').remove();
        }

        return valid;
    }

    var validateCheckbox = function($input, showMessage) {
        var $label = $input.parent('label');

        var checked = $input.prop('checked');
        var required = $input.prop('required');
        var validationMessage = $input.attr('data-validationMessage');

        var valid = true;
            if ( required && ! checked ) {
                valid = false;
            }

        if( showMessage ) {
            if( !valid ) {
                if( !$label.hasClass('__problem') ){
                    $label.addClass('__invalid');
                    $label.addClass('__problem');
                    $label.append('<span class="rhs-form__label-message rhs-form__label-message--problem rhs-form__label-message--inline">'+validationMessage+'</span>');
                }
            } else {
                $label.removeClass('__problem');
                $label.removeClass('__required');
                $label.children('.rhs-form__label-message').remove();
            }
        }

        return valid;
    }

    var validateSelecter = function($selecter, showMessage) {
        var $label = $selecter.parent().parent('label');

        var value = $selecter.val();
        var validationMessage = $selecter.attr('data-validationMessage');

        var valid = true;
            if(!value) {
                valid = false;
            }

        if( showMessage ) {
            if( !valid ) {
                if( !$label.hasClass('__problem') ){
                    $label.addClass('__invalid');
                    $label.addClass('__problem');
                    $label.append('<span class="rhs-form__label-message rhs-form__label-message--problem rhs-form__label-message">'+validationMessage+'</span>');
                }
            } else {
                $label.removeClass('__problem');
                $label.removeClass('__required');
                $label.children('.rhs-form__label-message').remove();
            }
        }

        return valid;
    };

    var validateRadioGroup = function($radioGroup, showMessage) {
        var $label = $radioGroup;

        var validationMessage = $radioGroup.attr('data-validationMessage');

        var valid=true;
            if( ! $radioGroup.children("label").children("input").is(":checked") ) {
                valid = false;
            }

        if( showMessage ) {
            if( !valid ) {
                if( !$label.hasClass('__problem') ){
                    $label.addClass('__invalid');
                    $label.addClass('__problem');
                    $label.append('<span class="rhs-form__label-message rhs-form__label-message--problem rhs-form__label-message">'+validationMessage+'</span>');
                }
            } else {
                $label.removeClass('__problem');
                $label.removeClass('__required');
                $label.children('.rhs-form__label-message').remove();
            }
        }

        return valid;
    };

    var validateForm = function($form, showMessages){
        var valid = true;

        $form.find('.js-validateInput').each(function(){
            if( !validate($(this), showMessages) ) {
                valid = false;
            }
        });

        $form.find('.js-validateCheckbox').each(function(){
            if( !validateCheckbox($(this), showMessages) ) {
                valid = false;
            }
        });

        $form.find('.js-validateSelecter').each(function(){
            if( !validateSelecter($(this), showMessages) ) {
                valid = false;
            }
        });

        $form.find('.js-validateRadioGroup').each(function(){
            if( !validateRadioGroup($(this), showMessages) ) {
                valid = false;
            }
        });

        $form.find('.js-validateInputs').each(function(){
            if( !validateInputs($(this), showMessages) ) {
                valid = false;
            }
        });

        if ( valid ) {
            $form.find('.js-submitForm').removeClass('rhs-button--disabled');
        } else {
            $form.find('.js-submitForm').addClass('rhs-button--disabled');
        }

        return valid;
    }

    // Input validation interactions

    $body.on('change', '.js-validateCheckbox', function(e) {
        validateCheckbox($(this),true);
        validateForms();
    });

    $body.on('click', '.js-validateRadioGroup', function(e) {
        validateForms();
    });

    $body.on('change', '.js-validateSelecter', function(e) {
        validateForms();
    });

    $body.on('input', '.js-validateInput', function(e) {
        var $input = $(e.target);
        var $label = $input.parent('label');

        if( $input.attr('data-only-validate-on-submit') === undefined || $label.hasClass('__problem') ) {

            var value = $input.val();

            var required = $input.prop('required');

            // Remove required message (if there is one)
            if( $label.hasClass('__required') && required && /.+/.test(value) ){
                $label.removeClass('__problem');
                $label.removeClass('__required');
                $label.children('.rhs-form__label-message').remove();
            }

            // Remove valid message (if there is one)
            if( $label.hasClass('__invalid') ){
                var validation = $input.attr('data-validation');
                var validationMessage = $input.attr('data-validationMessage');

                var valid = validate($input, false);

                if( valid ){
                    $label.removeClass('__problem');
                    $label.removeClass('__invalid');
                    $label.children('.rhs-form__label-message').remove();
                }
            }

            validateForms();
        }

        if ( $input.attr('data-goToNextField') ) {
            var $nextInput = $('#'+$input.attr('data-goToNextField'));
            var validation = $input.attr('data-goToNextField-validation');
            if ( (new RegExp('^'+validation+'$')).test(value) ) {
                $nextInput.focus().select();
            }
        }

    }).on('blur', '.js-validateInput', function(e) {
        var $input = $(e.target);
        var $label = $input.parent('label');
        if( $input.attr('data-only-validate-on-submit') === undefined || $label.hasClass('__problem') ) {
            var valid = validate($input, true);
        }
    })

    // Validate form interactions

    $body.on('submit', '.js-validateForm', function(e) {
        // make sure tinyMCE forms are saved first
        tinyMCE.triggerSave();

        var $form = $(e.target);
        var valid = validateForm($form, true)

        if ( ! valid ) {
            e.preventDefault();
        }
    });

    // Validate forms

    var validateForms = function() {
        $('.js-validateForm').each( function(){
            validateForm($(this), false);
        })
    }

    validateForms();

})();
