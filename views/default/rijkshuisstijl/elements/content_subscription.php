<?php
$entity = $vars['entity'];
$class = $vars['class'];
?>

<?php if (content_subscriptions_check_subscription($entity->guid)): ?>
  <?php echo elgg_view('output/url', array(
    'href' => '/action/content_subscriptions/subscribe?entity_guid=' . $entity->guid,
    'text' => elgg_echo("content_subscriptions:unsubscribe"),
    'title' => elgg_echo("content_subscriptions:unsubscribe"),
    'is_action' => true,
    'class' => $class
  )); ?>
<?php else: ?>
  <?php echo elgg_view('output/url', array(
    'href' => '/action/content_subscriptions/subscribe?entity_guid=' . $entity->guid,
    'text' => elgg_echo("content_subscriptions:subscribe"),
    'title' =>elgg_echo("content_subscriptions:subscribe"),
    'is_action' => true,
    'class' => $class
  )); ?>
<?php endif; ?>