<?php
$entity = $vars['entity'];
?>

<?php echo elgg_view_entity($entity, array(
    'full_view' => true
)); ?>

<?php if (elgg_is_logged_in()): ?>
    <div data-forum-answer-block="" class="rhs-edit-block__wrapper" style="">
        <?php echo elgg_view_form("answers/save", array(
            'name' => 'pinboard_comment',
            'class' => 'rhs-edit-block',
            'action' => 'action/comment/save'
        ), array(
            'entity' => $entity
        )); ?>
    </div>
<?php endif; ?>

<div class="rhs-card-user-content__amount">
    <span><?php echo $entity->countComments(); ?></span> <?php echo ($count==1) ? elgg_echo("rijkshuisstijl:count:answer") : elgg_echo("rijkshuisstijl:count:answers"); ?>
</div>
<div data-comments data-guid="<?php echo $entity->guid; ?>"></div>