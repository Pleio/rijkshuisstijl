(function () {
    'use strict';

    var $body = $('body');

    var calculateHeight = function() {
        var maxHeight = $(window).height() - 250;
        var height = 80 + $("#js-initiateTinymce_ifr").contents().find('body').height();
        if( maxHeight < height ) {
            height = maxHeight;
        }
        return height;
    };

    if( typeof(tinymce) !== "undefined" ){

        var tinymceObject = false;

        if( $('.rhs-question-modal__form') ) {

          var $titleInput = $('#js-itemTitle');
          var $themeSelect = $('#js-itemTheme'); // .selecter-default

          $titleInput.on('input', function(){
            validateItemForm(false);
          });
          $themeSelect.on('input', function(){
            validateItemForm(false);
          });

          var validateItemForm = function(showMessages) {
            if( tinymceObject ){
              var valid = true;

              // Validate title (if there is one)
              if( $titleInput.length ) {
                if( $titleInput.val().length < 10 ) {
                  valid = false
                }
              }

              // Validate title (if there is one)

              if( $themeSelect.length ) {
                if( $themeSelect.val() == 0 ) {
                  valid = false
                }
              }

              // Validate textarea

              if ( tinymceObject.getContent().length < 20 ) {
                valid = false;
              }

              // Set interaction

              if( valid ) {
                $('#js-tinymceButton').removeClass('rhs-button--disabled');
              } else {
                $('#js-tinymceButton').addClass('rhs-button--disabled');
              }

            }
          };

        }

        // This is in case there's no tinymce loaded into the page
        tinymce.init({
            selector:'#js-initiateTinymce',
            menubar: false,
            plugins: [
                "autolink lists link image anchor",
                "media"
            ],
            body_id: 'content-editable',
            content_css : 'asset/css/all.css',
            target_list: [
                {title: 'New page', value: '_blank'}
            ],
            link_title: false,
            toolbar: "bold italic numlist bullist link image",
            setup : function(ed) {
                tinymceObject = ed;

                setTimeout( function(){
                    $("#js-initiateTinymce_ifr").contents().find('body, html')
                    .css({minHeight: 'auto', height: 'auto'});
                    $("#js-initiateTinymce_ifr").css({ height:calculateHeight() });
                    validateItemForm();
                }, 200);

                ed.on('keydown', function(e) {
                    $("#js-initiateTinymce_ifr").css({ height:calculateHeight() });
                    validateItemForm();
                });

                ed.on('blur', function(e) {
                    $("#js-initiateTinymce_ifr").css({ height:calculateHeight() });
                    validateItemForm();
                });
           }
        });
    }



})();
