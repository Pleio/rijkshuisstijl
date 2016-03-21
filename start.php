<?php
include_once(dirname(__FILE__) . "/lib/functions.php");

elgg_register_event_handler('init', 'system', 'rijkshuisstijl_init');

function rijkshuisstijl_init() {
    elgg_register_simplecache_view('css/rijkshuisstijl');
    $css_url = elgg_get_simplecache_url('css', 'rijkshuisstijl');
    elgg_register_css('rijkshuisstijl', $css_url);
    elgg_load_css('rijkshuisstijl');

    /*elgg_register_simplecache_view('js/rijkshuisstijl');
    $js_url = elgg_get_simplecache_url('js', 'rijkshuisstijl');
    elgg_register_js('rijkshuisstijl', $js_url);
    elgg_load_js('rijkshuisstijl');*/

    // fix previous hacks
    elgg_unextend_view('page/elements/head', 'subsite_manager/topbar_fix');
}