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

  $result = profile_manager_get_categorized_fields($targetUser, true);
  $fields = $result['fields'];
  $cats = $result['categories'];

  $outputFields = array();
  foreach ($cats as $cat_guid => $cat) 
  {
    foreach ($fields[$cat_guid] as $field) 
    {
        $metadata_name = $field->metadata_name;

        $metadata = elgg_get_metadata(array(
          'guid' => $targetUser->guid,
          'metadata_name' => $metadata_name,
          'limit' => false
        ));

        if ($metadata)
        {
          $metadata = $metadata[0];
          
          $value = $targetUser->$metadata_name;
        } 
        else 
          $value = '';

        $outputFields[] = array('name' => $field->metadata_name, 'value' => $value, 'type' => $field->metadata_type, 'label' => $field->metadata_label, 'category' => $cat->metadata_name);
    }
  }

  $body = elgg_view('profile/header', array('name' => $targetUser->name, 'username' => $targetUser->username, 'selected' => 'Profiel'));
  $body = $body . elgg_view('profile/index', array('fields' => $outputFields, 'username' => $targetUser->username));

  //elgg_set_context('profile_edit');

  $title = elgg_echo('profile:edit');
  echo elgg_view_page($title, $body, 'default', array(
    'body_class' => 'background-grey'
  ));
?>