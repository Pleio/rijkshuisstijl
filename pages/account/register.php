<?php
/**
 * Assembles and outputs the registration page.
 *
 * Since 1.8, registration can be disabled via administration.  If this is
 * the case, calls to this page will forward to the network front page.
 *
 * If the user is logged in, this page will forward to the network
 * front page.
 *
 * @package Elgg.Core
 * @subpackage Registration
 */

// check new registration allowed
if (elgg_get_config('allow_registration') == false) {
    register_error(elgg_echo('registerdisabled'));
    forward();
}

// only logged out people need to register
if (elgg_is_logged_in()) {
    forward();
}

$content = elgg_view_title($title);



$title = elgg_echo("register");

$completed = get_input("completed");
if ($completed == "true") {
    $content = elgg_view("register/completed");
} else {
    $content = elgg_view_form("register");
}

echo elgg_view_page($title, $content, "empty", array(
    'header' => elgg_view("rijkshuisstijl/elements/header")
));
