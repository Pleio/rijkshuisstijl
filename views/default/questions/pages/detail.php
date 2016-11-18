<?php
$entity = $vars['entity'];
$workflow = $vars['workflow'];
?>

<?php
// switch to go from frontend to backend
if (questions_workflow_enabled() && questions_is_expert()) {
  echo elgg_view('questions/overview', array('question'=>$entity));
}
?>

<?php echo elgg_view_entity($entity, array(
    'full_view' => true
)); ?>

<?php if (!$workflow && elgg_is_logged_in()): ?>
    <div data-forum-answer-block="" class="rhs-edit-block__wrapper" style="">
        <?php echo elgg_view_form("answers/save", array(
            'name' => 'question_answer',
            'class' => 'rhs-edit-block',
            'action' => 'action/object/answer/add'
        ), array(
            'entity' => $entity
        )); ?>
    </div>
<?php endif; ?>

<div class="rhs-card-user-content__amount">
    <span><?php echo $entity->countAnswers(); ?></span> <?php echo ($count==1) ? elgg_echo("rijkshuisstijl:count:answer") : elgg_echo("rijkshuisstijl:count:answers"); ?>
</div>

<div data-comments data-guid="<?php echo $entity->guid; ?>" data-show-voting="<?php echo elgg_get_plugin_setting("show_voting", "rijkshuisstijl"); ?>"></div>