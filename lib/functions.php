<?php

function rijkshuisstijl_asset($asset) {
    return '/mod/rijkshuisstijl/assets/' . $asset;
}

function rijkshuisstijl_get_latest_objects_by_tag($subtype = 'question', $tag = '') {
    return elgg_get_entities_from_metadata(array(
        'type' => 'object',
        'subtype' => 'question',
        'metadata_name_value_pairs' => array(
            array(
                'name' => 'tags',
                'value' => $tag
            )
        ),
        'order_by' => 'e.time_updated DESC',
        'limit' => 5
    ));
}

?>