<?php
/**
 * Edit profile page
 */

gatekeeper();

$user = elgg_get_page_owner_entity();
if (!$user) {
	register_error(elgg_echo("profile:notfound"));
	forward();
}

$targetUser = get_user_by_username($username);
if (!$targetUser) {
  register_error(elgg_echo("profile:notfound"));
  forward(); 
}

// check if logged in user can edit this profile
if (!$targetUser->canEdit()) {
	register_error(elgg_echo("profile:noaccess"));
	forward();
}

elgg_set_context('profile_edit');

$title = elgg_echo('profile:edit');

$content = elgg_view_form('profile/edit', array(), array('entity' => $targetUser));

$params = array(
	'content' => $content,
	'title' => $title,
);
$body = elgg_view_layout('one_sidebar', $params);

echo elgg_view_page($title, $body);
