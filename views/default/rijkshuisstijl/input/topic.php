<?php

$topic_options = array(
    'mine' => elgg_echo('rijkshuisstijl:topics:mine'),
    'all' => elgg_echo('rijkshuisstijl:topics:all')
);

$groups = rijkshuisstijl_get_featured_groups();
foreach ($groups as $group) {
    $topic_options[$group->guid] = $group->name;
}

echo elgg_view('input/dropdown', array(
    'name' => 'topic',
    'options_values' => $topic_options
));
