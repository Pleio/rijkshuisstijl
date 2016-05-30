<?php
/**
 * Displays breadcrumbs.
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['breadcrumbs'] (Optional) Array of arrays with keys 'title' and 'link'
 * @uses $vars['class']
 *
 * @see elgg_push_breadcrumb
 */

echo "<div class=\"rhs-col-md-offset-1 rhs-col-md-10 rhs-col-lg-offset-2 rhs-col-lg-8\">";
echo "<div class=\"rhs-breadcrumbs\">";

if (isset($vars['breadcrumbs'])) {
    $breadcrumbs = $vars['breadcrumbs'];
} else {
    $breadcrumbs = elgg_get_breadcrumbs();
}

$class = 'elgg-menu elgg-breadcrumbs';
$additional_class = elgg_extract('class', $vars, '');
if ($additional_class) {
    $class = "$class $additional_class";
}

if (is_array($breadcrumbs) && count($breadcrumbs) > 0) {
    foreach ($breadcrumbs as $breadcrumb) {
        if (!empty($breadcrumb['link'])) {
            $crumb = elgg_view('output/url', array(
                'href' => $breadcrumb['link'],
                'text' => $breadcrumb['title'],
                'is_trusted' => true,
            ));

            echo $crumb;
        }
    }
}

echo "</div>";
echo "</div>";