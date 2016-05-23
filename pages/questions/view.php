<?php
/**
 * View a question
 *
 * @package ElggQuestions
 */

$guid = (int) get_input('guid');
$entity = get_entity($guid);

// make sure we have access
if (empty($entity)) {
  register_error(elgg_echo('noaccess'));
  $_SESSION['last_forward_from'] = current_page_url();
  forward('');
}

// make sure we have a question
if (empty($entity) || !elgg_instanceof($entity, "object", "question")) {
	register_error(elgg_echo("ClassException:ClassnameNotClass", array($guid, elgg_echo("item:object:question"))));
	forward(REFERER);
}

// set page owner
elgg_set_page_owner_guid($entity->getContainerGUID());
$page_owner = $entity->getContainerEntity();

// set breadcrumb
elgg_push_breadcrumb(elgg_echo('questions'), "/forum");

if ($workflow == true) {
  elgg_push_breadcrumb(elgg_echo("questions:workflow"), "questions/workflow");
}

if (elgg_instanceof($page_owner, 'group')) {
  $url = "forum/category/$page_owner->guid/";
  elgg_push_breadcrumb($page_owner->name, $url);
}

elgg_push_breadcrumb($entity->title);

$body = elgg_view_layout('one_column', array(
    'class' => 'rhs-card-user-content',
    'content' => elgg_view('questions/pages/detail', array(
        'entity' => $entity
    ))
));

echo elgg_view_page($title, $body);
