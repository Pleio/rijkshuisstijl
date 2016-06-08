<?php
$group = elgg_extract('group', $vars);

$options = array(
  'type' => 'object',
  'subtype' => 'videos',
  'pagination' => false,
  'full_view' => false
);

if ($group) {
  $options['container_guid'] = $group->guid;
}

?>

<div class="rhs-sections">
  <div class="rhs-section">
    <div class="rhs-container">
      <h2 class="rhs-section__subtitle"><?php echo elgg_echo('rijkshuisstijl:videos'); ?></h2>
      <a href="/videos" title="<?php echo elgg_echo('rijkshuisstijl:more'); ?>" class="rhs-section__read-more"><?php echo elgg_echo('rijkshuisstijl:all') ?></a>

      <div class="rhs-row">
        <div class="rhs-col-md-12">
          <?php echo elgg_list_entities($options); ?>
        </div>
      </div>
    </div>
  </div>
</div>