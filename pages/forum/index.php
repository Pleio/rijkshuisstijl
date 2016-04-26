<?php
  gatekeeper();

  /*$user = elgg_get_page_owner_entity();
  if (!$user) {
    register_error(elgg_echo("profile:notfound"));
    forward();
  }*/
  
  $body = $body . elgg_view('forum/index', array());

  //elgg_set_context('profile_edit');

  $title = elgg_echo('profile:edit');
  echo elgg_view_page($title, $body);
?>