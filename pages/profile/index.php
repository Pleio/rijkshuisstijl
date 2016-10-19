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
$outputFields = array();
foreach($result['fields'] as $category_guid => $fields) {
  foreach ($fields as $field) {
      $metadata_name = $field->metadata_name;

      $metadata = elgg_get_metadata(array(
        'guid' => $targetUser->guid,
        'metadata_name' => $metadata_name,
        'limit' => false
      ));

      if ($metadata) {
        $metadata = $metadata[0];
        $value = $targetUser->$metadata_name;
      } else {
        $value = '';
      }

      $outputFields[] = array(
        'name' => $field->metadata_name,
        'value' => $value,
        'type' => $field->metadata_type,
        'label' => $field->metadata_label,
        'category' => ($category_guid) ? $result['categories'][$category_guid] : null
        );
  }
}

$options = array(
  'type' => 'object',
  'owner_guid' => $targetUser->guid,
  'count' => true
);

$number_questions = elgg_get_entities(array_merge($options, array(
  'subtype' => 'question'
)));

$number_answers = elgg_get_entities(array_merge($options, array(
  'subtype' => 'answer'
)));

$options = array(
  'annotation_name' => 'vote',
  'annotation_owner_guid' => $targetUser->guid,
  'count' => true
);

$number_upvotes = elgg_get_annotations(array_merge($options, array(
  'annotation_value' => 1
)));

$number_downvotes = elgg_get_annotations(array_merge($options, array(
  'annotation_value' => -1
)));

$completeness = profile_manager_profile_completeness($targetUser);
$completeness = round((($completeness['percentage_completeness'] / 100) * 3) + 1);

$body = elgg_view('profile/header', array('name' => $targetUser->name, 'username' => $targetUser->username, 'selected' => 'Profiel'));
$body = $body . elgg_view('profile/index', array(
  'fields' => $outputFields,
  'username' => $targetUser->username,
  'number_questions' => $number_questions,
  'number_answers' => $number_answers,
  'number_upvotes' => $number_upvotes,
  'number_downvotes' => $number_downvotes,
  'completeness' => $completeness
));

//elgg_set_context('profile_edit');

$title = $targetUser->name;
echo elgg_view_page($title, $body, 'default', array(
  'body_class' => 'background-grey'
));
?>