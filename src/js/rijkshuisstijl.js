// require CSS entry file
require("../less/all.less");

// require non-NPM libraries
require("./plugins/jquery.dotdotdot-1.7.4.js");

require("./default/accordion.js");
require("./default/app.js");
require("./default/autocomplete.js");
require("./default/checkbox-switch.js");
require("./default/checkbox.js");
require("./default/dotdotdot.js");
require("./default/dropdown.js");
require("./default/editable-field.js");
require("./default/editable-text.js");
require("./default/form.js");
require("./default/forum-answer-vote.js");
require("./default/mobile-menu.js");
require("./default/mobile-nav-sub-menu.js");
require("./default/modal.js");
require("./default/nav-search.js");
require("./default/profile-upload.js");
require("./default/question-modal.js");
require("./default/radio.js");
require("./default/scroll-to.js");
require("./default/share-button.js");
require("./default/tinymce.js");
require("./default/video-block.js");
require("./default/video-player.js");

require("./rijkshuisstijl/index");


var jQuery = require("jquery");
jQuery(document).ready(function () {
    var radioElements = jQuery('.elgg-input-radio');
    radioElements.parent().attr('class', 'elgg-input-radio-label');
    radioElements.after('<span class="elgg-input-radio-placeholder"></span>');
    jQuery('.elgg-input-radio-placeholder').click(function () {
        var selector = '.elgg-input-radio[name=' + jQuery(this).prev().attr('name')+ ']';
        jQuery(selector).attr('checked', false);
        jQuery(selector).parent().attr('class', 'elgg-input-radio-label');
        jQuery(this).prev().attr('checked', true);
        jQuery(this).parent().attr('class', 'elgg-input-radio-label chosen');
    });

    var checkBoxElements = jQuery('.elgg-input-checkbox');
    checkBoxElements.parent().attr('class', 'elgg-input-checkbox-label');
    checkBoxElements.after('<span class="elgg-input-checkbox-placeholder"></span>');
    jQuery('.elgg-input-checkbox-placeholder').click(function () {
        var inputNode = jQuery(this).prev();
        var checked = inputNode.attr('checked');
        if (checked)
        {
            inputNode.attr('checked', false);
            jQuery(this).parent().attr('class', 'elgg-input-checkbox-label');
        }
        else
        {
            inputNode.attr('checked', true);
            jQuery(this).parent().attr('class', 'elgg-input-checkbox-label chosen');
        }
    });

    var selectElements = jQuery('.elgg-input-dropdown');
    selectElements.after('<div class="elgg-input-selecter closed"></div>');
    selectElements.each(function() {
        jQuery(this).appendTo(jQuery(this).next());
    });
    selectElements.after('<span class="elgg-input-selecter-selected"></span><div class="elgg-input-selecter-options" style="display: none;"></div>');

    selectElements.each(function() {
        var selectElement = jQuery(this);
        var optionElements = jQuery(this).children();
        var spanElement = jQuery(this).next();
        var divElement = spanElement.next();
        var divParent = jQuery(this).parent();

        spanElement.click(function() {
            selectElement.focus();
        });

        selectElement.focus(function () {
            divParent.attr('class', 'elgg-input-selecter open');
            divElement.attr('style', 'display: block');
        });

        selectElement.blur(function () {
            setTimeout(function() {
                divParent.attr('class', 'elgg-input-selecter closed');
                divElement.attr('style', 'display: none');
            }, 100);
        });

        var first = true;
        optionElements.each(function() {
            if (first)
            {
                spanElement.text(jQuery(this).text());
                first = false;
            }

            if (jQuery(this).attr('value') != undefined)
                divElement.append('<span class="elgg-input-selecter-item" data-value="' + jQuery(this).attr('value') + '">' + jQuery(this).text() + '</span>');
            else
                divElement.append('<span class="elgg-input-selecter-item" data-value="' + jQuery(this).text() + '">' + jQuery(this).text() + '</span>');
        });
    });

    jQuery(document).on('click','.elgg-input-selecter-item', function() {
        jQuery(this).parent().prev().prev().val(jQuery(this).attr('data-value'));
        jQuery(this).parent().prev().text(jQuery(this).text());
    });

    var els = jQuery('.elgg-form-login fieldset div input');
    if (els.length > 0)
    {
        els.prev('<br/>');
    }

    jQuery('#passwordChangeForm').submit(function (event) {
        event.preventDefault();
        
        gUsername
        elgg.action('rijkshuisstijl/profile/changepassword', {
            data: {
              username: gUsername,
              currentPassword: jQuery('#password').val(),
              newPassword: jQuery('#new_password').val(),
              newPasswordValidation: jQuery('#newPasswordValidation').val()
            },
            success: function (wrapper) {
              if (wrapper.output) {
                if (wrapper.output.success == false)
                  alert('An error occurred setting the value.');
              } else {
                // the system prevented the action from running
              }
            }
        });
    });

    $('#interest-1, #interest-2, #interest-3, #interest-4, #interest-5').click(function ()
    {
        setTimeout(function () {
        elgg.action('rijkshuisstijl/profile/setprofilefield', {
          data: {
            username: gUsername,
            name: 'interests',
            value: '[ ' + $('#interest-1').parent().hasClass('chosen') + ', ' + $('#interest-2').parent().hasClass('chosen') + ', ' + $('#interest-3').parent().hasClass('chosen') + ', ' + $('#interest-4').parent().hasClass('chosen') + ', ' + $('#interest-5').parent().hasClass('chosen') + ' ]'
          },
          success: function (wrapper) {
            if (wrapper.output) {
              if (wrapper.output.success == false)
                alert('An error occurred setting the value.');
            } else {
              // the system prevented the action from running
            }
          }
        })}, 100);
    });

    $('#option-1, #option-2').click(function ()
    {
        setTimeout(function () {
        elgg.action('rijkshuisstijl/profile/setprofilefield', {
          data: {
            username: gUsername,
            name: 'notifications',
            value: '[ ' + $('#option-1').parent().hasClass('chosen') + ', ' + $('#option-2').parent().hasClass('chosen') + ' ]'
          },
          success: function (wrapper) {
            if (wrapper.output) {
              if (wrapper.output.success == false)
                alert('An error occurred setting the value.');
            } else {
              // the system prevented the action from running
            }
          }
        })}, 100);
    });

    $('#emailChangeForm').submit(function (event) {
        event.preventDefault();
        
        elgg.action('rijkshuisstijl/profile/setprofilefield', {
          data: {
            username: gUsername,
            name: 'email',
            value: '"' + $('#emailAddress').val() + '"'
          },
          success: function (wrapper) {
            if (wrapper.output) {
              if (wrapper.output.success == false)
                alert('An error occurred setting the value.');
            } else {
              // the system prevented the action from running
            }
          }
        });
    });

    $('#answerButton').click(function (event) {
        event.preventDefault();
        
        elgg.action('object/answer/add', {
          data: {
            description: $('#answerText').val(),
            container_guid: gQuestion,
            guid: ''
          },
          success: function (wrapper) {
            location.reload();
          }
        });
    });

    $('#answerToggle').click(function (event){
        event.preventDefault();

        var blk = $('#answerEditBlock');
        var display = blk.css('display');
        if (display == 'none')
            blk.css('display', 'block');
        else
            blk.css('display', 'none');
    });

    $('.rhs-reaction__upvote').click(function (event){
        event.preventDefault();

        var triggeringElement = $(this);
        
        elgg.action('rijkshuisstijl/questions/vote', {
          data: {
            guid: $(this).attr('reaction-id'),
            up: true,
          },
          success: function (wrapper) {
            if (wrapper.output) 
            {
              if (wrapper.output.success == false)
                alert('An error occurred setting the value.');
              else
              {
                var child = triggeringElement.children('span');
                var value = child.text();
                child.text(parseInt(value) + 1);

                if (wrapper.output.switched)
                {
                  var sibbling = triggeringElement.next();
                  var sibblingChild = sibbling.children('span');
                  value = sibblingChild.text();
                  sibblingChild.text(parseInt(value) - 1);
                }
              }
            } 
            else 
            {
              // the system prevented the action from running
            }
          }
        });
    });

    $('.rhs-reaction__downvote').click(function (event){
        event.preventDefault();

        var triggeringElement = $(this);
        
        elgg.action('rijkshuisstijl/questions/vote', {
          data: {
            guid: $(this).attr('reaction-id'),
            up: false,
          },
          success: function (wrapper) {
            if (wrapper.output) 
            {
              if (wrapper.output.success == false)
                alert('An error occurred setting the value.');
              else
              {
                var child = triggeringElement.children('span');
                var value = child.text();
                child.text(parseInt(value) + 1);

                if (wrapper.output.switched)
                {
                  var sibbling = triggeringElement.prev();
                  var sibblingChild = sibbling.children('span');
                  value = sibblingChild.text();
                  sibblingChild.text(parseInt(value) - 1);
                }
              }
            } 
            else 
            {
              // the system prevented the action from running
            }
          }
        });
    });
});