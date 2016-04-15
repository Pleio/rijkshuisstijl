var $ = require("jquery");

(function () {
    'use strict';

    var $body = $('body');

    /*
     * Intake form
     */
    var $intakeForm = $('#intake-form');
    $intakeForm.submit(function(e){
        var $situationRadio = $intakeForm.find('input[name=situation]:checked');
        var $businessRadio = $intakeForm.find('input[name=business]:checked');
        var $error = $intakeForm.find('.error');

        if ( ! $situationRadio.length || ! $businessRadio.length) {
            $error.fadeIn();
            e.preventDefault();
        }
    });

    var $intakeStartButton = $('.intake-start');

    $intakeStartButton.click(function(e){
        e.preventDefault();
        $('body').addClass('modal--open');
    });

    /*
     * Accordion
     */
    $body.on('click', '.accordion .trigger', function () {
        var $this = $(this);
        var $parent = $this.parents('.accordion');
        var $parentItem = $this.parent('.accordion__item');

        if ( ! $parentItem.hasClass('open')) {
            $parent.find('.open').removeClass('open').promise().done(function () {
                $parentItem.addClass('open');
            });
        } else {
            $parentItem.toggleClass('open');
        }
    });

    /*
     * Scale value picker
     */
    $body.on('click', '.scale .scale__value__input', function () {
        var $this = $(this);
        var $parent = $this.parents('.scale');
        var $scaleValueInput = $this.find('input');
        var $submitButton = $this.parents('form').find('button[type="submit"]');

        $parent.find('.chosen').removeClass('chosen').promise().done(function () {
            $this.addClass('chosen');
            $scaleValueInput.prop('checked', true).trigger('change');
            $submitButton.removeAttr('disabled');
        });
    });



    /*
     * Help toggle
     */
    var $helpTrigger = $('.help-trigger');

    $helpTrigger.on('click', function () {
        var $this = $(this);
        var targetId = $this.data('target');

        $this.toggleClass('active');
        $(targetId).slideToggle();
    });

    $(".oc-back").click(function(e){
        e.preventDefault();
        window.history.go(-1);
    });


/*    $(".selecter-default").selecter({
        callback: selecterCallback
    });
    function selecterCallback(){
    }


    $(".selecter-menu").selecter({
        links: true
    });*/




    $(".rhs-answer-edit-block__content").on("change", function(){
        if($(this).val().length == 0) {
            $(this).parent("div").child(".rhs-answer-edit-block__submit").attr("disabled", true);
        } else {
            $(this).parent("div").child(".rhs-answer-edit-block__submit").attr("disabled", false);
        }
    });


    //fast-click for devices to remove 300ms delay
    var FastClick = require('fastclick');
    FastClick.attach(document.body);





})();
