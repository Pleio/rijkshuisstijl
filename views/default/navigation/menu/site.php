<?php
/**
 * Site navigation menu
 *
 * @uses $vars['menu']['default']
 * @uses $vars['menu']['more']
 */

$default_items = elgg_extract('default', $vars['menu'], array());
$more_items = elgg_extract('more', $vars['menu'], array());

foreach ($default_items as $menu_item) {
	echo elgg_view('navigation/menu/elements/site-item', array('item' => $menu_item));
}

if ($more_items) {
	$more = elgg_echo('more');
	echo "<a href=\"#\" class=\"rhs-main-navigation__link\">$more</a>";

	/*echo elgg_view('navigation/menu/elements/section', array(
		'class' => 'elgg-menu elgg-menu-site elgg-menu-site-more',
		'items' => $more_items,
	));*/
}