<?php
/**
 * Create a submit input button
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['class'] CSS class that replaces elgg-button-submit
 */

$vars["type"] = "submit";
$vars["class"] = elgg_extract("class", $vars);
$vars["class"] .= " rhs-button rhs-button--primary elgg-button-submit";

?>
<input type="submit" <?php echo elgg_format_attributes($vars); ?>>