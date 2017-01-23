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

function rijkshuisstijl_get_latest_objects($subtype = 'question', ElggGroup $group = null, $limit = 5) {
    $options = array(
        'type' => 'object',
        'subtype' => $subtype,
        'order_by' => 'e.time_created DESC',
        'limit' => $limit
    );

    if ($group) {
        $options['container_guid'] = $group->guid;
    }

    return elgg_get_entities($options);
}

function rijkshuisstijl_get_popular_objects($subtype = 'question', ElggGroup $group = null, $limit = 5) {
    global $CONFIG;

    $id = (int) get_subtype_id("object", $subtype);
    $sql = "SELECT guid FROM elgg_entity_views WHERE type = 'object' AND subtype = {$id} AND site_guid = {$CONFIG->site_guid}";
    if ($group) {
        $container_guid = (int) $group->guid;
        $sql .= " AND container_guid = {$container_guid}";
    }

    $limit = (int) $limit;
    if ($limit > 50) {
        $limit = 50;
    }

    if ($limit < 0) {
        $limit = 1;
    }

    $sql .= " ORDER BY views DESC LIMIT {$limit}";

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
            $top_users[$user] = $annotation->value;
        } else {
            $top_users[$user] += $annotation->value;
        }
    }

    arsort($top_users);
    $top_users = array_slice($top_users, 0, 6, true);

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
        return strftime("%d %b", $unix);
    } else {
        return strftime("%d %B %Y, %H:%M", $unix);
    }
}

function rijkshuisstijl_generate_username($email) {
    list($username, $dummy) = explode("@", $email);
    $username = preg_replace("/[^a-zA-Z0-9]+/", "", $username);

    $hidden = access_get_show_hidden_status();
    access_show_hidden_entities(true);

    if (get_user_by_username($username)) {
        $i = 1;

        while (get_user_by_username($username . $i)) {
            $i++;
        }

        $result = $username . $i;
    } else {
        $result = $username . $i;
    }

    access_show_hidden_entities($hidden);

    return $result;
}

function rijkshuisstijl_get_online_users() {
    global $CONFIG;

    $time = time() - 600;
    $site = elgg_get_site_entity();

    return elgg_get_entities(array(
        "type" => "user",
        "count" => true,
        "joins" => [
                "join {$CONFIG->dbprefix}users_entity u on e.guid = u.guid",
                "join {$CONFIG->dbprefix}entity_relationships r ON e.guid = r.guid_one AND relationship = 'member_of_site'"
        ],
        "wheres" => [
            "u.last_action >= {$time}",
            "r.guid_two = {$site->guid}"
        ]
    ));
}