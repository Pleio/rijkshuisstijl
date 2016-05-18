<?php

echo elgg_view('input/dropdown', array(
    'name' => $vars['name'],
    'options_values' => $vars['options_values'],
    'options' => $vars['options'],
    'value' => $vars['value']
));