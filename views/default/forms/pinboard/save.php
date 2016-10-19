<?php
/**
 * Shows the form for a cafe message
 *
 * @package theme_ffd
 */

$entity = elgg_extract("entity", $vars);

if ($entity) {
    echo elgg_view("input/hidden", array("name" => "guid", "value" => $entity->guid));
}

?>
<div class="rhs-form__element">
    <?php echo elgg_view("input/dropdown", array(
        "name" => "purpose",
        "options_values" => array(
            "search" => elgg_echo("pinboard:purpose:search"),
            "share" => elgg_echo("pinboard:purpose:share"),
            "experience" => elgg_echo("pinboard:purpose:experience")
        ),

        "value" => elgg_get_sticky_value("cafe", "purpose", $entity->purpose)
    ));
    ?>
</div>

<div class="rhs-form__element">
    <label class="rhs-form__label">
        <span class="rhs-form__label-text rhs-form__label-text--hidden">
            <?php echo elgg_echo("pinboard:title"); ?>
        </span>

        <?php echo elgg_view("input/text", array(
            "autofocus" => "",
            "name" => "title",
            "class" => "rhs-form__input js-validateInput",
            "value" => elgg_get_sticky_value("cafe", "title", $entity->title),
            "data-validation" => ".{10,}",
            "data-validationmessage" => elgg_echo("rijkshuisstijl:title:too_short"),
            "placeholder" => elgg_echo("pinboard:title")
        ));
        ?>
    </label>
</div>

<div class="rhs-form__element">
    <label class="rhs-form__label">
        <span class="rhs-form__label-text rhs-form__label-text--hidden">
            <?php echo elgg_echo("pinboard:title"); ?>
        </span>

        <?php echo elgg_view("input/longtext", array(
            "name" => "description",
            "class" => "rhs-form__input js-validateInput",
            "value" => elgg_get_sticky_value("cafe", "description", $entity->description),
            "data-validation" => ".{10,}",
            "data-validationmessage" => elgg_echo("rijkshuisstijl:description:too_short"),
            "class" => "rhs-form__input js-validateInput",
            "placeholder" => elgg_echo("rijkshuisstijl:description")
        ));
        ?>
    </label>
</div>

<div class="rhs-form__element">
    <?php echo elgg_view("input/tags", array(
        "name" => "tags",
        "value" => elgg_get_sticky_value("cafe", "tags", $entity->tags),
        "placeholder" => elgg_echo("tags")
    ));
    ?>
</div>

<div class="rhs-form__actions">
    <?php if ($entity && $entity->canEdit()) {
        echo elgg_view("output/confirmlink", array(
            "class" => "rhs-button__underline",
            "href" => "/action/pinboard/delete?guid={$entity->guid}",
            "text" => elgg_echo("rijkshuisstijl:delete") . " " . elgg_echo("rijkshuisstijl:object:pinboard"),
            "is_action" => true
        ));
    } ?>

    <?php echo elgg_view("input/submit", array(
            "value" => elgg_echo("pinboard:publish"),
            "class" => "rhs-button rhs-button--color-septenary"
        ));
    ?>
</div>