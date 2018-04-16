<?php
$site = elgg_get_site_entity();
elgg_set_page_owner_guid($site->guid);

$content = elgg_view("rijkshuisstijl/pages/index");

echo elgg_view_page("", $content, "default", array(
    "leader" => elgg_view("rijkshuisstijl/leader/home"),
    "body_class" => ($special === "ht") ? "background-grey" : ""
));