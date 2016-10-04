<?php

$site = elgg_get_site_entity();
$site_name = $site->name;
$site_url = elgg_get_site_url();

$logo = elgg_get_plugin_setting("logo", "rijkshuisstijl");
?>

<header class="rhs-header">
    <div class="rhs-container">
        <?php if ($logo): ?>
            <a href="<?php echo $site->getURL(); ?>" class="rhs-header__logo" title="Terug naar home">
                <img src="<?php echo rijkshuisstijl_asset("image/logo-{$logo}.png"); ?>" alt="<?php echo $site_name; ?>">
            </a>
        <?php endif; ?>

        <?php if ($vars["show_login"]): ?>
            <?php echo elgg_view("core/account/login_dropdown"); ?>
        <?php endif; ?>
    </div>
</header>