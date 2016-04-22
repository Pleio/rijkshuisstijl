/*

.js-liveForm

.js-liveEdit
- open
    - save
    - cancel
- openAll
    - saveAll
    - cancelAll

*/

//
// `.js-editableField` relies on these attributes:
//      - data-type="(text|date|email|website|tel)"
//      * data-name="name"
//      * data-value="value"
//      - data-placeholder="placeholder"
//      - required
//

var $ = require("jquery");

jQuery(document).ready(function () {
    'use strict';

    var $body = $('body');

    var getFieldAttributes = function($field){

        var throwReferenceError = function(attr) {
            throw new ReferenceError('Attribute `'+attr+'` missing for a .js-editableField');
            return false;
        };

        return {
            interaction: $field.attr('data-interaction') ? parseInt($field.attr('data-interaction')) : true,
            type: $field.attr('data-type') ? $field.attr('data-type') : 'text',
            name: $field.attr('data-name') ? $field.attr('data-name') : throwReferenceError('data-name'),
            value: ( $field.attr('data-value') !== undefined ) ? $field.attr('data-value') : throwReferenceError('data-value'),
            placeholder: $field.attr('data-placeholder') ? $field.attr('data-placeholder') : '',
            required: $field.attr('required') ? true : false,
            classname: $field.attr('data-classname') ? $field.attr('data-classname') : ''
        };
    }

    var openField = function($field) {
        if ( ! $field.hasClass('js-editableField--opened') ) {
            var attributes = getFieldAttributes($field);
            $field.html('<input class="rhs-form__input rhs-form__input--fit js-validateInput js-editableField-input" type="'+
                attributes.type+'" placeholder="'+
                attributes.placeholder+'" autofocus="" required value="'+attributes.value+'">')
            setTimeout( function(){
                $field.children('input:first').focus();
            }, 30);
            $field.addClass('js-editableField--opened');
        }
    };

    var blurField = function($input) {
        var $field = $input.parent();
        $field.removeClass('js-editableField--opened');
        $field.attr('data-value', $field.children('input').val());
        var name = $field.attr('data-name');
        var value = $input.val();
        setField($field);
        try {
            editFieldCallBack(name,value);
        } catch(error) {
            //throw new ReferenceError('Function `editFieldCallBack()` missing! Data cannot be saved.');
        }
    };

    var setField = function($field) {
        var attributes = getFieldAttributes($field);
        if ( attributes.interaction ) {
            if ( attributes.value === '' ) {
                $field.html('<a class="editable-field-link editable-field-link--empty js-openEditableField '+attributes.classname+'" href="#Edit field" title="Voeg veld toe"> </a>');
            } else {
                $field.html('<a class="editable-field-link '+attributes.classname+'" href="#Edit field" title="Update veld">'+attributes.value+'</a>');
            }
        }
    };

    var editFieldCallBack = function(name, value)
    {
        
    };

    $body.on('click', '.js-editableField', function(e){
        e.preventDefault();
        openField($(this));
    });
    $body.on('focusout', '.js-editableField-input', function(){
        blurField($(this));
    });

    // Process initial state of editableField

    $('.js-editableField').each(function(){
        setField($(this));
    });

    //
    //
    //
    //

    $body.on('click', '.js-editableFieldsToggle', function(e){
        e.preventDefault();

        var $fields = $(this).parent();
        var toggledClassName = 'js-editableFields--toggled';

        if( $fields.hasClass(toggledClassName) ) {
            $fields.removeClass(toggledClassName);
            $fields.children('dl').children('.js-editableField').attr('data-interaction',1);
            setTimeout( function(){
                $fields.children('dl').children('.js-editableField').children('input').each(function(){
                    console.log($(this))
                    blurField($(this));
                });
            }, 100)

        } else {
            $fields.addClass(toggledClassName);
            $fields.children('dl').children('.js-editableField').each(function(){
                $(this).attr('data-interaction',0);
                openField($(this));
            });
        }
    });

})();