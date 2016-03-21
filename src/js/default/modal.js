(function () {
    'use strict';

    var $body = $('body');

    var openModal = function($modal) {
        $modal.css({display: 'block'});
        setTimeout( function(){
            $modal.addClass('rhs-modal--open');
            $modal.focus();
        },5);
    }

    var closeModal = function($modal) {
        $modal.removeClass('rhs-modal--open');
        setTimeout( function(){
            $modal.css({display: 'none'});
        },300);
    }

    $(window).keydown(function(event) {
        if( event.keyCode === 27 ) {
            var $lastModal = $('.rhs-modal--open:last');
            if( $lastModal ) {
                closeModal($lastModal);
            }
        }
    });

    $body.on('click', '.js-toggleModal', function (e) {
        e.preventDefault();

        var $this = $(this);
        var $modal = $($this.attr('data-modal-id'));

        // relies on these attributes
        // * data-model-id = #id
        // - toggle = boolean

        if( $modal ) {
            if( $modal.hasClass('rhs-modal--open') ) {
                closeModal($modal);
            } else {
                openModal($modal);
            }
        }
    });

    $('.rhs-modal--open').each( function(){
        $(this).css({display:'block'})
    });


})();