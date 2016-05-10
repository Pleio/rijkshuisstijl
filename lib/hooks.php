<?php

function rijkshuisstijl_plugins_settings_save($hook, $type, $value, $params) {
    if (get_input('on_rijkshuisstijl_settings') != "true") {
        return;
    }

    $params = get_input('params');
    $params['contact'] = serialize($params['contact']);
    set_input('params', $params);
}

function rijkshuisstijl_custom_index($hook, $type, $value, $params) {
    include(dirname(dirname(__FILE__)) . "/pages/index.php");
    return true;
}

function rijkshuisstijl_menu_handler($hook, $type, $menu, $params) {
    $menu['default'] = array();
    $menu['default'][] = new ElggMenuItem('home', elgg_echo('rijkshuisstijl:menu:home'), '/');
    $menu['default'][] = new ElggMenuItem('forum', elgg_echo('rijkshuisstijl:menu:forum'), '/forum');
    $menu['default'][] = new ElggMenuItem('news', elgg_echo('rijkshuisstijl:menu:news'), '/news');
    $menu['default'][] = new ElggMenuItem('videos', elgg_echo('rijkshuisstijl:menu:videos'), '/videos');

    $themes = new ElggMenuItem('themes', elgg_echo('rijkshuisstijl:menu:themes'), '#');
    $themes->addChild(new ElggMenuItem('inkomstenbelasting', 'Inkomstenbelasting', '/themes/inkomstenbelasting'));
    $themes->addChild(new ElggMenuItem('loonheffing', 'Loonheffing', '/themes/loonheffing'));
    $themes->addChild(new ElggMenuItem('omzetbelasting', 'Omzetbelasting', '/themes/omzetbelasting'));
    $menu['default'][] = $themes;

    $menu['default'][] = new ElggMenuItem('pinboard', elgg_echo('rijkshuisstijl:menu:pinboard'), '/pinboard');

    return $menu;
}