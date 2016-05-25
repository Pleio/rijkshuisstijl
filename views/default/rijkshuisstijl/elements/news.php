<?php
$show_title = $vars['show_title'];
$leader = rijkshuisstijl_get_news_leader();
?>

<h2 class="rhs-section__subtitle">Nieuws</h2>
<a href="/news" title="<?php echo elgg_echo('rijkshuisstijl:more'); ?>" class="rhs-section__read-more">Alles</a>

<div class="rhs-row">
  <div class="rhs-col-md-12">
    <?php if ($leader) {
      echo elgg_view('rijkshuisstijl/elements/news/leader', array(
        'leader' => $leader
      ));
    } ?>

    <div class="section__inner section__inner--background-white">
      <div class="rhs-news-list">
        <?php echo elgg_list_entities(array(
          'type' => 'object',
          'subtype' => 'news',
          'full_view' => false,
          'pagination' => !$show_title
        )); ?>
      </div>
    </div>
  </div>
</div>