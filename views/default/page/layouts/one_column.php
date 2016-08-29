<?php
/**
 * Elgg one-column layout
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['content'] Content string
 * @uses $vars['class']   Additional class to apply to layout
 */

if (isset($vars['class'])) {
    $class = $vars['class'];
} else {
    $class = "rhs-sections rhs-sections--top-padding";
}

// navigation defaults to breadcrumbs
$nav = elgg_extract('nav', $vars, elgg_view('navigation/breadcrumbs'));
$small_width = elgg_extract('small_width', $vars);
?>

<div class="<?php echo $class; ?>">
    <div class="rhs-container">
        <?php if ($small_width): ?>
            <div class="rhs-row">
            <div class="rhs-col-md-offset-1 rhs-col-md-10 rhs-col-lg-offset-2 rhs-col-lg-8">
        <?php endif; ?>

        <?php
        echo $nav;

        if (isset($vars['title'])) {
            echo elgg_view_title($vars['title']);
        }

        echo $vars['content'];

        // @deprecated 1.8
        if (isset($vars['area1'])) {
            echo $vars['area1'];
        }
        ?>

        <?php if ($small_width): ?>
            </div>
            </div>
        <?php endif; ?>
    </div>
</div>