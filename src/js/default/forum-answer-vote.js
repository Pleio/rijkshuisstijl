(function () {
    'use strict';

    $(".forum-answer__vote").on('click', function(e){
        e.preventDefault();

        if($(this).hasClass("active")){
            $(this).removeClass("active");
        } else {
            $(this).siblings(".forum-answer__vote").removeClass("active");
            $(this).addClass("active");
        }
    });



})();