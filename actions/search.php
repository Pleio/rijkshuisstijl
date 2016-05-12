<?php

if (!elgg_is_xhr()) {
    register_error('rijkshuisstijl:xhr_only');
}

$q = get_input('q');
$search_type = 'default';

$subtypes = array(
    'question',
    'answer',
    'video',
    'page_top'
);

$return = array();

foreach ($subtypes as $subtype) {
    $results = ESInterface::get()->search(
        $q,
        $search_type,
        'object',
        $subtype,
        5
    );

    $return[$subtype] = array();
    foreach ($results['hits'] as $result) {
        if (!in_array($result->getSubtype(), array('answer', 'comment'))) {
            $title = $result->title;
        } else {
            $title = $result->getContainerEntity()->title;
        }

        $return[$subtype][] = array(
            'guid' => $result->guid,
            'title' => html_entity_decode($title, ENT_QUOTES),
            'time_created' => date('c', $result->time_created), // ISO-8601
            'url' => $result->getURL()
        );
    }
}

echo json_encode($return);