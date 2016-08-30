<?php
$entity = $vars['entity'];
$poster = $entity->getOwnerEntity();

if ($entity->canEdit()) {
  $onclick = "onclick=\"location.href = '/comment/edit/" . $entity->guid . "'\"";
} else {
  $onclick = '';
}

?>

<div class="rhs-reaction">
  <div class="rhs-reaction__top">
    <a href="<?php echo $poster->getURL(); ?>" title="<?php echo elgg_echo("rijkshuisstijl:go_to_profile"); ?>" class="rhs-reaction__profile">
      <img src="<?php echo $poster->getIconURL('small'); ?>">
    </a>
    <a href="<?php echo $poster->getURL(); ?>" title="<?php echo elgg_echo("rijkshuisstijl:go_to_profile"); ?>" class="rhs-reaction__name">
      <?php echo $poster->name; ?>
    </a>
    <div class="rhs-reaction__time"><?php echo rijkshuisstijl_view_friendly_time($entity->time_created); ?></div>
  </div>
  <div class="rhs-reaction__body">
    <div class="<?php echo ($entity->canEdit()) ? "rhs-reaction__editable": "" ?>" <?php echo $onclick; ?>>
      <?php echo $entity->description; ?>
    </div>

    <?php if (elgg_is_logged_in()): ?>
      <div class="rhs-reaction__vote-up-down">
        <p class="rhs-vote-up-down">
          <button data-vote-up title="<?php echo elgg_echo("rijkshuisstijl:vote:up"); ?>" class="rhs-vote-up-down__control __up" data-guid="<?php echo $entity->guid ?>">
            <?php echo elgg_echo("rijkshuisstijl:vote:up"); ?>
          </button>
          <span class="rhs-vote-up-down__score">
            <?php echo rijkshuisstijl_get_votes($entity); ?>
          </span>
          <button data-vote-down title="<?php echo elgg_echo("rijkshuisstijl:vote:down"); ?>" class="rhs-vote-up-down__control __down" data-guid="<?php echo $entity->guid ?>">
            <?php echo elgg_echo("rijkshuisstijl:vote:down"); ?>
          </button>
        </p>
      </div>
    <?php endif; ?>
  </div>
</div>