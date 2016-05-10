<?php
$site = elgg_get_site_entity();

elgg_set_page_owner_guid($site->guid);

$content = '<div class="rhs-news">';
$content .= '<div class="rhs-container">';
$content .= elgg_view("rijkshuisstijl/elements/news", array(
    'full_view' => true
));
$content .= '</div>';
$content .= '</div>';

echo elgg_view_page("", $content, "default");