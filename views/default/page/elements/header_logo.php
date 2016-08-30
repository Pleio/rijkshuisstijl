<?php
/**
 * Elgg header logo
 */

$site = elgg_get_site_entity();
$site_name = $site->name;
$site_url = elgg_get_site_url();

$logo = elgg_get_plugin_setting('logo', 'rijkshuisstijl');

?>

<?php if ($logo): ?>
    <a href="<?php echo $site_url; ?>" title="Terug naar home" class="rhs-header__logo">
        <img src="<?php echo rijkshuisstijl_asset("image/logo-{$logo}.png"); ?>" alt="<?php echo $site_name; ?>">
    </a>
<?php endif; ?>