<?php
$categories = unserialize(elgg_get_plugin_setting('footer', 'rijkshuisstijl'));
?>

<div class="rhs-container">
    <div class="rhs-row">
        <?php foreach ($categories as $category): ?>
            <div class="rhs-col-md-4 rhs-col-lg-3">
                <h2 class="rhs-footer__title">
                    <?php echo $category['title']; ?>
                </h2>
                <ul class="rhs-footer__list">
                    <?php foreach ($category['items'] as $item): ?>
                        <li class="rhs-footer__list__item">
                            <a href="<?php echo $item['url']; ?>" title="<?php echo $item['title']; ?>" target="_blank" class="rhs-footer__link">
                                <?php echo $item['title']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php echo elgg_view_menu('footer', array('sort_by' => 'priority', 'class' => 'elgg-menu-hz')); ?>