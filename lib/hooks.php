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

function rijkshuisstijl_menu_handler($hook, $type, $items, $params) {
    $items = array();

    $items[] = ElggMenuItem::factory(array(
        'name' => 'home',
        'text' => elgg_echo('rijkshuisstijl:home'),
        'href' => '/',
        'priority' => 100
    ));

    $items[] = ElggMenuItem::factory(array(
        'name' => 'forum',
        'text' => elgg_echo('rijkshuisstijl:forum'),
        'href' => 'forum',
        'priority' => 101
    ));

    $items[] = ElggMenuItem::factory(array(
        'name' => 'news',
        'text' => elgg_echo('rijkshuisstijl:news'),
        'href' => 'news',
        'priority' => 102
    ));

    $items[] = ElggMenuItem::factory(array(
        'name' => 'videos',
        'text' => elgg_echo('rijkshuisstijl:videos'),
        'href' => 'videos',
        'priority' => 103
    ));

    $children = array();
    $topics = unserialize(elgg_get_plugin_setting('topics', 'rijkshuisstijl'));

    foreach ($topics as $tag => $title) {
        $children[] = new ElggMenuItem("topics-" . $tag, $title, '/topics/' . $tag);
    }

    $items[] = ElggMenuItem::factory(array(
        'name' => 'topics',
        'text' => elgg_echo('rijkshuisstijl:topics'),
        'href' => '/topics',
        'priority' => 104,
        'children' => $children
    ));

    $items[] = ElggMenuItem::factory(array(
        'name' => 'pinboard',
        'text' => elgg_echo('rijkshuisstijl:pinboard'),
        'href' => '/pinboard',
        'priority' => 105
    ));

    return $items;
}