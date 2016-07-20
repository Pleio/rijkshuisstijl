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

function rijkshuisstijl_get_latest_objects($subtype = 'question', ElggGroup $group = null) {
    $options = array(
        'type' => 'object',
        'subtype' => $subtype,
        'order_by' => 'e.time_updated DESC',
        'limit' => 5
    );

    if ($group) {
        $options['container_guid'] = $group->guid;
    }

    return elgg_get_entities($options);
}

function rijkshuisstijl_get_popular_objects($subtype = 'question', ElggGroup $group = null) {
    $options = array(
        'type' => 'object',
        'subtype' => $subtype,
        'private_setting_name' => 'view_counter',
        'order_by' => 'cast(ps.value as unsigned) DESC',
        'limit' => 5
    );

    if ($group) {
        $options['container_guid'] = $group->guid;
    }

    return elgg_get_entities_from_private_settings($options);
}

function rijkshuisstijl_get_interests($user) {
    $interests = $user->interests;
    if ($interests) {
        if (is_array($interests)) {
            return $interests;
        } else {
            return array($interests);
        }
    }

    return array();
}

function rijkshuisstijl_get_votes(ElggObject $entity) {
    $result = elgg_get_annotations(array(
        'guid' => $entity->guid,
        'annotation_name' => 'vote',
        'annotation_calculation' => 'sum',
        'limit' => false
    ));

    if ($result) {
        return (int) $result;
    }

    return 0;
}

function rijkshuisstijl_get_news_leader() {
    $leader = elgg_get_entities_from_metadata(array(
        'type' => 'object',
        'subtype' => 'news',
        'metadata_name_value_pairs' => array(
            array(
                'name' => 'featuredPhotoTime',
                'operand' => '!=',
                'value' => 'null'
            )
        ),
        'limit' => 1
    ));

    if (count($leader) == 1) {
        return $leader[0];
    }

    return null;
}

?>