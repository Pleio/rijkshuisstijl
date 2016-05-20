<?php

$category_options = array(
    'all' => elgg_echo('rijkshuisstijl:all'),
    'search' => elgg_echo('pinboard:purpose:search'),
    'share' => elgg_echo('pinboard:purpose:share'),
    'experience' => elgg_echo('pinboard:purpose:experience')
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