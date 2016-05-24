<?php
gatekeeper();

$topic = get_input('topic');
$category = get_input('category');
$user = elgg_get_logged_in_user_entity();

if ($topic) {
  $group = get_entity($topic);
  if (!$group instanceof ElggGroup) {
    forward(REFERER);
  }
}

$options = array(
  'type' => 'object',
  'subtype' => 'question',
  'full_view' => false
);

$options = array(
    'type' => 'object',
    'subtype' => 'question',
    'full_view' => false
);

$content = elgg_list_entities($options, 'elgg_get_entities_from_private_settings');

if ($group) {
  $options['container_guid'] = $group->guid;
  $title = $group->name;
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

$body = elgg_view('forum/category', array(
  'entities' => elgg_list_entities($options, $getter)
));

echo elgg_view_page($title, $body, 'default', array(
  'body_class' => 'background-grey'
));