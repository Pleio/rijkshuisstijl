var $ = require("jquery");

(function () {
    'use strict';

    var submitVote = function(guid, type, updateElement) {
        elgg.action('rijkshuisstijl/vote', {
          data: {
            guid: guid,
            type: type
          },
          success: function (response) {
            if (response.status == 0) {
                if (type == "upvote") {
                    var newValue = parseInt(updateElement.text()) + 1;
                } else if (type == "downvote") {
                    var newValue = parseInt(updateElement.text()) - 1;
                }

                updateElement.text(newValue);
            }
          }
        });
    };

    $("[data-vote-up]").on('click', function(e) {
        submitVote($(this).data('guid'), "upvote", $(this).parent().children("[data-vote-points]"));
    });

    $("[data-vote-down]").on('click', function(e) {
        submitVote($(this).data('guid'), "downvote", $(this).parent().children("[data-vote-points]"));
    })

})();