<?php

$category_options = array(
    'all' => 'Alles',
    'most_viewed' => 'Meest bekeken',
    'mine' => 'Mijn vragen'
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