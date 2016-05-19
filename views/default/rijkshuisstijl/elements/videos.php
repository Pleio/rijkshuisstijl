<?php
$videos = elgg_get_entities(array(
  'type' => 'object',
  'subtype' => 'videos'
));
?>

<?php if (count($videos) > 0): ?>
  <?php $videos = $videos[0]; ?>
  <div class="rhs-home__section">
    <div class="rhs-container">
      <div class="rhs-row">
        <div class="rhs-col-md-12">
          <h2 class="rhs-home__subtitle"><?php echo elgg_echo('rijkshuisstijl:videos'); ?></h2><a href="/videos" title="..." class="rhs-home__readmore"><?php echo elgg_echo('rijkshuisstijl:all'); ?></a>
        </div>
      </div>

      <div class="rhs-row">
        <div class="rhs-col-md-12">
          <?php echo elgg_view_entity($videos); ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>