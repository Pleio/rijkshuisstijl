<?php
$group = $vars['group'];
?>

<div class="rhs-sections">
  <div class="rhs-section rhs-section--item-even">
    <?php echo elgg_view('rijkshuisstijl/elements/latest_popular_questions', array(
      'group' => $group
    )); ?>
  </div>

  <div class="rhs-section rhs-section--background-grey">
    <?php echo elgg_view('rijkshuisstijl/elements/news', array(
        'group' => $group,
        'show_title' => true
    )); ?>
  </div>

  <div class="rhs-section">
    <?php echo elgg_view('rijkshuisstijl/elements/videos', array(
      'group' => $group,
      'show_title' => true
      )); ?>
  </div>
</div>