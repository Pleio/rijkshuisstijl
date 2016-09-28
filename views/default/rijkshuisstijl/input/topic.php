<?php

$topic_options = array(
    'mine' => elgg_echo('rijkshuisstijl:topics:mine'),
    'all' => elgg_echo('rijkshuisstijl:topics:all')
);

$groups = rijkshuisstijl_get_featured_groups();
foreach ($groups as $group) {
    $topic_options[$group->guid] = $group->name;
}

$defaults = array(
    'name' => 'topic',
    'options_values' => $topic_options,
    'data-filter-select' => ''
);

$value = get_input('topic');
if (array_key_exists($value, $topic_options)) {
    $defaults['value'] = $value;
}

$vars = array_merge($defaults, $vars);

if ($groups) {
    echo elgg_view('input/dropdown', $vars);
}
