<?php
include_once(dirname(__FILE__) . "/lib/functions.php");
include_once(dirname(__FILE__) . "/lib/hooks.php");

elgg_register_event_handler('init', 'system', 'rijkshuisstijl_init');

function rijkshuisstijl_init() {
    elgg_register_plugin_hook_handler('action', 'plugins/settings/save', 'rijkshuisstijl_plugins_settings_save');

    elgg_register_css('rijkshuisstijl', '/mod/rijkshuisstijl/assets/rijkshuisstijl.css');
    elgg_load_css('rijkshuisstijl');

    elgg_register_js('rijkshuisstijl', '/mod/rijkshuisstijl/assets/rijkshuisstijl.js');
    elgg_load_js('rijkshuisstijl');

    // fix hacks of older Elgg modules
    elgg_unextend_view('page/elements/head', 'subsite_manager/topbar_fix');
}