<?php
gatekeeper();

$site = elgg_get_site_entity();
elgg_set_page_owner_guid($site->guid);

$content = elgg_view('rijkshuisstijl/pages/news');

echo elgg_view_page("", $content, "default");