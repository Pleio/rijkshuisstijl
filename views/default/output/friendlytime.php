<?php
/**
 * Friendly time
 * Translates an epoch time into a human-readable time.
 *
 * @uses string $vars['time'] Unix-style epoch timestamp
 */

$timestamp = htmlspecialchars(rijkshuisstijl_view_friendly_time($vars["time"]));
$friendly_time = $timestamp;

echo "<acronym title=\"$timestamp\">$friendly_time</acronym>";
