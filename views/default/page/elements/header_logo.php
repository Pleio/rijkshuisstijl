<?php
/**
 * Elgg header logo
 */

$site = elgg_get_site_entity();
$site_name = $site->name;
$site_url = elgg_get_site_url();
?>

<div class="header">
  <div class="container"><a href="<?php echo $site_url; ?>" title="Terug naar home" class="header__logo"><img src="<?php echo rijkshuisstijl_asset('image/rijks_logo.png'); ?>" alt="<?php echo $site_name; ?>"></a></div>
</div>