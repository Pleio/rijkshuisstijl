<?php

if (elgg_is_logged_in()) {
    forward('');
}

$title = elgg_echo('login');
$content = elgg_view_form('login', array(
    'class' => 'rhs-splash js-validateForm'
));

echo elgg_view_page($title, $content, "empty", array(
    'header' => elgg_view("rijkshuisstijl/elements/header")
));
