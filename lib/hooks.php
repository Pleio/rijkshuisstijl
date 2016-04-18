<?php

function rijkshuisstijl_plugins_settings_save($hook, $type, $value, $params) {
    if (get_input('on_rijkshuisstijl_settings') != "true") {
        return;
    }

    $params = get_input('params');
    $params['contact'] = serialize($params['contact']);
    set_input('params', $params);
}