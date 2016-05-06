<?php
/**
 * View a question
 *
 * @package ElggQuestions
 */

$guid = (int) get_input('guid');
$question = get_entity($guid);

// make sure we have access
if (empty($question)) {
  register_error(elgg_echo('noaccess'));
  $_SESSION['last_forward_from'] = current_page_url();
  forward('');
}

// make sure we have a question
if (empty($question) || !elgg_instanceof($question, "object", "question")) {
	register_error(elgg_echo("ClassException:ClassnameNotClass", array($guid, elgg_echo("item:object:question"))));
	forward(REFERER);
}

// set page owner
elgg_set_page_owner_guid($question->getContainerGUID());
$page_owner = $question->getContainerEntity();

// set breadcrumb
elgg_push_breadcrumb(elgg_echo('questions'), "questions/all");

if ($workflow == true) {
  elgg_push_breadcrumb(elgg_echo("questions:workflow"), "questions/workflow");
}

if (elgg_instanceof($page_owner, 'group')) {
  $base_url = "questions/group/$page_owner->guid/";

  if ($workflow == true) {
    $url = $base_url . "workflow";
  } else {
    $url = $base_url . "all";
  }

  elgg_push_breadcrumb($page_owner->name, $url);
}

elgg_push_breadcrumb($question->title);

// build page elements
$title_icon = "";

$content = elgg_view_entity($question, array('full_view' => true));

// add the rest of the answers
$options = array(
	'type' => 'object',
	'subtype' => 'answer',
	'container_guid' => $question->guid,
	'count' => true,
	'limit' => false,
	'order_by' => 'e.time_created',
	'pagination' => false
);

if (elgg_is_active_plugin("likes")) {
	// order answers based on likes
	$dbprefix = elgg_get_config("dbprefix");
	$likes_id = add_metastring("likes");
	
	$options["selects"] = array(
		"(SELECT count(a.name_id) AS likes_count
		FROM " . $dbprefix . "annotations a
		WHERE a.entity_guid = e.guid
		AND a.name_id = " . $likes_id . ") AS likes_count");
}

$answers = elgg_list_entities($options);
$count = elgg_get_entities($options);

$answer_title = elgg_view_icon("comment-o", "mrs") . $count . " " . elgg_echo('answers');
$content .= elgg_view_module('info', $answer_title, $answers, array("class" => "mtm ffd-answers"));

// add answer form
if (($question->getStatus() == "open") && $question->canWriteToContainer(0, 'object', 'answer')) {
	
	$add_form = elgg_view_form('object/answer/add', array(), array('container_guid' => $question->guid));
	
	$content .= elgg_view_module('info', elgg_echo('answers:addyours'), $add_form, array('id' => 'questions-answer-add'));
} elseif ($question->getStatus() == "closed") {
	// add an icon to show this question is closed
	$title_icon = elgg_view_icon("lock-closed");
}

// switch to go from frontend to backend
if (questions_workflow_enabled() && questions_is_expert()) {
  $overview = elgg_view('questions/overview', array('question'=>$question));
} else {
  $overview = "";
}

$body = elgg_view_layout('content', array(
	'content' => $overview . $content,
	'filter' => '',
));

echo elgg_view_page($title, $body);
