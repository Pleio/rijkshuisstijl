// require non-NPM libraries
require("./plugins/jquery.dotdotdot-1.7.4.js");

require("./default/accordion.js");
require("./default/filter-select.js");
require("./default/app.js");
require("./default/autocomplete.js");
require("./default/checkbox-switch.js");
require("./default/checkbox.js");
require("./default/dotdotdot.js");
require("./default/dropdown.js");
require("./default/editable-field.js");
require("./default/editable-text.js");
require("./default/form.js");
require("./default/forum-answer-block.js");
require("./default/forum-answer-vote.js");
require("./default/mobile-menu.js");
require("./default/mobile-nav-sub-menu.js");
require("./default/modal.js");
require("./default/nav-search.js");
require("./default/profile-upload.js");
require("./default/question-modal.js");
require("./default/radio.js");
require("./default/scroll-to.js");
require("./default/selector.js");
require("./default/share-button.js");
require("./default/video-block.js");
require("./default/video-player.js");

require("./rijkshuisstijl/index");


var jQuery = require("jquery");
jQuery(document).ready(function () {
    var els = jQuery('.elgg-form-login fieldset div input');
    if (els.length > 0)
    {
        els.prev('<br/>');
    }

    jQuery('#passwordChangeForm').submit(function (event) {
        event.preventDefault();

        elgg.action('rijkshuisstijl/profile/changepassword', {
            data: {
              username: gUsername,
              currentPassword: jQuery('#password').val(),
              newPassword: jQuery('#new_password').val(),
              newPasswordValidation: jQuery('#newPasswordValidation').val()
            },
            success: function (wrapper) {
              location.reload();
            }
        });
    });

    var interestFields = jQuery("input[name='interests']");
    interestFields.click(function ()
    {
        setTimeout(function () {
        var interests = [];

        interestFields.each(function (index) {
            interestField = $(this);
            if (interestField.is(":checked"))
              interests.push(interestField.attr('interest-id'));
        });

        elgg.action('rijkshuisstijl/profile/setprofilefield', {
          data: {
            username: gUsername,
            name: 'interests',
            value: JSON.stringify(interests)
          },
          success: function (wrapper) {

          }
        })}, 100);
    });

    $('#option-1').click(function ()
    {
      setTimeout(function () {
        var newValue = $('#option-1').is(':checked') ? 1 : 0;

        elgg.action('/action/notificationsettings/save', {
          data: {
            guid: gUserGuid,
            emailpersonal: newValue
          },
          success: function (wrapper) {

          }
        })
      }, 100);
    });

    $('#option-2').click(function ()
    {
      setTimeout(function () {
        var newValue = $('#option-2').is(':checked') ? 1 : 0;

        elgg.action('/action/newsletter/subscriptions', {
          data: {
            block_all: 0,
            user_guid: gUserGuid,
            "subscriptions" : {
              gElggSiteGuid: newValue
            }
          },
          success: function (wrapper) {

          }
        })
      }, 100);
    });

    $('#emailChangeForm').submit(function (event) {
        event.preventDefault();
        var email = $('#emailAddress').val();

        elgg.action('/action/usersettings/save', {
          data: {
            guid: gUserGuid,
            name: gName,
            language: gLanguage,
            email: email
          },
          success: function (wrapper) {

          }
        });

        gEmail = email;
    });

    $('#taalinstellingen').change(function () {
      
      elgg.action('rijkshuisstijl/profile/setprofilefield', {
        data: {
          username: gUsername,
          name: 'language',
          value: '"' + $(this).val() + '"'
        },
        success: function (wrapper) {
          location.reload();
        }
      });
    });

    jQuery('select[name="groupNotifications"]').change(function (e) {
      var groupGuid = jQuery(this).data('group-id');
      var value = jQuery(this).val();

      var settings = {};
      settings[groupGuid] = value;

      elgg.action('/action/digest/update/usersettings', {
        data: {
          user_guid: elgg.page_owner.guid,
          digest: settings
        },
        success: function(wrapper) {}
      });

      /*elgg.action('/action/notificationsettings/groupsave', {
        data: {
          guid: gUserGuid
        },
        success: function (wrapper) {

        }
      });*/
    });
});