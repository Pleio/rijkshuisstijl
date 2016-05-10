<?php
$site = elgg_get_site_entity();

elgg_set_page_owner_guid($site->guid);

$content = elgg_view('rijkshuisstijl/elements/forum');

$content .= '<div class="rhs-home__section">';
$content .= '<div class="rhs-container">';
$content .= elgg_view('rijkshuisstijl/elements/news');
$content .= '</div>';
$content .= '</div>';

$content .= elgg_view('rijkshuisstijl/elements/videos');

echo elgg_view_page("", $content, "default", array(
    'leader' => elgg_view('rijkshuisstijl/leader/home')
));