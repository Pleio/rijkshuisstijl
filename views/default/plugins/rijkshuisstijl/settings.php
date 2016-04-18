<?php

$plugin = elgg_extract("entity", $vars);

echo "<p>";
    echo "<label>" . elgg_echo("rijkshuisstijl:logo") . "</label>";
    echo elgg_view('input/radio', array(
        'name' => 'params[logo]',
        'options' => array(
            'Belastingdienst' => 'belastingdienst',
            'Rijksdienst voor Ondernemend Nederland' => 'rvo'
        ),
        'value' => $plugin->logo
    ));
echo "</p>";