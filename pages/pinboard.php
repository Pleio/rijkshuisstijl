<?php
$site = elgg_get_site_entity();
elgg_set_page_owner_guid($site->guid);

$title = elgg_echo("rijkshuisstijl:pinboard");
$content = elgg_view("rijkshuisstijl/pages/pinboard");

echo elgg_view_page($title, $content, "default", array(
    'leader' => elgg_view('rijkshuisstijl/leader/pinboard'),
    'body_class' => 'background-grey'
));