<?php
/**
* Members search page
*
*/

$query = get_input("member_query");
$limit = sanitise_int(get_input("limit", 10), false);
$offset = sanitise_int(get_input("offset", 0), false);

$title = elgg_echo('members:title:search', array($query));

$options = array();
$options['query'] = $query;
$options['type'] = "user";
$options['offset'] = $offset;
$options['limit'] = $limit;
$options['order_by'] = 'ue.name';

$results = elgg_trigger_plugin_hook('search', 'user', $options, array());
$count = $results['count'];
$users = $results['entities'];

$content = elgg_view_entity_list($users, array(
'count' => $count,
'offset' => $offset,
'limit' => $limit,
'full_view' => false,
'list_type_toggle' => false,
'pagination' => true,
));

$params = array(
'title' => $title,
'content' => $content,
'sidebar' => elgg_view('members/sidebar'),
);

$body = elgg_view_layout('one_sidebar', $params);

echo elgg_view_page($title, $body);