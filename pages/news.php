<?php
$site = elgg_get_site_entity();
elgg_set_page_owner_guid($site->guid);

$guid = get_input('guid');

if ($guid) {
    $group = get_entity($guid);
}

if ($guid && (!$group | !$group instanceof ElggGroup | !$group->featured_group == "yes")) {
    register_error(elgg_echo('rijkshuisstijl:topics:not_exists'));
    forward(REFERER);
}

$category = get_input('category');
if (!in_array($category, array('nieuws', 'juris', 'geselecteerd'))) {
    $category = array('nieuws', 'juris', 'redactie');
}

$title = elgg_echo("rijkshuisstijl:news");
$content = elgg_view("rijkshuisstijl/pages/news", array(
    'topic' => $group,
    'category' => $category
));

echo elgg_view_page($title, $content, "default");