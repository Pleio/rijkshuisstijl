<?php

if (!elgg_is_xhr()) {
    register_error('rijkshuisstijl:xhr_only');
}

$q = get_input('q');
$search_type = 'default';
$return = array();

if ($q) {
    foreach ($CONFIG->search_types as list($type, $subtype)) {
        $results = ESInterface::get()->search(
            $q,
            $search_type,
            $type,
            $subtype,
            5
        );

        if ($subtype) {
            $typeString = $type . ":" . $subtype;
        } else {
            $typeString = $type;
        }

        $return[$typeString] = array();
        foreach ($results['hits'] as $result) {
            if (!in_array($result->getSubtype(), array('answer', 'comment'))) {
                if ($result->title) {
                    $title = $result->title;
                } else {
                    $title = $result->name;
                }
            } else {
                $title = $result->getContainerEntity()->title;
            }

            $return[$typeString][] = array(
                'guid' => $result->guid,
                'title' => html_entity_decode($title, ENT_QUOTES),
                'time_created' => date('c', $result->time_created), // ISO-8601
                'url' => $result->getURL()
            );
        }
    }
}

echo json_encode($return);

