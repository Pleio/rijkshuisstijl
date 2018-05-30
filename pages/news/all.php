<?php

$category = get_input("category", null);
$site = elgg_get_site_entity();
$user = elgg_get_logged_in_user_entity();

elgg_push_context("news");
elgg_set_page_owner_guid($site->guid);

if ($site->canWriteToContainer(0, "object", "news")) {
    elgg_register_title_button();
}

$options = array(
    "type" => "object",
    "subtype" => "news",
    "full_view" => false,
    "fast_pagination" => true,
    "display_as_list" => false
);

$topic = get_input("topic");
if (!$topic) {
    $topic = "mine";
}

if ($topic == "mine") {
    $interests = rijkshuisstijl_get_interests($user);
    if ($interests) {
        $options["container_guids"] = $interests;
    }
} else {
    $topic = (int) $topic;
    if ($topic) {
        $options["container_guid"] = $topic;
    }
}

$category = get_input("category");
if ($category) {
    $options["metadata_name"] = "tags";
    $options["metadata_value"] = $category;
}

$title = elgg_echo("news");
$body = elgg_view_layout("content", array(
    "title" => "",
    "filter" => "",
    "content" => elgg_view("news/pages/all", array(
        "entities" => elgg_list_entities_from_metadata($options)
    ))
));

echo elgg_view_page($title, $body);
