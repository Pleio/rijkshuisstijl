<?php
$site = elgg_get_site_entity();
elgg_set_page_owner_guid($site->guid);

$title = elgg_echo("rijkshuisstijl:news");
$content = elgg_view('rijkshuisstijl/pages/news');

echo elgg_view_page($title, $content, "default");