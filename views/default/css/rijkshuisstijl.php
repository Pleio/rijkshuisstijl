<?php
$site = elgg_get_site_entity();
$key = "css_" . $site->guid;

if (is_memcache_available()) {
    $cache = new ElggMemcache("rijkshuisstijl");
    $css = $cache->load($key);

    if ($css) {
        echo $css;
        return;
    }
}

$parser = new Less_Parser();
$parser->parseFile(RIJKSHUISSTIJL_LESS . "/all.less", "/mod/rijkshuisstijl/src/assets/");

$colors = elgg_get_plugin_setting("colors", "rijkshuisstijl");
if ($colors) {
    $colors = unserialize($colors);
    foreach ($colors as $number => $value) {
        $parser->parse("@belastingdienst--{$number}: $value;");
    }
}

$css = $parser->getCss();
echo $css;

if (is_memcache_available()) {
    $cache->save($key, $css, 0);
}