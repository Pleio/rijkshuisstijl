<?php

if (!elgg_is_xhr()) {
    register_error('rijkshuisstijl:xhr_only');
}

$q = get_input('q');
$search_type = 'default';

$results = ESInterface::get()->search(
    $q,
    $search_type
);

$hits = array();
foreach ($results['hits'] as $hit) {
    $hits[] = array(
        'guid' => $hit->guid,
        'type' => $hit->getType(),
        'subtype' => $hit->getSubtype(),
        'title' => $hit->title,
        'time_created' => $hit->time_created,
        'url' => $hit->getURL()
    );
}
$results['hits'] = $hits;

echo json_encode($results);