<?php
$contact = unserialize(elgg_get_plugin_setting('contact', 'rijkshuisstijl'));
?>
<div class="rhs-container">
        <div class="rhs-row">
          <div class="rhs-col-md-4 rhs-col-lg-3">
            <?php if (is_array($contact) && count($contact) > 0): ?>
              <h2 class="rhs-footer__title">Contact</h2>
              <ul class="rhs-footer__list">
                <?php foreach($contact as $item): ?>
                  <li class="rhs-footer__list__item">
                    <a href="<?php echo $item['url']; ?>" title="<?php echo $item['tite']; ?>" target="_blank" class="rhs-footer__link"><?php echo $item['title']; ?></a></li>
                  </li>
                <?php endforeach; ?>
            </ul>
            <?php endif ?>
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

<?php echo elgg_view_menu('footer', array('sort_by' => 'priority', 'class' => 'elgg-menu-hz')); ?>