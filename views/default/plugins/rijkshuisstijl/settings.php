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

$noyes_options = array(
    "no" => elgg_echo("option:no"),
    "yes" => elgg_echo("option:yes")
);

if ($plugin->colors) {
    $colors = unserialize($plugin->colors);
}

if ($plugin->footer) {
    $initialState = unserialize($plugin->footer);
}

if ($initialState) {
    foreach($initialState as $category => $value) {
        if (!$value['items']) {
            $initialState[$category]['items'] = array();
        }
    }
} else {
    $initialState = array();
}

echo "<script>";
echo "var initialFooterState = " . json_encode($initialState);
echo "</script>";

echo "<p>";
    echo "<label>" . elgg_echo("rijkshuisstijl:logo") . "</label>";
    echo elgg_view('input/dropdown', array(
        'name' => 'params[logo]',
        'options_values' => array(
            null => " - " . elgg_echo("rijkshuisstijl:none") . " - ",
            'belastingdienst' => 'Belastingdienst',
            'rvo' => 'Rijksdienst voor Ondernemend Nederland',
            'nationaal_archief' => 'Nationaal Archief',
            'nvwa' => 'Nederlandse Voedsel- en Warenautoriteit'
        ),
        'value' => $plugin->logo ? $plugin->logo : "belastingdienst"
    ));
echo "</p>";

echo "<p>";
    echo "<label>" . elgg_echo("rijkshuisstijl:show_voting") . "</label>";
    echo elgg_view('input/dropdown', array(
        'name' => 'params[show_voting]',
        'options_values' => array(
            'yes' => 'Ja',
            'no' => 'Nee'
        ),
        'value' => ($plugin->show_voting === "no") ? "no" : "yes"
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
echo "</div>"; ?>

<div style="clear: both" id="rijkshuisstijl-footer"></div>

<?php echo "<div style='clear:both'>";
    echo "<br /><br />";
    echo "<p>";
    echo "<label>" . elgg_echo("rijkshuisstijl:special_settings") . "</label>";
    echo elgg_view('input/radio', array(
        'name' => 'params[special]',
        'options' => array(
            elgg_echo("rijkshuisstijl:none") => 'none',
            elgg_echo("rijkshuisstijl:ffd") => 'ffd',
            elgg_echo("rijkshuisstijl:ht") => 'ht'
        ),
        'value' => $plugin->special ? $plugin->special : "none"
    ));
    echo "<div class='elgg-subtext'>";
        echo elgg_echo("rijkshuisstijl:special_settings:explanation");
    echo "</div>";
    echo "</p>";
echo "</div>";


echo "<p>";
    echo "<label>" . elgg_echo("rijkshuisstijl:registration_text") . "</label>";
    echo elgg_view('input/longtext', array(
        'name' => 'params[registration_text]',
        'value' => $plugin->registration_text
    ));
echo "</p>";

