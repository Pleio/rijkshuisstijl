<div class="rhs-container">
        <div class="rhs-row">
          <div class="rhs-col-md-4 rhs-col-lg-3">
            <h2 class="rhs-footer__title">Contact</h2>
            <ul class="rhs-footer__list">
              <li class="rhs-footer__list__item"><a href="#" title="..." target="_blank" class="rhs-footer__link">Bellen</a></li>
              <li class="rhs-footer__list__item"><a href="#" title="..." target="_blank" class="rhs-footer__link">Bezoeken</a></li>
              <li class="rhs-footer__list__item"><a href="#" title="..." target="_blank" class="rhs-footer__link">Per brief</a></li>
              <li class="rhs-footer__list__item"><a href="#" title="..." target="_blank" class="rhs-footer__link">belastingdienst.nl</a></li>
            </ul>
          </div>
          <div class="rhs-col-md-4 rhs-col-lg-3">
            <h2 class="rhs-footer__title">Volg ons op</h2>
            <ul class="rhs-footer__list">
              <li class="rhs-footer__list__item"><a href="#" title="..." class="rhs-footer__link">Twitter</a></li>
              <li class="rhs-footer__list__item"><a href="#" title="..." class="rhs-footer__link">YouTube</a></li>
              <li class="rhs-footer__list__item"><a href="#" title="..." class="rhs-footer__link">LinkedIn</a></li>
            </ul>
          </div>
        </div>
</div>

<?php
echo elgg_view_menu('footer', array('sort_by' => 'priority', 'class' => 'elgg-menu-hz'));

$powered_url = elgg_get_site_url() . "_graphics/powered_by_elgg_badge_drk_bckgnd.gif";

echo '<div class="mts clearfloat float-alt">';
echo elgg_view('output/url', array(
	'href' => 'http://elgg.org',
	'text' => "<img src=\"$powered_url\" alt=\"Powered by Elgg\" width=\"106\" height=\"15\" />",
	'class' => '',
	'is_trusted' => true,
));
echo '</div>';
?>