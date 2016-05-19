var $ = require("jquery");

(function () {
    'use strict';

    var $body = $('body');
    var $videoLink = $("[data-video-type]");
    var autoplay = getUrlVar()['autoplay'];
    var modalIsOpen = false;

    $videoLink.on('click', function (e) {

        e.preventDefault();

        var $this = $(this);
        var videoType = $this.data('video-type');
        var videoId = $this.data('video-id');

        $this.addClass('visited');

        // Create the video iFrame
        var $videoFrame = createVideoFrame(videoType, videoId);

        // Create the vido modal and show it
        if(!modalIsOpen) {
            showVideoModal($videoFrame);
            modalIsOpen = true;
        }
    });

    $body.on('click', '.rhs-video-modal__close, .rhs-video-modal__overlay', function () {
        removeVideoModal();
        modalIsOpen = false;
    });


    /*
     * Helper functions
     */
    function createVideoFrame(videoType, videoId) {
        switch (videoType) {
            case 'vimeo':
                return '<iframe src="https://player.vimeo.com/video/' + videoId + '?title=0&byline=0&portrait=0&autoplay=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen />';

                break;

            case 'youtube':
                return '<iframe src="http://www.youtube.com/embed/' + videoId + '?autoplay=1&modestbranding=1&rel=0&showinfo=0" frameborder="0" />';

                break;

            default:
                return '<iframe src="https://player.vimeo.com/video/' + videoId + '?title=0&byline=0&portrait=0&autoplay=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen />';

                break;
        }
    }

    function showVideoModal($videoFrame) {
        var $videoModal =  "<div class='rhs-video-modal'>";
                $videoModal += "<div class='rhs-video-modal__box'>";
                    $videoModal += "<span class='rhs-video-modal__close'></span>";
                    $videoModal += $videoFrame;
                $videoModal += "</div>";
                $videoModal += "<div class='rhs-video-modal__overlay'></div>";
            $videoModal += "</div>";

        $($videoModal).appendTo('body').fadeIn();
    }

    function removeVideoModal() {
        $('.rhs-video-modal').fadeOut().promise().done(function () {
            $(this).remove();
        });
    }

    function getUrlVar() {
        var variables = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,
            function(m,key,value) {
                variables[key] = value;
            });
        return variables;
    }

    /*
     * Autoplay
     * - At the bottom due to race condition
     */
    if(autoplay) {
        $videoLink.click();
    }

})();