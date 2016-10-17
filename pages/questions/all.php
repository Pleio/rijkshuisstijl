<?php
gatekeeper();

$topic = get_input('topic');
$category = get_input('category');
$user = elgg_get_logged_in_user_entity();

$options = array(
    'type' => 'object',
    'subtype' => 'question',
    'full_view' => false
);

$topic = get_input('topic');
if (!$topic) {
    $topic = "mine";
}

if ($topic == "mine") {
    $interests = rijkshuisstijl_get_interests($user);
    if ($interests) {
        $options['container_guids'] = $interests;
    }
} else {
    $topic = get_entity((int) $topic);
}

$content = elgg_list_entities($options, 'elgg_get_entities_from_private_settings');

if ($topic) {
  $options['container_guid'] = $topic->guid;
  $title = $topic->name;
} else {
  $title = elgg_echo("rijkshuisstijl:forum");
}

switch ($category) {
  case "most_viewed":
    $options['private_setting_name'] = 'view_counter';
    $options['order_by'] = 'cast(ps.value as unsigned) DESC';
    $getter = 'elgg_get_entities_from_private_settings';
    break;
  case "mine":
    $options['owner_guid'] = $user->guid;
    $getter = 'elgg_get_entities';
    break;
  default:
    $getter = 'elgg_get_entities';
    break;
}

$body = elgg_view('questions/pages/all', array(
  'title' => $title,
  'entities' => elgg_list_entities($options, $getter)
));

echo elgg_view_page($title, $body, 'default', array(
  'body_class' => 'background-grey'
));