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
            <a href="javascript:window.print();" title="Geef antwoord" class="rhs-button rhs-button--with-icon">
                <span class="rhs-icon-print"></span>
                <?php echo elgg_echo("rijkshuisstijl:print"); ?>
            </a>
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