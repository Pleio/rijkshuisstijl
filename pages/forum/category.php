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

  if ($category != 0)
  {
    $group = elgg_get_entities_from_metadata(array(
          'types' => 'group',
          'metadata_name' => 'featured_group',
          'metadata_value' => 'yes',
          'guid' => $category,
          'limit' => 1
    ));

    if (!$group)
    {
      register_error(elgg_echo("Not a valid group."));
      forward();
    }

    $group = $group[0];

    $options = array(
        'type' => 'object',
        'subtype' => 'question',
        'container_guid' => $group->guid,
        'count' => true
    );

    $questionCount = (int)elgg_get_entities($options);
  }
  else
  {
    $group = false;

    $options = array(
        'type' => 'object',
        'subtype' => 'question',
        'count' => true
    );

    $questionCount = (int)elgg_get_entities($options);
  }

  $maxPage = ceil($questionCount / $questionsPerPage);
  if ($page > $maxPage)
    $page = $maxPage;
  else if ($page < 1)
    $page = 1;

  if ($category != 0)
  {
    $options = array(
        'type' => 'object',
        'subtype' => 'question',
        'container_guid' => $group->guid,
        'order_by' => 'e.time_updated DESC',
        'offset' => ($page - 1) * $questionsPerPage,
        'limit' => $questionsPerPage
    );

    $questions = elgg_get_entities($options);
  }
  else
  {
    $options = array(
        'type' => 'object',
        'subtype' => 'question',
        'order_by' => 'e.time_updated DESC',
        'offset' => ($page - 1) * $questionsPerPage,
        'limit' => $questionsPerPage
    );

    $questions = elgg_get_entities($options);
  }

  $body = $body . elgg_view('forum/category', array('questions' => $questions, 'page' => $page, 'maxPage' => $maxPage, 'group' => $group));

  //elgg_set_context('profile_edit');

  $title = elgg_echo('profile:edit');
  echo elgg_view_page($title, $body);
?>