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