<?php
$site = elgg_get_site_entity();
elgg_set_page_owner_guid($site->guid);

$topic = get_input('topic');
if ($topic) {
    $topics = unserialize(elgg_get_plugin_setting('topics', 'rijkshuisstijl'));

    $topic = array(
        'tag' => $topic,
        'title' => $topics[$topic]
    );
}

$title = elgg_echo("rijkshuisstijl:videos");
$content = elgg_view("rijkshuisstijl/pages/videos", array(
    'topic' => $topic
));

echo elgg_view_page($title, $content);