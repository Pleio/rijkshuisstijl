<?php
$response = get_input("response");
$guid = get_input("guid");

$poll = get_entity($guid);
if (!$poll || !elgg_instanceof($poll, "object", "poll")) {
    register_error(elgg_echo("polls:notfound"));
    forward("/#poll");
    exit();
}

if (empty($response)) {
    register_error(elgg_echo("polls:novote"));
    forward("/#poll");
    exit();
}

if (!rijkshuisstijl_can_vote_on_poll($poll)) {
    register_error(elgg_echo("polls:save:failure"));
    forward("/#poll");
    exit();
}

$user_guid = elgg_get_logged_in_user_guid();

// check to see if this user has already voted
$options = [
    "annotation_name" => "vote",
    "annotation_owner_guid" => $user_guid,
    "guid" => $guid
];

$result = elgg_get_annotations($options);

if ($result) {
    $result = $result[0];
    $result->value = $response;
    $result->save();
} else {
    $poll->annotate("vote", $response, $poll->access_id);
    $polls_vote_in_river = elgg_get_plugin_setting("vote_in_river","polls");
    if ($polls_vote_in_river != "no") {
        add_to_river("river/object/poll/vote","vote",$user_guid,$poll->guid);
    }
}

system_message(elgg_echo("polls:responded"));
forward("/#poll");