<?php
/**
 * Shows the overview page of the FFD Cafe
 *
 * @package theme_ffd
 */

elgg_push_context("pinboard");

$options = array(
    "type" => "object",
    "subtype" => "cafe",
    "order_by" => "e.last_action DESC",
    "fast_pagination" => true,
    "full_view" => false
);

$category = get_input("category");
if (in_array($category, array("search", "share", "experience"))) {
    $options["metadata_name_value_pairs"] = array(
        array(
            "name" => "purpose",
            "value" => $category
        )
    );
    $getter = "elgg_get_entities_from_metadata";
} else {
    $getter = "elgg_get_entities";
}

$body = elgg_view("pinboard/pages/all", array(
    "entities" => elgg_list_entities($options, $getter)
));

echo elgg_view_page(elgg_echo("pinboard"), $body, "default", array(
    "leader" => elgg_view("rijkshuisstijl/leader/pinboard"),
    "body_class" => "bulletin background-grey"
));
