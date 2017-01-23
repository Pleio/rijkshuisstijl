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
			"data-validation" => ".{4,}",
			"data-validationmessage" => elgg_echo("rijkshuisstijl:title:too_short"),
			"class" => "rhs-form__input js-validateInput",
			"value" => elgg_get_sticky_value("question", "title", $question->title),
			"placeholder" => elgg_echo("questions:edit:question:title")
		)); ?>
	</label>
</div>

<div class="rhs-form__element">
	<label class="rhs-form__label">
		<span class="rhs-form__label-text rhs-form__label-text--hidden">
			<?php echo elgg_echo("questions:edit:question:description"); ?>
		</span>
		<?php echo elgg_view("input/longtext", array(
			"name" => "description",
			"id" => "question_description",
			"data-only-validate-on-submit" => "",
			"data-validation" => ".{4,}",
			"data-validationmessage" => elgg_echo("rijkshuisstijl:description:too_short"),
			"class" => "rhs-form__input js-validateInput",
			"placeholder" => elgg_echo("questions:edit:question:description"),
			"value" => elgg_get_sticky_value("question", "description", $question->description)
		)); ?>
	</label>
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
$featured_groups = rijkshuisstijl_get_featured_groups();

if ($featured_groups && (!$editing || (questions_experts_enabled() && questions_is_expert()))) {
	if (!$editing) {
		$owner = elgg_get_logged_in_user_entity();
	} else {
		$owner = $question->getOwnerEntity();
	}

	$container_options = array();
	if (!questions_limited_to_groups()) {
		$container_options[$owner->guid] = $owner->name;
	}

	foreach ($featured_groups as $group) {
		$container_options[$group->guid] = $group->name;
	}
	?>

	<div class="rhs-form__element">
		<label class="rhs-form__label">
			<span class="rhs-form__label-text rhs-form__label-text--hidden">
				<?php echo elgg_echo("questions:edit:question:description"); ?>
			</span>
			<?php echo elgg_view("input/dropdown", array(
				"name" => "container_guid",
				"data-selector" => "reversed",
				"placeholder" => elgg_echo("rijkshuisstijl:choose_theme"),
				"options_values" => $container_options,
				"value" => ($editing) ? $question->container_guid : false,
				"class" => "js-validateSelecter",
				"data-validationmessage" => "Vul een thema in",
				"required" => ""
			)); ?>

		</label>
	</div>
	<?php
} else {
	echo elgg_view("input/hidden", array("name" => "container_guid", "value" => $question->container_guid));
}

// end of the form
echo "<div class='rhs-form__actions'>";

if ($editing && $question->canEdit()) {
	echo elgg_view("output/confirmlink", array(
		"class" => "rhs-button__underline",
		"href" => "/action/questions/delete?guid={$question->guid}",
		"text" => elgg_echo("rijkshuisstijl:delete") . " " . elgg_echo("rijkshuisstijl:object:question"),
		"is_action" => true
	));
}

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
	"value" => elgg_echo("rijkshuisstijl:save"),
	"class" => "rhs-button rhs-button--primary js-submitForm"
));
echo "</div>";
