<?php
/**
 * Perform migration of old correct question answer labels to new ones
 *
 * @package Questions
 */

set_time_limit(0);

if (php_sapi_name() !== 'cli') {
  throw new Exception('This script must be run from the CLI.');
}

// Configure with "main site". Needed so subsite_manager can identify our instance.

// Production
/*
$_SERVER["HTTP_HOST"] = "ffd.pleio.nl";
$_SERVER["HTTPS"] = true;
*/

// Test
$_SERVER["HTTP_HOST"] = "ffd.pleio.dev";
$_SERVER["HTTPS"] = false;

require_once(dirname(dirname(dirname(__FILE__))) . "/../engine/start.php");
$ia = elgg_set_ignore_access(true);

$news = new ElggBatch('elgg_get_entities', array(
  'type' => 'object',
  'subtype' => 'news',
  'limit' => false
));

$guids = array();
foreach ($news as $item) {
    $guids[] = $item->guid;
}

foreach ($guids as $guid) {
    $item = get_entity($guid);
    $item->delete();
}
