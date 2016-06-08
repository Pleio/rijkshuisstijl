<?php
$show_title = elgg_extract('show_title', $vars);
$group = elgg_extract('group', $vars);
$leader = rijkshuisstijl_get_news_leader();

$options = array(
  'type' => 'object',
  'subtype' => 'news',
  'full_view' => false,
  'pagination' => !$show_title
);

if ($group) {
  $options['container_guid'] = $group->guid;
}

?>

<div class="rhs-container">
  <h2 class="rhs-section__subtitle"><?php echo elgg_echo('rijkshuisstijl:news') ?></h2>
  <a href="/news" title="<?php echo elgg_echo('rijkshuisstijl:more'); ?>" class="rhs-section__read-more"><?php echo elgg_echo('rijkshuisstijl:all') ?></a>

  <div class="rhs-row">
    <div class="rhs-col-md-12">
      <?php if ($leader) {
        echo elgg_view('rijkshuisstijl/elements/news/leader', array(
          'leader' => $leader
        ));
      } ?>

      <div class="section__inner section__inner--background-white">
        <div class="rhs-news-list">
          <?php echo elgg_list_entities($options); ?>
        </div>
      </div>
    </div>
  </div>
</div>