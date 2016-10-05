<?php

function rijkshuisstijl_plugins_settings_save($hook, $type, $value, $params) {
    if (get_input('plugin_id') !== "rijkshuisstijl") {
        return;
    }

    $params = get_input('params');
    $params['colors'] = serialize($params['colors']);
    $params['footer'] = serialize($params['footer']);
    set_input('params', $params);

    // re-render CSS (less)
    elgg_invalidate_simplecache();
}

function rijkshuisstijl_custom_index($hook, $type, $value, $params) {
    include(dirname(dirname(__FILE__)) . "/pages/index.php");
    return true;
}

function rijkshuisstijl_allowed_styles($hook, $type, $value, $params) {
    return array_diff($value, ["cursor", "text-align", "vertical-align", "font-size", "border", "border-top", "background-color", "border-bottom", "border-left", "border-right", "margin", "margin-top", "margin-bottom", "margin-left", "margin-right", "padding", "float", "width"]);
}