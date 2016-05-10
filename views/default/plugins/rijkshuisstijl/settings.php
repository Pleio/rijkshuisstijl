<?php
$plugin = elgg_extract("entity", $vars);

$contact = unserialize($plugin->contact);
$topics = unserialize($plugin->topics);

if (!$plugin->logo) {
    $plugin->logo = "belastingdienst";
}

if (!$topics) {
    $topics = array();
}

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



echo "<p>";
    echo "<label>".  elgg_echo("rijkshuisstijl:contact") . "</label>";
    echo "<table>";
    echo "<tr><td>" . elgg_echo("rijkshuisstijl:title") . "</td><td>" . elgg_echo("rijkshuisstijl:url") . "</td></tr>";
    for ($i = 1; $i <= 5; $i++):
        echo "<tr><td>";
        echo elgg_view('input/text', array(
            'name' => "params[contact][{$i}][title]",
            'value' => $contact[$i]['title']
        ));
        echo "</td><td>";
        echo elgg_view('input/text', array(
            'name' => "params[contact][{$i}][url]",
            'value' => $contact[$i]['url']
        ));
        echo "</td></tr>";
    endfor;
    echo "</table>";
echo "</p>";

echo "<p>";
    echo "<label>".  elgg_echo("rijkshuisstijl:settings:topics") . "</label>";
    echo "<table>";
    echo "<tr><td>" . elgg_echo("rijkshuisstijl:title") . "</td><td>" . elgg_echo("Tag") . "</td></tr>";

    $i = 1;
    foreach ($topics as $tag => $title) {
        echo "<tr><td>";
        echo elgg_view('input/text', array(
            'name' => "params[topics][{$i}][title]",
            'value' => $title
        ));
        echo "</td><td>";
        echo elgg_view('input/text', array(
            'name' => "params[topics][{$i}][tag]",
            'value' => $tag
        ));
        echo "</td></tr>";
        $i++;
    }
    echo "</table>";
echo "</p>";

echo elgg_view("input/hidden", array(
    'name' => 'on_rijkshuisstijl_settings',
    'value' => 'true'
));