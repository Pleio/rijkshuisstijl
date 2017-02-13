<?php
$topic = get_input("topic");
$category = get_input("category");
$user_guid = get_input("user_guid");

if ($user_guid) {
  $user = get_entity($user_guid);
} else {
  $user = elgg_get_logged_in_user_entity();
}

$options = array(
    "type" => "object",
    "subtype" => "question",
    "full_view" => false,
    "fast_pagination" => true
);

$topic = get_input("topic");
if ($topic && $topic !== "all") {
    $topic = get_entity((int) $topic);
} else {
  $topic = null;
}

$content = elgg_list_entities($options, "elgg_get_entities_from_private_settings");

if ($topic) {
  $options["container_guid"] = $topic->guid;
  $title = $topic->name;
} else {
  $title = elgg_echo("rijkshuisstijl:forum");
}

switch ($category) {
  case "most_viewed":
    $options["joins"] = array("JOIN elgg_entity_views ev ON e.guid = ev.guid");
    $options["order_by"] = "ev.views DESC";
    $getter = "elgg_get_entities";
    break;
  case "mine":
    $getter = "elgg_get_entities";
    if ($user) {
      $options["owner_guid"] = $user->guid;
    }
    break;
  case "mine_answers":
    $getter = "elgg_get_entities";
    $options["order_by"] = "e.last_action DESC";
    $answer_id = get_subtype_id("object", "answer");
    if ($answer_id && $user) {
      $options["joins"] = array("JOIN elgg_entities answers ON answers.container_guid = e.guid");
      $options["wheres"] = array(
        "answers.subtype = {$answer_id}",
        "answers.owner_guid = {$user->guid}"
      );
    }
    break;
  default:
    $getter = "elgg_get_entities";
    $options["order_by"] = "e.last_action DESC";
    break;
}

$body = elgg_view("questions/pages/all", array(
  "title" => $title,
  "entities" => elgg_list_entities($options, $getter)
));

echo elgg_view_page($title, $body, "default", array(
  "body_class" => "background-grey"
));