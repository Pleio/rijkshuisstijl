<?php
$show_title = $vars['show_title'];
$leader = rijkshuisstijl_get_news_leader();
?>

<?php if ($show_title): ?>
  <h2 class="rhs-section__subtitle">Nieuws</h2>
  <a href="/news" title="<?php echo elgg_echo('rijkshuisstijl:more'); ?>" class="rhs-section__read-more">Alles</a>
<?php endif; ?>

<div class="rhs-row">
  <div class="rhs-col-md-12">
    <?php if ($leader) {
      echo elgg_view('rijkshuisstijl/elements/news/leader', array(
        'leader' => $leader
      ));
    } ?>

    <?php if (!$show_title): ?>
      <div class="rhs-section rhs-section--item">
        <div class="rhs-news__filter">
          <div class="rhs-row">
            <p class="rhs-col-md-4 rhs-col-lg-3">
              <select name="category" id="category" class="selecter-default" tabindex="-1">
                <option value="all" selected="">Alle categoriën</option>
                <option value="nieuws">Nieuws</option>
                <option value="jurisprudentie">Jurisprudentie</option>
                <option value="uitgelicht">Uitgelicht</option>
              </select>
            </p>
            <p class="rhs-col-md-4 rhs-col-lg-3">
              <select name="theme" id="thema" class="selecter-default" tabindex="-1">
                <option value="all" selected="selected">Alle thema’s</option>
                <option value="inkomstenbelasting">Inkomstenbelasting</option>
                <option value="loonheffing">Loonheffing</option>
                <option value="omzetbelasting">Omzetbelasting</option>
                <option value="toeslagen">Toeslagen</option>
                <option value="vennootschapsbelasting">Vennootschapsbelasting</option>
              </select>
            </p>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <div class="section__inner section__inner--background-white hidden-xs hidden-sm">
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