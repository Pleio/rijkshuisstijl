<?php

$category_options = array(
    'all' => elgg_echo('rijkshuisstijl:all'),
    'search' => elgg_echo('theme_ffd:cafe:purpose:search'),
    'share' => elgg_echo('theme_ffd:cafe:purpose:share'),
    'experience' => elgg_echo('theme_ffd:cafe:purpose:experience')
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