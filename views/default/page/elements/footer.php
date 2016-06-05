<?php
$contact = unserialize(elgg_get_plugin_setting('contact', 'rijkshuisstijl'));
?>

<div class="rhs-container">
  <div class="rhs-row">
    <div class="rhs-col-md-4 rhs-col-lg-3">
      <h2 class="rhs-footer__title"><?php echo elgg_echo('rijkshuisstijl:footer:contact') ?></h2>
      <ul class="rhs-footer__list">
        <li class="rhs-footer__list__item"><a href="#" title="..." target="_blank" class="rhs-footer__link"><?php echo elgg_echo('rijkshuisstijl:footer:phone') ?></a></li>
        <li class="rhs-footer__list__item"><a href="#" title="..." target="_blank" class="rhs-footer__link"><?php echo elgg_echo('rijkshuisstijl:footer:visit') ?></a></li>
        <li class="rhs-footer__list__item"><a href="#" title="..." target="_blank" class="rhs-footer__link"><?php echo elgg_echo('rijkshuisstijl:footer:mail') ?></a></li>
        <li class="rhs-footer__list__item"><a href="#" title="..." target="_blank" class="rhs-footer__link">belastingdienst.nl</a></li>
      </ul>
    </div>
    <div class="rhs-col-md-4 rhs-col-lg-3">
      <h2 class="rhs-footer__title"><?php echo elgg_echo('rijkshuisstijl:footer:followus') ?></h2>
      <ul class="rhs-footer__list">
        <li class="rhs-footer__list__item"><a href="#" title="..." class="rhs-footer__link">Twitter</a></li>
        <li class="rhs-footer__list__item"><a href="#" title="..." class="rhs-footer__link">YouTube</a></li>
        <li class="rhs-footer__list__item"><a href="#" title="..." class="rhs-footer__link">LinkedIn</a></li>
      </ul>
    </div>
  </div>
</div>

<?php echo elgg_view_menu('footer', array('sort_by' => 'priority', 'class' => 'elgg-menu-hz')); ?>