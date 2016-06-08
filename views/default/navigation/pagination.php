<?php
/**
 * Elgg pagination
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses int    $vars['offset']     The offset in the list
 * @uses int    $vars['limit']      Number of items per page
 * @uses int    $vars['count']      Number of items in list
 * @uses string $vars['base_url']   Base URL to use in links
 * @uses string $vars['offset_key'] The string to use for offet in the URL
 */

if (elgg_in_context('widget')) {
    // widgets do not show pagination
    return true;
}

$offset = abs((int) elgg_extract('offset', $vars, 0));
// because you can say $vars['limit'] = 0
if (!$limit = (int) elgg_extract('limit', $vars, 10)) {
    $limit = 10;
}

$count = (int) elgg_extract('count', $vars, 0);
$offset_key = elgg_extract('offset_key', $vars, 'offset');
// some views pass an empty string for base_url
if (isset($vars['base_url']) && $vars['base_url']) {
    $base_url = $vars['base_url'];
} else if (isset($vars['baseurl']) && $vars['baseurl']) {
    elgg_deprecated_notice("Use 'base_url' instead of 'baseurl' for the navigation/pagination view", 1.8);
    $base_url = $vars['baseurl'];
} else {
    $base_url = current_page_url();
}

$num_pages = elgg_extract('num_pages', $vars, 10);
$delta = ceil($num_pages / 2);

$total_pages = ceil($count / $limit);
$current_page = ceil($offset / $limit) + 1;

$pages = new stdClass();

$pages->prev = array(
    'text' => '<span class="rhs-icon-angle-left rhs-pagination__icon"></span>',
    'href' => '',
    'is_trusted' => true,
    'class' => 'rhs-pagination__previous'
);

$pages->next = array(
    'text' => '<span class="rhs-icon-angle-right rhs-pagination__icon"></span>',
    'href' => '',
    'is_trusted' => true,
    'class' => 'rhs-pagination__next'
);

$pages->items = array();

// Add pages before the current page
if ($current_page > 1) {
    $prev_offset = $offset - $limit;
    if ($prev_offset < 0) {
        $prev_offset = 0;
    }

    $pages->prev['href'] = elgg_http_add_url_query_elements($base_url, array($offset_key => $prev_offset));

    $first_page = $current_page - $delta;
    if ($first_page < 1) {
        $first_page = 1;
    }

    $pages->items = range($first_page, $current_page - 1);
}


$pages->items[] = $current_page;


// add pages after the current one
if ($current_page < $total_pages) {
    $next_offset = $offset + $limit;
    if ($next_offset >= $count) {
        $next_offset--;
    }

    $pages->next['href'] = elgg_http_add_url_query_elements($base_url, array($offset_key => $next_offset));

    $last_page = $current_page + $delta;
    if ($last_page > $total_pages) {
        $last_page = $total_pages;
    }

    $pages->items = array_merge($pages->items, range($current_page + 1, $last_page));
}

echo '<div class="rhs-section rhs-section--item rhs-section--float-right">';
echo '<div class="rhs-pagination">';
    if ($pages->prev['href']) {
        echo elgg_view('output/url', $pages->prev);
    } else {
        echo elgg_view('output/url', array_merge($pages->prev, array(
            'class' => 'rhs-pagination__previous disabled'
        )));
    }

    echo '<form action="#" class="rhs-pagination__form">';
        echo '<input name="page-number" id="page-number" value="' . $current_page . '" class="rhs-pagination__input"><span class="rhs-pagination__maximum">' . elgg_echo('rijkshuisstijl:of') . ' ' . $total_pages . '</span>';
    echo '</form>';

    if ($pages->next['href']) {
        echo elgg_view('output/url', $pages->next);
    } else {
        echo elgg_view('output/url', array_merge($pages->next, array(
            'class' => 'rhs-pagination__next disabled'
        )));
    }
echo '</div>';
echo '</div>';