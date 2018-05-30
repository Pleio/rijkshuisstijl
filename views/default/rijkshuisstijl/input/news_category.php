<?php

$category_options = array(
    '' => elgg_echo("rijkshuisstijl:all_categories"),
    'nieuws' => elgg_echo("rijkshuisstijl:news"),
    'juris' => elgg_echo("rijkshuisstijl:juris"),
    'handreiking' => elgg_echo("rijkshuisstijl:handreiking"),
    'achtergrond' => elgg_echo("rijkshuisstijl:achtergrond"),
    'blog' => elgg_echo("rijkshuisstijl:blog"),
);

$options = array(
    'name' => 'category',
    'options_values' => $category_options,
    'data-filter-select' => ''
);

$value = get_input('category');
if (array_key_exists($value, $category_options)) {
    $options['value'] = $value;
}

echo elgg_view('input/dropdown', $options);