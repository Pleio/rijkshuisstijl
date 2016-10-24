<?php
if (get_input('group_guid')) {
  elgg_set_page_owner_guid(get_input('group_guid'));
} else {
  elgg_set_page_owner_guid(elgg_get_logged_in_user_guid());
}

$title = elgg_echo('rijkshuisstijl:forum');
$body = elgg_view('questions/pages/index');

echo elgg_view_page($title, $body, 'default', array(
  'leader' => elgg_view('rijkshuisstijl/leader/forum')
));
?>