<?php
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

  if (!$targetUser->canEdit()) {
    register_error(elgg_echo("profile:noaccess"));
    forward();
  }

  $body = elgg_view('profile/header', array('name' => $targetUser->name, 'username' => $targetUser->username, 'selected' => 'Instellingen'));
  $body = $body . elgg_view('profile/settings', array('username' => $targetUser->username));

  //elgg_set_context('profile_edit');

  $title = elgg_echo('profile:edit');
  echo elgg_view_page($title, $body, 'default', array(
    'body_class' => 'background-grey'
  ));
?>