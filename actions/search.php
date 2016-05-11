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

$hits = array(
    'question' => array(),
    'video' => array(),
    'page' => array()
);

foreach ($results['hits'] as $hit) {
    if (!in_array($hit->getSubtype(), array('question', 'answer', 'video', 'page', 'page_top'))) {
        continue;
    }

    if (!in_array($hit->getSubtype(), array('answer', 'comment'))) {
        $title = $hit->title;
    } else {
        $title = $hit->getContainerEntity()->title;
    }

    $hits[$hit->getSubtype()][] = array(
        'guid' => $hit->guid,
        'title' => $title,
        'time_created' => date('c', $hit->time_created), // ISO-8601
        'url' => $hit->getURL()
    );
}

echo json_encode($hits);