<?php
$site = elgg_get_site_entity();
elgg_set_page_owner_guid($site->guid);

$guid = get_input('guid');

if ($guid) {
    $group = get_entity($guid);
}

if (!$group | !$group instanceof ElggGroup | !$group->featured_group == "yes") {
    register_error(elgg_echo('rijkshuisstijl:topics:not_exists'));
    forward(REFERER);
}

$title = elgg_echo("rijkshuisstijl:topics");
$content = elgg_view("rijkshuisstijl/pages/topics", array(
    'topic' => $group
));

echo elgg_view_page($title, $content, "default", array(
    'leader' => elgg_view('rijkshuisstijl/leader/topic', array(
        'topic' => $group
    ))
));