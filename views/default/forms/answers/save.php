<?php
/**
 * Shows the form for a cafe message
 *
 * @package theme_ffd
 */


$poster = elgg_get_logged_in_user_entity();
$entity = elgg_extract("entity", $vars);

if ($entity) {
    echo elgg_view("input/hidden", array("name" => "container_guid", "value" => $entity->guid));
}

?>

<h2 class="rhs-edit-block__title"><?php echo elgg_echo("rijkshuisstijl:answer"); ?></h2>
<a href="/forum-item.html" title="<?php echo elgg_echo("rijkshuisstijl:back_to_forum"); ?>" data-forum-answer-close="" class="rhs-edit-block__close">
    <?php echo elgg_echo("rijkshuisstijl:back_to_forum"); ?>
</a>

<div class="rhs-edit-block__top"><img src="<?php echo $poster->getIconURL('small') ?>" class="rhs-edit-block__image">
  <div href="/profile-public.html" title="<?php echo elgg_echo("rijkshuisstijl:go_to_profile"); ?>" class="rhs-edit-block__name"><?php echo $poster->name ?></div>
</div>

<?php echo elgg_view('input/longtext', array(
    'id' => 'data-forum-answer-textarea',
    'name' => 'description',
    'value' => elgg_get_sticky_value('comment', 'description', $comment->description)
));
?>

<div class="rhs-edit-block__bottom rhs-form__actions">
    <a href="#" title="..." data-forum-answer-close class="rhs-button">
        <?php echo elgg_echo("rijkshuisstijl:cancel"); ?>
    </a>
    <?php echo elgg_view("input/submit", array(
            'class' => 'elgg-button elgg-button-primary',
            'value' => elgg_echo('rijkshuisstijl:answer:submit')
        ));
    ?>
</div>

