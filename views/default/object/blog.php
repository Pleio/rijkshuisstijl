<?php
$full = elgg_extract('full_view', $vars, false);
$entity = elgg_extract('entity', $vars, false);

if (!$entity) {
    return true;
}
?>

<?php if ($full): ?>
    <h1 class="rhs-news-item__title">
        <?php echo $entity->title; ?>
    </h1>
    <div class="rhs-news-item__meta">
        <div class="rhs-news-item__meta__date">
            <?php echo date("d-m-Y", $entity->time_created); ?>
        </div>
    </div>

    <div class="rhs-news-item__content rhs-content-editable">
        <?php echo elgg_view("output/longtext", ["value" => $entity->description]); ?>
    </div>

    <div class="rhs-news-item__actions">
        <div class="rhs-card-user-content__options">
            <?php if ($entity->canWriteToContainer(0, "object", "answer") && rijkshuisstijl_blog_can_comment($entity)): ?>
                <button title="Reageer" data-forum-answer-toggle class="rhs-button rhs-button--with-icon">
                    <span class="rhs-icon-pencil"></span><?php echo elgg_echo("rijkshuisstijl:answer"); ?>
                </button>
            <?php endif; ?>

            <div class="rhs-card-user-content__mobile-top">
                <div class="rhs-card-user-content__views">
                    <?php echo entity_view_counter_count_views($entity); ?>
                </div>
                <?php if ($entity->canEdit()): ?>
                    <a href="/blog/edit/<?php echo $entity->guid; ?>" title="Wijzig" class="rhs-card-user-content__edit">
                        <?php echo elgg_echo("rijkshuisstijl:edit"); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

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

    <?php if (rijkshuisstijl_blog_can_comment($entity)): ?>
        <div class="rhs-card-user-content__amount">
            <span><?php echo rijkshuisstijl_count_answers($entity); ?></span> <?php echo ($count==1) ? elgg_echo("rijkshuisstijl:count:answer") : elgg_echo("rijkshuisstijl:count:answers"); ?>
        </div>
        <div data-comments data-guid="<?php echo $entity->guid; ?>" data-show-voting="<?php echo elgg_get_plugin_setting("show_voting", "rijkshuisstijl"); ?>"></div>
    <?php endif; ?>
<?php else: ?>
    <a href="<?php echo $entity->getURL(); ?>" title="<?php echo $entity->title; ?>" class="rhs-news-list__item">
        <span class="rhs-news-list__item__date">
            <?php echo date("d-m-Y", $entity->time_created); ?>
        </span>
        <span class="rhs-news-list__item__title">
            <?php echo $entity->title; ?>
        </span>
    </a>
<?php endif; ?>