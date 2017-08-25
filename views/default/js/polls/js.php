<?php ?>
//<script>
elgg.provide('elgg.polls');

elgg.polls.init = function() {
    $('.poll-toggle-results').live('click', elgg.polls.toggleResults);
    $('.poll-vote-button').live('click', function(e) {
        e.preventDefault();
        var guid = $(this).attr("rel");
        // prevent multiple clicks
        $(this).attr("disabled", "disabled");
        // submit the vote and display the response when it arrives
        elgg.action('action/polls/vote', {data: $('#poll-vote-form-'+guid).serialize(),
            success: function(response) {
                $('#poll-container-'+guid).html(response.result);
                $('#poll-toggle-results-' + guid).toggle();
                $('#poll-show-responses-' + guid).toggle();
            }
        });
    });

    $(".poll-add-link").live("click", function(e) {
        e.preventDefault();

        var $parent = $(this).parent();
        var $options = $parent.find(".links-options");

        var i = $options.find(".link").length;
        if (i > 2) {
            return;
        }

        i = i + 1;

        var template = $parent.find(".link-template").html();
        template = template.replace("{{i}}", i);

        $options.append(template);
    });

    $(".poll-delete-link").live("click", function(e) {
        e.preventDefault();
        $(this).parent().parent().remove();
    });
};

elgg.polls.toggleResults = function(e) {
    e.preventDefault();

    // toggle form
    var guid = $(this).data("guid");

    $("#poll-container-" + guid).children().slideToggle();

    var text = $(this).html();
    if (text == elgg.echo("polls:show_poll")) {
        $(this).html(elgg.echo("polls:show_results"));
    } else {
        $(this).html(elgg.echo("polls:show_poll"));
    }
}

elgg.register_hook_handler('init', 'system', elgg.polls.init);
