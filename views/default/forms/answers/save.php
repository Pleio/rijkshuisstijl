<?php
/**
 * Shows the form for a cafe message
 *
 * @package theme_ffd
 */


$poster = elgg_get_logged_in_user_entity();
$entity = elgg_extract("entity", $vars);

if ($entity) {
    if (elgg_is_active_plugin("questions") && $entity instanceof ElggQuestion) {
        // answer endpoint receives different permission levels
        $container_field = "container_guid";
        $description_field = "description";
    } else {
        $container_field = "entity_guid";
        $description_field = "generic_comment";
    }

    echo elgg_view("input/hidden", array("name" => $container_field, "value" => $entity->guid));
}

?>

<h2 class="rhs-edit-block__title"><?php echo elgg_echo("rijkshuisstijl:answer"); ?></h2>
<a href="/forum-item.html" title="<?php echo elgg_echo("rijkshuisstijl:back_to_forum"); ?>" data-forum-answer-close="" class="rhs-edit-block__close">
    <?php echo elgg_echo("rijkshuisstijl:back_to_forum"); ?>
</a>

<div class="rhs-edit-block__top"><img src="<?php echo $poster->getIconURL("small") ?>" class="rhs-edit-block__image">
  <div href="#" title="<?php echo elgg_echo("rijkshuisstijl:go_to_profile"); ?>" class="rhs-edit-block__name"><?php echo $poster->name ?></div>
</div>

<?php echo elgg_view("input/longtext", array(
    "id" => "data-forum-answer-textarea",
    "name" => $description_field,
    "value" => elgg_get_sticky_value("comment", "description", $comment->description)
));
?>

<div class="rhs-edit-block__bottom rhs-form__actions">
    <?php echo elgg_view("output/url", array(
        "class" => "rhs-button",
        "href" => "#",
        "text" => elgg_echo("rijkshuisstijl:cancel"),
        "data-forum-answer-close" => "",

    ));
    ?>

    <?php echo elgg_view("input/submit", array(
            "class" => "rhs-button rhs-button--primary",
            "value" => elgg_echo("rijkshuisstijl:answer:submit")
        ));
    ?>
</div>

