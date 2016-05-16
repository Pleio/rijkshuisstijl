<?php
  gatekeeper();

  /*$user = elgg_get_page_owner_entity();
  if (!$user) {
    register_error(elgg_echo("profile:notfound"));
    forward();
  }*/

  if (get_input('group_guid')) {
    elgg_set_page_owner_guid(get_input('group_guid'));
  } else {
    elgg_set_page_owner_guid(elgg_get_logged_in_user_guid());
  }

  $questionsPerPage = 5;

  $options = array(
      'type' => 'object',
      'subtype' => 'question',
      'count' => true
  );

  $questionCount = (int)elgg_get_entities($options, 'elgg_get_entities_from_private_settings');

  $maxPage = ceil($questionCount / $questionsPerPage);
  if ($page > $maxPage)
    $page = $maxPage;
  else if ($page < 1)
    $page = 1;

  $options = array(
      'type' => 'object',
      'subtype' => 'question',
      'offset' => ($page - 1) * $questionsPerPage,
      'limit' => $questionsPerPage
  );

  $questions = elgg_get_entities($options, 'elgg_get_entities_from_private_settings');

  $body = $body . elgg_view('forum/category', array('questions' => $questions, 'page' => $page, 'maxPage' => $maxPage));

  //elgg_set_context('profile_edit');

  $title = elgg_echo('profile:edit');
  echo elgg_view_page($title, $body);
?>