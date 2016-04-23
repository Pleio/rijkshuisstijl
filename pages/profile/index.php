<?php
  gatekeeper();

  $user = elgg_get_page_owner_entity();
  if (!$user) {
    register_error(elgg_echo("profile:notfound"));
    forward();
  }

  $categories = profile_manager_get_categorized_fields($user, true, true);

  $fields = array();
  foreach ($categories['fields'] as $category) 
  {
    foreach ($category as $field)
    {
        $metadata_name = $field->metadata_name;

        $metadata = elgg_get_metadata(array(
          'guid' => $user->guid,
          'metadata_name' => $metadata_name,
          'limit' => false
        ));

        if ($metadata)
        {
          $metadata = $metadata[0];
          
          $value = $user->$metadata_name;
        } 
        else 
          $value = '';

        $fields[] = array('name' => $field->metadata_name, 'value' => $value, 'type' => $field->metadata_type, 'label' => $field->metadata_label);
    }
  }

  $body = elgg_view('profile/index', array('fields' => $fields));

  //elgg_set_context('profile_edit');

  $title = elgg_echo('profile:edit');
  echo elgg_view_page($title, $body);
?>