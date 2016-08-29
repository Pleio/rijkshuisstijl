<?php

$category_options = array(
    'all' => elgg_echo("rijkshuisstijl:all_categories"),
    'news' => elgg_echo("rijkshuisstijl:news"),
    'jurisprudence' => elgg_echo("rijkshuisstijl:jurisprudence")
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