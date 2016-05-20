<?php
$entity = $vars['entity'];
$poster = $entity->getOwnerEntity();
?>

<div class="rhs-col-md-12">
  <div class="rhs-card-topic"><a href="<?php echo $poster->getURL(); ?>" title="<?php echo elgg_echo("rijkshuisstijl:go_to_profile"); ?>" class="rhs-card-topic__profile-picture">
    <img src="<?php echo $poster->getIconURL('small') ?>"></a>
    <div class="rhs-card-topic__content">
      <a href="<?php echo $entity->getURL(); ?>" title="<?php echo $entity->title; ?>" class="rhs-card-topic__title">
        <?php echo $entity->title; ?>
      </a>
      <div class="rhs-card-topic__info"
        <span class="rhs-hidden-mobile">Gesteld door:</span>
          <a href="<?php echo $poster->getURL(); ?>" title="Ga naar profielpagina">
            <?php echo $poster->name; ?>
          </a>
          <?php echo elgg_view_friendly_time($entity->time_created); ?>
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
        <?php if (content_subscriptions_check_subscription($entity->guid)): ?>
          <?php echo elgg_view('output/url', array(
            'href' => '/action/content_subscriptions/subscribe?entity_guid=' . $entity->guid,
            'text' => elgg_echo("content_subscriptions:unsubscribe"),
            'title' => elgg_echo("content_subscriptions:unsubscribe"),
            'is_action' => true,
            'class' => 'rhs-card-topic__follow'
          )); ?>
        <?php else: ?>
          <?php echo elgg_view('output/url', array(
            'href' => '/action/content_subscriptions/subscribe?entity_guid=' . $entity->guid,
            'text' => elgg_echo("content_subscriptions:subscribe"),
            'title' =>elgg_echo("content_subscriptions:subscribe"),
            'is_action' => true,
            'class' => 'rhs-card-topic__follow'
          )); ?>
        <?php endif; ?>
      <?php endif; ?>

      <a href="<?php echo $entity->getURL(); ?>" title="Vraag antwoorden" class="rhs-card-topic__answers"><span><?php echo $entity->countComments(); ?></span> antwoorden</a>
    </div>
  </div>
</div>