<?php
$plugin = elgg_extract("entity", $vars);

$default_colors = array(
    1 => "#8FCAE7",
    2 => "#DDEFF8",
    3 => "#154273",
    4 => "#009EE3",
    5 => "#0E6999",
    6 => "#1AA0E0",
    7 => "#01689B",
    8 => "#EEF7FB",
    9 => "#F2F9FC"
);

if ($plugin->colors) {
    $colors = unserialize($plugin->colors);
}

echo "<p>";
    echo "<label>" . elgg_echo("rijkshuisstijl:logo") . "</label>";
    echo elgg_view('input/radio', array(
        'name' => 'params[logo]',
        'options' => array(
            'Belastingdienst' => 'belastingdienst',
            'Rijksdienst voor Ondernemend Nederland' => 'rvo'
        ),
        'value' => $plugin->logo ? $plugin->logo : "belastingdienst"
    ));
echo "</p>";

echo "<p>";
    echo "<label>" . elgg_echo("rijkshuisstijl:colors") . "</label>";
echo "</p>";
echo "<div>";
    for ($i = 1; $i < 10; $i++) {
        echo elgg_view("input/color", array(
            "name" => "params[colors][{$i}]",
            "label" => elgg_echo("rijkshuisstijl:color") . " {$i}",
            "value" => $colors[$i] ? $colors[$i] : $default_colors[$i]
        ));
    }
echo "</div>";

echo "<div style='clear:both'>";
    echo "<br /><br />";
    echo "<p>";
    echo "<label>" . elgg_echo("rijkshuisstijl:special_settings") . "</label>";
    echo elgg_view('input/radio', array(
        'name' => 'params[special]',
        'options' => array(
            elgg_echo("rijkshuisstijl:none") => 'none',
            elgg_echo("rijkshuisstijl:ffd") => 'ffd'
        ),
        'value' => $plugin->special ? $plugin->special : "none"
    ));
    echo "<div class='elgg-subtext'>";
        echo elgg_echo("rijkshuisstijl:special_settings:explanation");
    echo "</div>";
    echo "</p>";
echo "</div>";
