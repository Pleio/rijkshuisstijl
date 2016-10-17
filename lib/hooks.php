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
    $allowed_styles = ["cursor", "text-align", "vertical-align", "font-size", "border", "border-top", "background-color", "border-bottom", "border-left", "border-right", "margin", "margin-top", "margin-bottom", "margin-left", "margin-right", "padding", "float", "width"];

    return array_intersect($value, $allowed_styles);
}

function rijkshuisstijl_site_menu_prepare($hook, $type, $value, $params) {
    $selected = false;
    foreach ($value as $section) {
        foreach ($section as $item) {
            if ($item->getSelected()) {
                $selected = true;
                break 2;
            }
        }
    }

    if (!$selected) {
        $current_url = current_page_url();
        $site_url = elgg_get_site_url();

        foreach ($value as $section_name => $section) {
            foreach ($section as $key => $item) {
                // do not highlight external links
                if (strpos($item->getHref(), $site_url) !== 0) {
                    continue;
                }

                // do not highlight links to main site URL
                if ($item->getHref() == $site_url) {
                    continue;
                }

                if (strpos($current_url, $item->getHref()) === 0) {
                    $value[$section_name][$key]->setSelected(true);
                    break 2;
                }
            }
        }
    }

    return $return;
}