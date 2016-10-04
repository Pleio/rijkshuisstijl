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

if ($container instanceof ElggGroup) {
	$access_setting = questions_get_group_access_level($container);
	if ($access_setting !== false) {
		$show_access_options = false;
	}
} else {
	$access_setting = questions_get_personal_access_level();
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

<div class="rhs-form__element">
	<label class="rhs-form__label">
		<span class="rhs-form__label-text rhs-form__label-text--hidden">
			<?php echo elgg_echo("questions:edit:question:title"); ?>
		</span>
		<?php echo elgg_view("input/text", array(
			"name" => "title",
			"id" => "js-itemTitle",
			"autofocus" => "",
			"data-only-validate-on-submit" => "",
			"data-validation" => ".{10,}",
			"data-validationmessage" => elgg_echo("rijkshuisstijl:title:too_short"),
			"class" => "rhs-form__input js-validateInput",
			"value" => elgg_get_sticky_value("question", "title", $question->title),
			"placeholder" => elgg_echo("questions:edit:question:title")
		)); ?>
	</label>
</div>

<div class="rhs-form__element">
	<?php echo elgg_view("input/longtext", array(
		"name" => "description",
		"id" => "question_description",
		"data-only-validate-on-submit" => "",
		"data-validation" => ".{10,}",
		"data-validationmessage" => elgg_echo("rijkshuisstijl:description:too_short"),
		"class" => "rhs-form__input js-validateInput",
		"placeholder" => elgg_echo("questions:edit:question:description"),
		"value" => elgg_get_sticky_value("question", "description", $question->description)
	)); ?>
</div>

<div class="rhs-form__element">
	<?php echo elgg_view("input/tags", array(
		"name" => "tags",
		"id" => "question_tags",
		"placeholder" => elgg_echo("tags"),
		"value" => elgg_get_sticky_value("question", "tags", $question->tags),
		"class" => "rhs-form__input"
	)); ?>
</div>

<?php
// categories support
if (elgg_view_exists("input/categories")) {
	echo elgg_view("input/categories", array_merge(array(
		'class' => 'rhs-form__input'
	), $vars));
}
?>

<?php if ($show_access_options): ?>
	<div class="rhs-form__element">
		<?php echo elgg_view("input/access", $access_id); ?>
	</div>
<?php else: ?>
	<?php echo elgg_view("input/hidden", array(
		"name" => "access_id",
		"value" => $access_setting
	)); ?>
<?php endif; ?>

<?php
// container selection options
if (!$editing || (questions_experts_enabled() && questions_is_expert())) {
	if (!$editing) {
		$owner = elgg_get_logged_in_user_entity();
	} else {
		$owner = $question->getOwnerEntity();
	}

	$container_options = array();
	if (!questions_limited_to_groups()) {
		$container_options[$owner->guid] = $owner->name;
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

		$groups = elgg_get_entities_from_relationship($group_options);
		foreach ($groups as $group) {
			$container_options[$group->guid] = $group->name;
		}
	}
	?>
	<div class="rhs-form__element">
		<?php echo elgg_view("input/dropdown", array(
			"name" => "container_guid",
			"placeholder" => "Kies een thema",
			"value" => $question->container_guid,
			"options_values" => $container_options,
			"required" => ""
		)); ?>
	</div>
	<?php
} else {
	echo elgg_view("input/hidden", array("name" => "container_guid", "value" => $question->container_guid));
}

// end of the form
echo "<div class='rhs-form__actions'>";

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

echo elgg_view("input/submit", array(
	"value" => elgg_echo("rijkshuisstijl:save")
));
echo "</div>";
