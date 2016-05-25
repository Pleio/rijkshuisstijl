<?php

$guid = (int) get_input("guid");
$type = get_input("type");
$user = elgg_get_logged_in_user_entity();

if (!$type || !in_array($type, array('upvote', 'downvote'))) {
    $type = "upvote";
}

$entity = get_entity($guid);
if (!$entity) {
    forward(REFERER);
}

if (!$entity instanceof ElggAnswer && !$entity instanceof ElggComment) {
    forward(REFERER);
}

$past_vote = elgg_get_annotations(array(
    'guid' => $entity->guid,
    'annotation_name' => 'vote',
    'annotation_owner_guid' => $user->guid,
    'order_by' => 'n_table.time_created DESC'
));

if ($past_vote) {
    $past_vote = $past_vote[0];
    $past_type = ($past_vote->value == 1 ? "upvote" : "downvote");
}

if ($past_vote) {
    if ($type != $past_type) {
        $past_vote->delete();
    } else {
        register_error(elgg_echo("rijkshuisstijl:vote:already_voted"));
    }
} else {
    if ($type == "upvote") {
        $score = 1;
    } else {
        $score = -1;
    }

    if (!$entity->annotate('vote', $score, $entity->access_id)) {
        register_error(elgg_echo("rijkshuisstijl:vote:could_not_vote"));
    }
}

?>