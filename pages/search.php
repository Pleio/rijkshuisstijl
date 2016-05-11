<?php
$site = elgg_get_site_entity();
elgg_set_page_owner_guid($site->guid);

$query = stripslashes(get_input('q', get_input('tag', '')));
$search_type = get_input('search_type', 'all');

$type = get_input('entity_type', ELGG_ENTITIES_ANY_VALUE);
$subtype = get_input('entity_subtype', ELGG_ENTITIES_ANY_VALUE);

$limit = get_input('limit', 10);
$offset = get_input('offset', 0);

$sort = 'relevance';
$order = 'desc';

$container_guid = get_input('container_guid', ELGG_ENTITIES_ANY_VALUE);
$profile_fields = get_input('elasticsearch_profile_fields');

$results = ESInterface::get()->search(
    $query,
    $search_type,
    $type,
    $subtype,
    $limit,
    $offset,
    $sort,
    $order,
    $container_guid,
    $profile_fields
);

if (function_exists('mb_convert_encoding')) {
    $display_query = mb_convert_encoding($query, 'HTML-ENTITIES', 'UTF-8');
} else {
    // if no mbstring extension, we just strip characters
    $display_query = preg_replace("/[^\x01-\x7F]/", "", $query);
}

$display_query = htmlspecialchars($display_query, ENT_QUOTES, 'UTF-8', false);

$title = elgg_echo("search");
$content = elgg_view("rijkshuisstijl/pages/search", array(
    'filter_type' => $type,
    'filter_subtype' => $subtype,
    'display_query' => $display_query,
    'results' => $results
));

echo elgg_view_page($title, $content, "default", array(
    'body_class' => 'background-grey'
));