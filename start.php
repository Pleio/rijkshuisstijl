<?php
include_once(dirname(__FILE__) . "/lib/functions.php");

/**
 * Members plugin intialization
 */
elgg_register_event_handler('init', 'system', 'rijkshuisstijl_init');

/**
 * Initialize page handler and site menu item
 */
function rijkshuisstijl_init() {
    elgg_register_css('rijkshuisstijl', '/mod/rijkshuisstijl/assets/rijkshuisstijl.css');
    elgg_load_css('rijkshuisstijl');

    elgg_register_js('rijkshuisstijl', '/mod/rijkshuisstijl/assets/rijkshuisstijl.js');
    elgg_load_js('rijkshuisstijl');

    // fix hacks of older Elgg modules
    elgg_unextend_view('page/elements/head', 'subsite_manager/topbar_fix');

    elgg_register_page_handler('rijkshuisstijl', 'rijkshuisstijl_page_handler');

	$item = new ElggMenuItem('rijkshuisstijl', elgg_echo('rijkshuisstijl'), 'rijkshuisstijl');
	elgg_register_menu_item('site', $item);
}

/**
 * Rijkshuisstijl page handler
 *
 * @param array $page url segments
 * @return bool
 */
function rijkshuisstijl_page_handler($page) {
	$base = elgg_get_plugins_path() . 'rijkshuisstijl/pages/bulletin';

	if (!isset($page[0])) {
		$page[0] = 'alpha';
	}

	$vars = array();
	$vars['page'] = $page[0];

	if ($page[0] == 'search') {
		require_once "$base/search.php";
	} else {
		require_once "$base/index.php";
	}
	return true;
}
