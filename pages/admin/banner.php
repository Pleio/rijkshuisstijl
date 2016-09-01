<?php

$title = elgg_echo("rijkshuisstijl:manage_banner");
$body = elgg_view("rijkshuisstijl/pages/admin/banner");

echo elgg_view_page($title, $body, "default", array(
    "body_class" => "background-grey"
));