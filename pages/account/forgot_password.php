<?php
/**
 * Assembles and outputs the forgotten password page.
 *
 * @package Elgg.Core
 * @subpackage Registration
 */

if (elgg_is_logged_in()) {
    forward();
}

$sent = get_input('sent');
$title = elgg_echo("user:password:lost");

if ($sent == "true") {
    $body = elgg_view('user/newpassword_sent');
} else {
    $body = elgg_view_form('user/requestnewpassword', array(
        'class' => 'rhs-splash js-validateForm'
    ));
}

echo elgg_view_page($title, $body, "empty", array(
    'header' => elgg_view("rijkshuisstijl/elements/header")
));