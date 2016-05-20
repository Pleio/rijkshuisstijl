<?php
function rijkshuisstijl_asset($asset) {
    return '/mod/rijkshuisstijl/assets/' . $asset;
}

function rijkshuisstijl_get_featured_groups() {
    return elgg_get_entities_from_metadata(array(
        'types' => 'group',
        'metadata_name' => 'featured_group',
        'metadata_value' => 'yes',
        'limit' => 10
    ));
}

function rijkshuisstijl_get_latest_objects_from_group($subtype = 'question', ElggGroup $group) {
    return elgg_get_entities(array(
        'type' => 'object',
        'subtype' => $subtype,
        'container_guid' => $group->guid,
        'order_by' => 'e.time_updated DESC',
        'limit' => 5
    ));
}

function rijkshuisstijl_get_news_leader() {
    $leader = elgg_get_entities_from_metadata(array(
        'type' => 'object',
        'subtype' => 'news',
        'metadata_name_value_pairs' => array(
            array(
                'name' => 'headertime',
                'operand' => '!=',
                'value' => 'null'
            )
        ),
        'limit' => 1
    ));

    if (count($leader) == 1) {
        return $leader[0];
    } else {
        return null;
    }
}

?>