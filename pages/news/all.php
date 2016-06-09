<?php

$category = get_input('category', null);
$site = elgg_get_site_entity();

elgg_push_context('news');
elgg_set_page_owner_guid($site->guid);

if ($site->canWriteToContainer(0, 'object', 'news')) {
    elgg_register_title_button();
}

$options = array(
    'type' => 'object',
    'subtype' => 'news',
    'full_view' => false
);

$topic = (int) get_input('topic', 'mine');
if ($topic) {
    if ($topic == "mine") {
        $interests = rijkshuisstijl_get_interests(elgg_get_logged_in_user_entity());
        if ($interests) {
            $options['container_guid'] = $interests;
        }
    } else {
        $options['container_guid'] = $topic;
    }
}

var_dump($interests);

$category = get_input('category', null);
if ($category) {
    $tags = get_metastring_id("tags");
    $juris = get_metastring_id("juris");

    $options['joins'] = "LEFT JOIN elgg_metadata md ON e.guid = md.entity_guid AND md.name_id = {$tags} AND md.value_id = {$juris}";

    switch ($category) {
        case "news":
            $options['wheres'] = "md.value_id IS NULL";
            break;
        case "jurisprudence":
            $options['wheres'] = "md.value_id IS NOT NULL";
            break;
    }
}

$title = elgg_echo('news');
$body = elgg_view_layout('content', array(
    'title' => '',
    'filter' => '',
    'content' => elgg_view('news/pages/all', array(
        'entities' => elgg_list_entities($options)
    ))
));

echo elgg_view_page($title, $body);
