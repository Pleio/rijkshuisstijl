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
    $id = (int) get_subtype_id("object", $subtype);

    $sql = "SELECT guid FROM elgg_entity_views WHERE type = 'object' AND subtype = {$id}";
    if ($group) {
        $container_guid = (int) $group->guid;
        $sql .= " AND container_guid = {$container_guid}";
    }

    $sql .= " ORDER BY views DESC LIMIT 5";

    $return = array();
    foreach (get_data($sql) as $object) {
        $object = get_entity($object->guid);
        if ($object) {
            $return[] = $object;
        }
    }

    return $return;
}

function rijkshuisstijl_get_popular_users() {
    $options = array(
        'annotation_name' => 'vote',
        'where' => 'n_table.time_created > ' . (time() - 3600*24*24),
        'order_by' => 'n_table.time_created desc',
        'limit' => 500
    );

    $annotations = elgg_get_annotations($options);

    $top_users = array();
    foreach ($annotations as $annotation) {
        $user = $annotation->getEntity()->getOwnerGuid();
        if (!array_key_exists($user, $top_users)) {
            $top_users[$user] = array();
        }

        $top_users[$user][] = $annotation->value/100;
    }

    $max_scores = 0;
    foreach ($top_users as $guid => $scores) {
        if (count($scores) > $max_scores) {
            $max_scores = count($scores);
        }
    }

    // calculate the average score
    $top_users = array_map(function($scores) use ($max_scores, $eps) {
        return ($eps * (array_sum($scores) / count($scores))) * ((1-$eps) * (count($scores) / $max_scores));
    }, $top_users);

    arsort($top_users);

    $top_users = array_slice($top_users, 0, 5, true);

    $users = array();
    foreach ($top_users as $guid => $score) {
        $users[] = get_entity($guid);
    }

    return $users;
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

function rijkshuisstijl_view_friendly_time($unix, $only_date = false) {
    if ($only_date) {
        return date("d M", $unix);
    } else {
        return date("d M Y, H:i", $unix);
    }
}

?>