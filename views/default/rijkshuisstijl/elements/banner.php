<?php
$banner = unserialize(elgg_get_plugin_setting("banner", "rijkshuisstijl"));
?>

<?php if ($banner && $banner['show'] == "yes"): ?>
    <div class="rhs-section rhs-section--no-padding">
        <div style="background-image:url('<?php echo ($banner["photoTime"]) ? "/rijkshuisstijl/banner?time=" . $banner["photoTime"] : ""; ?>');" class="rhs-section-banner">
            <div class="rhs-container">
                <div class="rhs-section-banner__inner">
                    <h2 class="rhs-section-banner__title"><?php echo $banner['title']; ?></h2>
                    <div class="rhs-section-banner__description hidden-xs">
                      <?php echo $banner['description']; ?>
                    </div>
                    <p class="rhs-section-banner__read-more">
                        <a href="<?php echo $banner['url']; ?>" title="<?php echo $banner['title']; ?>" class="rhs-read-more rhs-read-more--white">
                            <span class="rhs-icon-arrow-right-circle rhs-read-more__icon rhs-read-more--white__icon"></span>
                            <?php echo elgg_echo("rijkshuisstijl:more"); ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>