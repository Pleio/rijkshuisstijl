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

$date = elgg_view_friendly_time($annotation->time_created);
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
      echo $entity->description;
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

    if ((is_array($entity->tags) && in_array('juris', $entity->tags)) || $entity->tags == "juris") {
      echo '<span class="rhs-icon-jurisprudentie rhs-news-list__item__category__icon"></span>';
    }

    if ($entity->headertime) {
        echo '<span class="rhs-icon-featured rhs-news-list__item__category__icon"></span>';
    }

    echo $entity->getContainerEntity()->name;

    echo '</span>';
    echo '</a>';
}
