<?php
$entity = $vars['entity'];
$poster = $entity->getOwnerEntity();

if ($entity) {
    if (elgg_is_active_plugin("questions") && $entity instanceof ElggQuestion) {
        // answer endpoint receives different permission levels
        $description_field = "description";
    } else {
        $description_field = "generic_comment";
    }

    echo elgg_view("input/hidden", array(
        "name" => "comment_guid",
        "value" => $entity->guid)
    );
}
?>

<div title="Terug naar forum" data-comment-edit="" class="comment-edit__close"></div>

<h3 class="comment-edit__title">
    Bewerk antwoord
</h3>

<div class="comment-edit__top">
    <img src="<?php echo $poster->getIconURL('small'); ?>" class="comment-edit__image">
    <div href="<?php echo $poster->getURL(); ?>" title="Bekijk profiel" class="comment-edit__name">
        <?php echo $poster->name; ?>
    </div>
</div>

<?php echo elgg_view("input/longtext", array(
    "id" => "data-forum-answer-textarea",
    "name" => $description_field,
    "value" => $entity->description
));
?>

<div class="comment-edit__bottom form__actions ___gutter">
    <?php echo elgg_view("output/confirmlink", array(
        "class" => "rhs-button__underline",
        "href" => "/action/comment/delete?guid={$entity->guid}",
        "text" => elgg_echo("rijkshuisstijl:delete") . " " . elgg_echo("rijkshuisstijl:object:answer"),
        "is_action" => true
    ));
    ?>

    <?php echo elgg_view("output/url", array(
        "href" => "#",
        "data-comment-edit" => "",
        "class" => "rhs-button",
        "text" => elgg_echo("rijkshuisstijl:cancel")
    )); ?>

    <?php echo elgg_view("input/submit", array(
        "value" => elgg_echo("rijkshuisstijl:save"),
        "class" => "rhs-button rhs-button--primary"
    )); ?>
</div>