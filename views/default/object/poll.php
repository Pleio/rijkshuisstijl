<?php

/**
 * Elgg poll individual post view
 *
 * @uses $vars['entity'] Optionally, the poll post to view
 */

if (isset($vars['entity'])) {
    $full = $vars['full_view'];
    $poll = $vars['entity'];

    $owner = $poll->getOwnerEntity();
    $container = $poll->getContainerEntity();
    $categories = elgg_view('output/categories', $vars);

    $owner_icon = elgg_view_entity_icon($owner, 'tiny');
    $owner_link = elgg_view('output/url', array(
                'href' => "polls/owner/$owner->username",
                'text' => $owner->name,
                'is_trusted' => true,
    ));
    $author_text = elgg_echo('byline', array($owner_link));
    $tags = elgg_view('output/tags', array('tags' => $poll->tags));
    $date = elgg_view_friendly_time($poll->time_created);

    // do not show the metadata and controls in widget view
    $metadata = '';
    if (!elgg_in_context('widgets')) {
        $metadata = elgg_view_menu('entity', array(
            'entity' => $poll,
            'handler' => 'polls',
            'sort_by' => 'priority',
            'class' => 'elgg-menu-hz',
        ));
    }

    $subtitle = "$author_text $date $categories";
    if ($full) {

        $params = array(
            'entity' => $poll,
            'title' => false,
            'metadata' => $metadata,
            'subtitle' => $subtitle,
            'tags' => $tags,
        );
        $params = $params + $vars;
        $summary = elgg_view('object/elements/summary', $params);

        echo elgg_view('object/elements/full', array(
            'summary' => $summary,
            'icon' => $owner_icon
        ));

    } else {
        // brief view

        $params = array(
            'entity' => $poll,
            'metadata' => $metadata,
            'subtitle' => $subtitle,
            'tags' => $tags
        );
        $params = $params + $vars;
        $list_body = elgg_view('object/elements/summary', $params);
    
        echo elgg_view_image_block($owner_icon, $list_body);
    }
}
