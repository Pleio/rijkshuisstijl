<?php
/**
 * Question object view
 *
 * @package Questions
*/

$full = elgg_extract("full_view", $vars, false);
$question = elgg_extract("entity", $vars, false);
$workflow = elgg_extract("workflow", $vars, false);

if (!$question) {
    return true;
}

if ($workflow) {
    $url = $question->getWorkflowURL();
} else {
    $url = $question->getURL();
}

$poster = $question->getOwnerEntity();

$poster_icon = elgg_view_entity_icon($poster, "small");
$poster_link = elgg_view("output/url", array("text" => $poster->name, "href" => $poster->getURL(), "is_trusted" => true));
$poster_text = elgg_echo("questions:asked", array($poster_link));

$container = $question->getContainerEntity();

if (elgg_instanceof($container, "group") && (elgg_get_page_owner_guid() != $container->getGUID())) {
    $group_link = elgg_view("output/url", array("text" => $container->name, "href" => "questions/group/" . $container->getGUID() . "/all", "is_trusted" => true));
    $poster_text .= " " . elgg_echo("river:ingroup", array($group_link));
}

$tags = elgg_view("output/tags", array("tags" => $question->tags));
$categories = elgg_view("output/categories", $vars);

$date = elgg_view_friendly_time($question->time_created);

$answers_link = "";

if ($workflow) {
    $answer_subtype = "intanswer";
} else {
    $answer_subtype = "answer";
}

$answer_options = array(
    "type" => "object",
    "subtype" => $answer_subtype,
    "container_guid" => $question->getGUID(),
    "count" => true
);

$num_answers = elgg_get_entities($answer_options);
$answer_text = "";

if ($num_answers != 0) {
    $answer_options["limit"] = 1;
    $answer_options["count"] = false;
    
    $correct_answer = $question->getCorrectAnswer();

    if ($correct_answer && !$workflow) {
        $poster = $correct_answer->getOwnerEntity();
        $answer_time = elgg_view_friendly_time($correct_answer->time_created);
        $answer_link = elgg_view("output/url", array("href" => $poster->getURL(), "text" => $poster->name));
        $answer_text = elgg_echo("questions:answered:correct", array($answer_link, $answer_time));
    } else {
        $last_answer = elgg_get_entities($answer_options);
        
        $poster = $last_answer[0]->getOwnerEntity();
        $answer_time = elgg_view_friendly_time($last_answer[0]->time_created);
        $answer_link = elgg_view("output/url", array("href" => $poster->getURL(), "text" => $poster->name));
        $answer_text = elgg_echo("questions:answered", array($answer_link, $answer_time));
    }
    
    $answers_link = elgg_view("output/url", array(
        "href" => $url . "#question-answers",
        "text" => elgg_echo("answers") . " ($num_answers)",
    ));
}

$metadata = "";
// do not show the metadata and controls in widget view
if (!elgg_in_context("widgets")) {
    $metadata = elgg_view_menu("entity", array(
        "entity" => $vars["entity"],
        "handler" => "questions",
        "sort_by" => "priority",
        "class" => "elgg-menu-hz",
        "full_view" => $full
    ));
}

$solution_time = $question->solution_time;
if ($solution_time && !$question->getCorrectAnswer()) {
    $solution_class = "question-solution-time float-alt";
    if ($solution_time < time()) {
        $solution_class .= " question-solution-time-late";
    } elseif ($solution_time < (time() + (24 * 60 * 60))) {
        $solution_class .= " question-solution-time-due";
    }
    
    $answer_text .= "<span class='" . $solution_class . "'>" . elgg_view("output/date", array("value" => $question->solution_time)) . "</span>";
}

if ($full) {
    $subtitle = "$poster_text $date $answers_link $categories";

    $params = array(
        "entity" => $question,
        "title" => false,
        "metadata" => $metadata,
        "subtitle" => $subtitle,
        "tags" => $tags,
    );
    $list_body = elgg_view("object/elements/summary", $params);
    
    $list_body .= elgg_view("output/longtext", array("value" => $question->description));
    
    $comment_count = $question->countComments();
    
    $comment_options = array(
        "guid" => $question->getGUID(),
        "annotation_name" => "generic_comment",
        "limit" => false
    );
    $comments = elgg_get_annotations($comment_options);
    
    if ($comments) {
        $list_body .= "<span class='elgg-river-comments-tab'>" . elgg_echo("comments") . "</span>";
        $list_body .= elgg_view_annotation_list($comments, array("list_class" => "elgg-river-comments"));
    }
    
    // show a comment form like in the river
    $body_vars = array(
        "entity" => $question,
        "inline" => true
    );
    
    $list_body .= "<div class='elgg-river-item hidden' id='comments-add-" . $question->getGUID() . "'>";
    $list_body .= elgg_view_form("comments/add", array(), $body_vars);
    $list_body .= "</div>";
    
    echo elgg_view_image_block($poster_icon, $list_body);

} else {
    // brief view
    $title_text = "";
    if ($question->getCorrectAnswer() && !$workflow) {
        $title_text = elgg_view_icon("checkmark", "mrs question-listing-checkmark");
    }
    $title_text .= elgg_get_excerpt($question->title, 100);

    if ($workflow) {
        $title = elgg_view('questions/workflow/status', array('question'=>$question));
    }

    $title .= elgg_view("output/url", array(
        "text" => $title_text,
        "href" => $url,
        "is_trusted" => true
    ));
    
    $subtitle = "$poster_text $date $answers_link $categories";

    $params = array(
        "entity" => $question,
        "title" => $title,
        "subtitle" => $subtitle,
        "tags" => $tags,
        "content" => $answer_text
    );

    if ($workflow) {
        $params['metadata'] = elgg_view("questions/workflow/overview", array('question'=>$question));
    }

    $list_body = elgg_view("object/elements/summary", $params);

    echo elgg_view_image_block($poster_icon, $list_body);
}
