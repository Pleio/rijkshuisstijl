<?php
/**
 * Delete comment entity
 *
 * @package Elgg.Core
 * @subpackage Comments
 */

$comment_guid = get_input('guid');
$comment = get_entity($comment_guid);

if (!$comment || $comment->type !== "object" || !in_array($comment->getSubtype(), ["comment", "answer"])) {
    register_error(elgg_echo("generic_comment:notfound"));
    forward(REFERER);
}

if (!$comment->canEdit()) {
    register_error(elgg_echo("actionunauthorized"));
    forward(REFERER);
}

if ($comment->delete()) {
    system_message(elgg_echo('generic_comment:deleted'));
} else {
    register_error(elgg_echo('generic_comment:notdeleted'));
}

forward(REFERER);