<?php
/**
 * Elgg topbar
 * The standard elgg top toolbar
 */
 ?>

<div class="top-navigation">
  <div class="container">
	<div class="dropdown"><a data-dropdown-trigger href="#" title="..." class="top-navigation__link top-navigation__link--left dropdown__trigger">Pleio</a>
	  <div class="dropdown__wrapper"><a href="#" class="dropdown__link">Pleio</a><a href="#" class="dropdown__link">Alle deelsites</a><a href="#" class="dropdown__link">Mijn deelsites</a></div>
	</div>

	<?php
	// Elgg logo
	// @todo: fix css
	//echo elgg_view_menu('topbar', array('sort_by' => 'priority', array('elgg-menu-hz')));

	// elgg tools menu
	// need to echo this empty view for backward compatibility.
	$content = elgg_view("navigation/topbar_tools");
	if ($content) {
		elgg_deprecated_notice('navigation/topbar_tools was deprecated. Extend the topbar menus or the page/elements/topbar view directly', 1.8);
		echo $content;
	}
	?>

	<a href="#" title="..." class="top-navigation__link top-navigation__link--right"><img src="<?php echo rijkshuisstijl_asset("image/profile-picture-3.jpg"); ?>">Yoram Zeeman</a>
  </div>
</div>