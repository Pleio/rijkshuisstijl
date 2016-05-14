<?php
/**
 * Question form
 *
 * @package ElggQuestions
 */

$question = elgg_extract("entity", $vars);
$editing = true;
$container_options = false;
$show_access_options = true;
$access_setting = false;

if (!$question) {
	$editing = false;
	
	$question = new ElggQuestion();
	$question->container_guid = elgg_get_page_owner_guid();
	$question->access_id = ACCESS_DEFAULT;
}

$container = $question->getContainerEntity();

$title = array(
	"name" => "title",
	"id" => "question_title",
	"value" => elgg_get_sticky_value("question", "title", $question->title),
	"style" => "width: 100%"
);

$description = array(
	"name" => "description",
	"id" => "question_description",
	"value" => elgg_get_sticky_value("question", "description", $question->description),
);

$tags = array(
	"name" => "tags",
	"id" => "question_tags",
	"value" => elgg_get_sticky_value("question", "tags", $question->tags),
	"style" => "width: 100%"
);

if (elgg_instanceof($container, "user")) {
	$access_setting = questions_get_personal_access_level();
	if ($access_setting !== false) {
		$show_access_options = false;
	}
} elseif (elgg_instanceof($container, "group")) {
	$access_setting = questions_get_group_access_level($container);
	if ($access_setting !== false) {
		$show_access_options = false;
	}
}

$access_id = array(
	"name" => "access_id",
	"id" => "question_access_id",
	"value" => (int) elgg_get_sticky_value("question", "access_id", $question->access_id),
);

// clear sticky form
elgg_clear_sticky_form("question");
?>

<div>
	<label for="question_title"><?php echo elgg_echo("questions:edit:question:title"); ?></label>
</div>
<div>
	<?php echo elgg_view("input/text", $title); ?>
</div>
<div>
	<label for="question_tags"><?php echo elgg_echo("tags"); ?></label>
</div>
<div>
	<?php echo elgg_view("input/tags", $tags); ?>
</div>
<div>
	<label for="question_description"><?php echo elgg_echo("questions:edit:question:description"); ?></label>
</div>
<div>
	<?php echo elgg_view("input/longtext", $description); ?>
</div>

<?php
// categories support
if (elgg_view_exists("input/categories")) {
	echo elgg_view("input/categories", $vars);
}

// access options
if ($show_access_options) {
	echo "<div>";
	echo "<label for='question_access_id'>" . elgg_echo("access") . "</label><br />";
	echo elgg_view('input/access', $access_id);
	echo "</div>";
} else {
	echo elgg_view("input/hidden", array("name" => "access_id", "value" => $access_setting));
}

// container selection options
if (!$editing || (questions_experts_enabled() && questions_is_expert())) {
	if (!$editing) {
		$owner = elgg_get_logged_in_user_entity();
	} else {
		$owner = $question->getOwnerEntity();
	}

	$container_options = true;
	$select = "<select name='container_guid' class='elgg-input-dropdown' id='questions-container-guid'>";

	// add user to the list
	$selected = "";
	if ($owner->getGUID() == $question->getContainerGUID()) {
		$selected = "selected='selected'";
	}

	if (!questions_limited_to_groups()) {
		$select .= "<option value='" . $owner->getGUID() . "' " . $selected . ">" . $owner->name . "</option>";
	} else {
		$select .= "<option value='' " . $selected . ">" . elgg_echo("questions:edit:question:container:select") . "</option>";
	}

	if (elgg_is_active_plugin("groups")) {
		$group_options = array(
			"type" => "group",
			"limit" => false,
			"metadata_name_value_pairs" => array(
				"name" => "questions_enable",
				"value" => "yes"
			),
			"joins" => array("JOIN " . elgg_get_config("dbprefix") . "groups_entity ge ON e.guid = ge.guid"),
			"order_by" => "ge.name ASC",
			"relationship" => "member",
			"relationship_guid" => elgg_get_logged_in_user_guid()
		);

		if ($groups = elgg_get_entities_from_relationship($group_options)) {
			$select .= "<optgroup label='" . htmlspecialchars(elgg_echo("groups"), ENT_QUOTES, "UTF-8", false) . "'>";
			foreach ($groups as $group) {
				$selected = "";
				if ($group->getGUID() == $question->getContainerGUID()) {
					$selected = "selected='selected'";
				}
				$select .= "<option value='" . $group->getGUID() . "' " . $selected . ">" . $group->name . "</option>";
			}
			$select .= "</optgroup>";
		}
	}

	$select .= "</select>";

	echo "<div>";
	echo "<label for='questions-container-guid'>" . elgg_echo("questions:edit:question:container") . "</label><br />";
	echo $select;
	echo "</div>";
} else {
	echo elgg_view("input/hidden", array("name" => "container_guid", "value" => $question->container_guid));
}

// end of the form
echo "<div class='elgg-foot'>";

if ($editing) {
	echo elgg_view("input/hidden", array("name" => "guid", "value" => $question->guid));
}

if ($editing && questions_can_move_to_discussions($container)) {
	echo elgg_view("output/url", array(
		"text" => elgg_echo("questions:edit:question:move_to_discussions"),
		"href" => false,
		"class" => "elgg-button elgg-button-action float-alt",
		"id" => "questions-move-to-discussions",
		"rel" => elgg_echo("questions:edit:question:move_to_discussions:confirm")
	));
}

echo elgg_view("input/submit", array("value" => elgg_echo("submit")));
echo "</div>";
