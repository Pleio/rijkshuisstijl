(function () {
    'use strict';

    var $body = $('body');

    var $toggleAnswerForm = $('[data-forum-answer-toggle]');
    var $closeAnswerForm = $('[data-forum-answer-close]');
    var $answerBlock = $('[data-forum-answer-block]');

    var answerBlockOpened = false;
    var height = $answerBlock.height();

    $answerBlock.css({height:0, overflow:'hidden'});

    var toggleAnswerForm = function(open) {
      var open = open || answerBlockOpened;

      if( open ){
        $toggleAnswerForm.removeClass('rhs-button--primary');
        height = $answerBlock.height();
        $answerBlock.css({height:height, overflow:'hidden'}).animate({height:0}, 100, function(){
          $answerBlock.removeClass('rhs-edit-block__wrapper--open');
        });
      } else {
        $toggleAnswerForm.addClass('rhs-button--primary');
        $answerBlock.addClass('rhs-edit-block__wrapper--open');
        $answerBlock.animate({height:height}, 200, function(){
          tinymce.get('data-forum-answer-textarea').focus();
          $(this).attr('style','');
        });
      }

      answerBlockOpened = !open;
    }

    $toggleAnswerForm.click( function(e){
      e.preventDefault();
      toggleAnswerForm();
    });

    $closeAnswerForm.click( function(e){
      e.preventDefault();
      toggleAnswerForm(true);
    });

})();
