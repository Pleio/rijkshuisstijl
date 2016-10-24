<?php
$entity = elgg_extract('entity', $vars);
$full_view = elgg_extract('full_view', $vars, false);

$poster = $entity->getOwnerEntity();
$title = elgg_echo("pinboard:purpose:" . $entity->purpose) . " " . $entity->title;
$count = $entity->countComments();

?>

<?php if ($full_view): ?>
    <h1 class="rhs-card-user-content__title">
        <?php echo $title; ?>
    </h1>
    <div class="rhs-card-user-content__meta">
        <a href="<?php echo $poster->getURL(); ?>" title="<?php echo $poster->name; ?>" class="rhs-card-user-content__profile">
            <img src="<?php echo $poster->getIconURL('small') ?>">
        </a>
        <div class="rhs-card-user-content__data">
            <a href="<?php echo $poster->getURL(); ?>" title="<?php echo $poster->name; ?>"><?php echo $poster->name; ?></a>
            <span><?php echo rijkshuisstijl_view_friendly_time($entity->time_created); ?></span>
        </div>
    </div>
    <div class="rhs-card-user-content__content">
        <?php echo elgg_view("output/longtext", ["value" => $entity->description]); ?>
    </div>
    <div class="rhs-card-user-content__options">
        <?php if ($entity->canWriteToContainer(0, "object", "comment")): ?>
            <button title="Geef antwoord" data-forum-answer-toggle class="rhs-button rhs-button--with-icon">
                <span class="rhs-icon-pencil"></span><?php echo elgg_echo("rijkshuisstijl:answer"); ?>
            </button>
        <?php endif; ?>
        <div class="rhs-card-user-content__mobile-top">
            <div class="rhs-card-user-content__views">
                <?php echo entity_view_counter_count_views($entity); ?>
            </div>
            <?php if ($entity->canEdit()): ?>
                <a href="/pinboard/edit/<?php echo $entity->guid; ?>" data-modal-id="#modal-item" title="<?php echo elgg_echo("rijkshuisstijl:edit"); ?>" class="js-toggleModal rhs-card-user-content__edit">
                    <?php echo elgg_echo("rijkshuisstijl:edit"); ?>
                </a>
            <?php endif; ?>
            <?php if (elgg_is_active_plugin('content_subscriptions')): ?>
                <?php echo elgg_view('rijkshuisstijl/elements/content_subscription', array(
                    'entity' => $entity,
                    'class' => 'rhs-card-user-content__follow'
                    ));?>
             <?php endif; ?>
        </div>
    </div>

    <?php if ($entity->canEdit()): ?>
        <?php echo elgg_view("modals/save_pinboard", array(
            "entity" => $entity
            )); ?>
    <?php endif; ?>
<?php else: ?>
    <div class="rhs-col-md-12">
        <div class="rhs-card-topic"><a href="<?php echo $poster->getURL(); ?>" title="<?php echo elgg_echo("rijkshuisstijl:go_to_profile"); ?>" class="rhs-card-topic__profile-picture">
            <img src="<?php echo $poster->getIconURL('small') ?>"></a>
            <div class="rhs-card-topic__content">
                <a href="<?php echo $entity->getURL(); ?>" title="<?php echo $title; ?>" class="rhs-card-topic__title">
                    <?php echo $title; ?>
                </a>
                <div class="rhs-card-topic__info"
                <span class="rhs-hidden-mobile"><?php echo elgg_echo('rijkshuisstijl:cafe:askedby') ?>:</span>
                <a href="<?php echo $poster->getURL(); ?>" title="Ga naar profielpagina">
                    <?php echo $poster->name; ?>
                </a>
                <?php echo rijkshuisstijl_view_friendly_time($entity->time_created); ?>
            </div>
            <div class="rhs-card-topic__description">
                <?php echo elgg_get_excerpt($entity->description); ?>
            </div>
        </div>
        <div class="rhs-card-topic__aside">
            <?php if (elgg_is_active_plugin('entity_view_counter')): ?>
                <div class="rhs-card-topic__views">
                    <span><?php echo entity_view_counter_count_views($entity); ?></span>
                </div>
            <?php endif; ?>

            <?php if (elgg_is_active_plugin('content_subscriptions')): ?>
                <?php
                echo elgg_view('rijkshuisstijl/elements/content_subscription', array(
                    'entity' => $entity,
                    'class' => 'rhs-card-topic__follow'
                    ));
                    ?>
                <?php endif; ?>

                <a href="<?php echo $entity->getURL(); ?>" title="Vraag antwoorden" class="rhs-card-topic__answers">
                    <span><?php echo $count; ?></span> <?php echo ($count == 1) ? elgg_echo("rijkshuisstijl:count:answer") : elgg_echo("rijkshuisstijl:count:answers"); ?>
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>