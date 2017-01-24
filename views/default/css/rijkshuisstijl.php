<?php
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