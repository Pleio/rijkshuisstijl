<?php

/**
 * View for page object
 *
 * @package ElggPages
 *
 * @uses $vars['entity']    The page object
 * @uses $vars['full_view'] Whether to display the full view
 * @uses $vars['revision']  This parameter not supported by elgg_view_entity()
 */


$full = elgg_extract('full_view', $vars, false);
$entity = elgg_extract('entity', $vars, FALSE);
$revision = elgg_extract('revision', $vars, FALSE);

if (!$entity) {
    return TRUE;
}

// pages used to use Public for write access
if ($entity->write_access_id == ACCESS_PUBLIC) {
    // this works because this metadata is public
    $entity->write_access_id = ACCESS_LOGGED_IN;
}

if ($revision) {
    $annotation = $revision;
} else {
    $annotation = $entity->getAnnotations('page', 1, 0, 'desc');
    if ($annotation) {
        $annotation = $annotation[0];
    }
}

$entity_icon = elgg_view('pages/icon', array('annotation' => $annotation, 'size' => 'small'));

$editor = get_entity($annotation->owner_guid);
$editor_link = elgg_view('output/url', array(
    'href' => "pages/owner/$editor->username",
    'text' => $editor->name,
    'is_trusted' => true,
));

$date = rijkshuisstijl_view_friendly_time($annotation->time_created);
$editor_text = elgg_echo('pages:strapline', array($date, $editor_link));
$categories = elgg_view('output/categories', $vars);

// show comments
$comments_link = '';
if($entity->allow_comments != "no"){
    $comments_count = $entity->countComments();
    //only display if there are commments
    if ($comments_count != 0 && !$revision) {
        $text = elgg_echo("comments") . " ($comments_count)";
        $comments_link = elgg_view('output/url', array(
            'href' => $entity->getURL() . '#page-comments',
            'text' => $text,
            'is_trusted' => true,
        ));
    }
}

// group string
$group_string = "";
$container = $entity->getContainerEntity();
if(elgg_instanceof($container, "group") && ($container->getGUID() != elgg_get_page_owner_guid())){
    $group_link = elgg_view("output/url", array(
        "text" => $container->name,
        "href" => $container->getURL(),
        "is_trusted" => true
    ));

    $group_string = elgg_echo("river:ingroup", array($group_link));
}

$metadata = elgg_view_menu('entity', array(
    'entity' => $vars['entity'],
    'handler' => 'pages',
    'sort_by' => 'priority',
    'class' => 'elgg-menu-hz',
));

$subtitle = "$editor_text $group_string $comments_link $categories";

// do not show the metadata and controls in widget view
if (elgg_in_context('widgets') || $revision) {
    $metadata = '';
}

if ($full) {
      echo '<div class="rhs-col-md-10 rhs-col-lg-8 rhs-col-md-offset-1 rhs-col-lg-offset-2">';
      echo '<h1 class="rhs-news-item__title">' . $entity->title . '</h1>';
      echo '<div class="rhs-news-item__meta">';
        echo '<div class="rhs-news-item__meta__date">' . date("d-m-Y", $entity->time_created) . '</div>';
      echo '</div>';
      echo '<div class="rhs-news-item__content rhs-content-editable">';
      echo elgg_view("output/longtext", ["value" => $entity->description]);
      echo '</div>';
      echo '<div class="rhs-news-item__actions">';
        echo '<div class="rhs-content-actions"><a href="javascript:window.print();" title="Afdrukken" class="rhs-button rhs-button--with-icon rhs-content-actions__print"><span class="rhs-icon-print"></span>Afdrukken</a>';
          if (elgg_is_active_plugin('entity_view_counter')) {
            echo '<div class="rhs-content-actions__views"><span class="rhs-icon-eye rhs-content-actions__views__icon"></span>';
            echo entity_view_counter_count_views($entity);
          }
          echo '</div>';
        echo '</div>';
      echo '</div>';
      echo '</div>';
} else {
    echo '<a href="' . $entity->getURL() . '" title="' . $entity->title . '" class="rhs-news-list__item">';
    echo '<span class="rhs-news-list__item__date">' . date("d-m-Y", $entity->time_created) . '</span>';
    echo '<span class="rhs-news-list__item__title">' . $entity->title . '</span>';
    echo '<span class="rhs-news-list__item__category">';

    if ($entity->tags) {
        $tags = $entity->tags;
        if (!is_array($tags)) {
            $tags = [$tags];
        }
        ?>

        <?php if (in_array('juris', $tags)): ?>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 16.7" width="20px" height="16.7px"><path fill="#b4b4b4" d="M0.7,14.9h0.7V14h10v0.9h0.7c0.4,0,0.7,0.4,0.7,0.9c0,0.5-0.3,0.9-0.7,0.9H0.7c-0.4,0-0.7-0.4-0.7-0.9 C0,15.3,0.3,14.9,0.7,14.9"/><path fill="#b4b4b4" d="M8.3,11.6C8,11.9,7.5,12,7.2,11.7L3.7,8.2C3.4,8,3.5,7.5,3.8,7.1C4.2,6.8,4.7,6.7,4.9,7l3.5,3.5 C8.7,10.8,8.6,11.3,8.3,11.6"/><path fill="#b4b4b4" d="M15.1,4.8c-0.3,0.3-0.8,0.4-1.1,0.1l-3.5-3.5c-0.3-0.3-0.2-0.8,0.1-1.1C11,0,11.5-0.1,11.8,0.2l3.5,3.5 C15.5,3.9,15.5,4.4,15.1,4.8"/><path fill="#b4b4b4" d="M10,1.9l3.5,3.5L11.9,7l7.8,7.8c0.2,0.2,0.2,0.4,0.2,0.6c0,0.1,0,0.2-0.1,0.3c-0.1,0.2-0.3,0.4-0.5,0.5c-0.1,0-0.2,0.1-0.3,0.1c-0.2,0-0.4-0.1-0.6-0.2l-7.8-7.8l0,0L8.9,10L5.4,6.5L10,1.9z"/></svg>
        <?php endif; ?>

        <?php if (in_array('blog', $tags)): ?>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 172.9 172.9" width="20px" height="16.7px"><path fill="#b4b4b4" d="M170.1,38.8c3.7-3.7,3.7-9.8,0-13.5L147.6,2.8c-3.7-3.7-9.8-3.7-13.5,0l-17.6,17.6l36,36L170.1,38.8z M0,136.9v36h36L142.2,66.7l-36-36L0,136.9z"/></svg>
        <?php endif; ?>

        <?php if (in_array('handreiking', $tags)): ?>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20px" height="16.7px"><path fill="#b4b4b4" d="M288 248v28c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-28c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm-12 72H108c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h168c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12zm108-188.1V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V48C0 21.5 21.5 0 48 0h204.1C264.8 0 277 5.1 286 14.1L369.9 98c9 8.9 14.1 21.2 14.1 33.9zm-128-80V128h76.1L256 51.9zM336 464V176H232c-13.3 0-24-10.7-24-24V48H48v416h288z"/></svg>
        <?php endif; ?>

        <?php if (in_array('achtergrond', $tags)): ?>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="20px" height="16.7px"><path fill="#b4b4b4" d="M552 64H112c-20.858 0-38.643 13.377-45.248 32H24c-13.255 0-24 10.745-24 24v272c0 30.928 25.072 56 56 56h496c13.255 0 24-10.745 24-24V88c0-13.255-10.745-24-24-24zM48 392V144h16v248c0 4.411-3.589 8-8 8s-8-3.589-8-8zm480 8H111.422c.374-2.614.578-5.283.578-8V112h416v288zM172 280h136c6.627 0 12-5.373 12-12v-96c0-6.627-5.373-12-12-12H172c-6.627 0-12 5.373-12 12v96c0 6.627 5.373 12 12 12zm28-80h80v40h-80v-40zm-40 140v-24c0-6.627 5.373-12 12-12h136c6.627 0 12 5.373 12 12v24c0 6.627-5.373 12-12 12H172c-6.627 0-12-5.373-12-12zm192 0v-24c0-6.627 5.373-12 12-12h104c6.627 0 12 5.373 12 12v24c0 6.627-5.373 12-12 12H364c-6.627 0-12-5.373-12-12zm0-144v-24c0-6.627 5.373-12 12-12h104c6.627 0 12 5.373 12 12v24c0 6.627-5.373 12-12 12H364c-6.627 0-12-5.373-12-12zm0 72v-24c0-6.627 5.373-12 12-12h104c6.627 0 12 5.373 12 12v24c0 6.627-5.373 12-12 12H364c-6.627 0-12-5.373-12-12z"/></svg>
        <?php endif; ?>

        <?php
    }

    if ($container instanceof ElggGroup) {
      echo $container->name;
    }

    echo '</span>';
    echo '</a>';
}
