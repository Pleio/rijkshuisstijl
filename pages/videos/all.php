<?php
$site = elgg_get_site_entity();

elgg_push_context("videos");
elgg_set_page_owner_guid($site->guid);

if ($site->canWriteToContainer(0, "object", "videos")) {
    elgg_register_title_button();
}

$options = array(
    "type" => "object",
    "subtype" => "videos",
    "full_view" => false,
    "fast_pagination" => true
);

$title = elgg_echo("videos");

$body = elgg_view_layout("content", array(
    "title" => "",
    "filter" => "",
    "content" => elgg_view("videos/pages/all", array(
        "entities" => elgg_list_entities($options)
    ))
));

echo elgg_view_page($title, $body);
