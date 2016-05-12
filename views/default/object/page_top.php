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


$full = elgg_extract('full_view', $vars, FALSE);
$page = elgg_extract('entity', $vars, FALSE);
$revision = elgg_extract('revision', $vars, FALSE);

if (!$page) {
    return TRUE;
}

// pages used to use Public for write access
if ($page->write_access_id == ACCESS_PUBLIC) {
    // this works because this metadata is public
    $page->write_access_id = ACCESS_LOGGED_IN;
}


if ($revision) {
    $annotation = $revision;
} else {
    $annotation = $page->getAnnotations('page', 1, 0, 'desc');
    if ($annotation) {
        $annotation = $annotation[0];
    }
}

$page_icon = elgg_view('pages/icon', array('annotation' => $annotation, 'size' => 'small'));

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
if($page->allow_comments != "no"){
    $comments_count = $page->countComments();
    //only display if there are commments
    if ($comments_count != 0 && !$revision) {
        $text = elgg_echo("comments") . " ($comments_count)";
        $comments_link = elgg_view('output/url', array(
            'href' => $page->getURL() . '#page-comments',
            'text' => $text,
            'is_trusted' => true,
        ));
    }
}

// group string
$group_string = "";
$container = $page->getContainerEntity();
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
      echo '<h1 class="rhs-news-item__title">' . $page->title . '</h1>';
      echo '<div class="rhs-news-item__meta">';
        echo '<div class="rhs-news-item__meta__date">' . date("d-m-Y", $page->time_created) . '</div>';
        //echo '<div class="rhs-news-item__meta__source">Bron:<a href="#" title="Staatscourant">Financieel Dagblad</a></div>';
      echo '</div>';
      echo '<div class="rhs-news-item__content rhs-content-editable">';
      echo $page->description;
      echo '</div>';
      echo '<div class="rhs-news-item__actions">';
        echo '<div class="rhs-content-actions"><a href="javascript:window.print();" title="Afdrukken" class="rhs-button rhs-button--with-icon rhs-content-actions__print"><span class="rhs-icon-print"></span>Afdrukken</a>';
          echo '<div class="rhs-content-actions__views"><span class="rhs-icon-eye rhs-content-actions__views__icon"></span>1260</div>';
        echo '</div>';
      echo '</div>';
} else {
    echo '<a href="' . $page->getURL() . '" title="' . $page->title . '" class="rhs-news-list__item">';
        echo '<span class="rhs-news-list__item__date">' . date("d-m-Y", $page->time_created) . '</span>';
        echo '<span class="rhs-news-list__item__title">' . $page->title . '</span>';
        echo '<span class="rhs-news-list__item__category">';
            if (in_array('juris', $page->tags)) {
                echo '<span class="rhs-icon-jurisprudentie rhs-news-list__item__category__icon"></span>';
            } elseif (in_array('geselecteerd', $page->tags)) {
                echo '<span class="rhs-icon-featured rhs-news-list__item__category__icon"></span>';
            }

            echo $page->getContainerEntity()->name;
        echo '</span>';
    echo '</a>';
}
