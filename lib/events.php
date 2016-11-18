<?php

function rijkshuisstijl_create_object_handler($event, $type, ElggObject $object) {
    if (empty($object)) {
        return;
    }

    if (!elgg_is_active_plugin("content_subscriptions")) {
        return;
    }

    if (!elgg_instanceof($object, "object", "question")) {
        return;
    }

    $user = elgg_get_logged_in_user_entity();
    if (!$user) {
        return;
    }

    content_subscriptions_subscribe($object->guid, $user->guid);
}