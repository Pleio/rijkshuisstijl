<?php
gatekeeper();

$site = elgg_get_site_entity();
elgg_set_page_owner_guid($site->guid);

$topic = get_input('topic');

$topics = unserialize(elgg_get_plugin_setting('topics', 'rijkshuisstijl'));

if (!array_key_exists($topic, $topics)) {
    register_error(elgg_echo('rijkshuisstijl:topics:not_exists'));
    forward(REFERER);
}

$topic = array(
    'tag' => $topic,
    'title' => $topics[$topic]
);

$content = elgg_view("rijkshuisstijl/pages/topics", array(
    'topic' => $topic
));

echo elgg_view_page("", $content, "default", array(
    'leader' => elgg_view('rijkshuisstijl/leader/topic', array(
        'topic' => $topic
    ))
));