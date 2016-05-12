<?php
$full_view = isset($vars['full_view']) ? $vars['full_view'] : false;

$featured = elgg_get_entities_from_metadata(array(
    'type' => 'object',
    'subtype' => 'page_top',
    'metadata_name_value_pairs' => array(
        array(
            'name' => 'geselecteerd',
            'value' => 'true'
        )
    ),
    'limit' => 1
));

$options = array(
    'type' => 'object',
    'subtype' => array('page_top'),
    'full_view' => false,
    'pagination' => $full_view,
    'metadata_name_value_pairs' => array(
        'name' => 'tags',
        'value' => $vars['category']
    )
);

if ($vars['topic']) {
    $options['container_guid'] = $vars['topic']->guid;
}

$featured_options = array(
    0 => elgg_echo('rijkshuisstijl:all_themes')
);

foreach (rijkshuisstijl_get_featured_groups() as $group) {
    $featured_options[$group->guid] = $group->name;
}

?>

<?php if (!$full_view): ?>
    <div class="rhs-row">
      <div class="rhs-col-md-12">
        <h2 class="rhs-home__subtitle">Nieuws</h2><a href="/news" title="..." class="rhs-home__readmore">Alles</a>
      </div>
    </div>
    <div class="rhs-row">
      <div class="rhs-col-md-12">
<?php endif ?>

<?php if (count($featured) > 0): ?>
<div class="rhs-news__featured-article">
  <div class="rhs-article rhs-article--content-right">
    <div style="background-image: url('<?php echo rijkshuisstijl_asset("image/woman.jpg"); ?>');" class="rhs-article__image"></div>
    <div class="rhs-article__content">
      <h2 class="rhs-article__title">Busciis a in non eium xplabo ratectatae</h2><span class="rhs-article__category">Toeslagen</span>
      <p class="rhs-article__text" style="word-wrap: break-word;">Nuscianditate secatin ulliti audanih illendisciis explabo ratectatae. Is rendi lorem ipsum. Nuscianditate secatin ulliti audanih illendisciis explabo ratectatae. Is rendi lorem ipsum</p>
      <div class="rhs-article__read-more"><a href="#" title="Titel hier.." class="rhs-read-more"><span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>Lees meer</a></div>
    </div>
  </div>
</div>
<?php endif ?>

<?php if ($full_view): ?>
<div class="rhs-news__filter">
    <div class="rhs-row">
        <div class="rhs-col-md-4 rhs-col-lg-3">
            <?php echo elgg_view('input/dropdown', array(
                'name' => 'category',
                'options_values' => array(
                    'all' => elgg_echo('rijkshuisstijl:all_categories'),
                    'news' => elgg_echo('rijkshuisstijl:news'),
                    'jurisprudence' => elgg_echo('rijkshuisstijl:jurisprudence'),
                    'featured' => elgg_echo('rijkshuisstijl:featured')
                )
            ));
            ?>
        </div>
        <div class="rhs-col-md-4 rhs-col-lg-3">
            <?php echo elgg_view('input/dropdown', array(
                'name' => 'category',
                'options_values' => $featured_options
            ));
            ?>
        </div>
    </div>
</div>
<?php endif ?>

<?php if (!$full_view): ?>
  <div class="rhs-news-list-wrapper">
<?php endif; ?>

<?php echo elgg_list_entities_from_metadata($options); ?>

<?php if (!$full_view): ?>
  </div>
<?php endif ?>

<?php if (!$full_view): ?>
  </div>
</div>
<?php endif ?>
