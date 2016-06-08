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

function process_page(ElggObject $page) {
  $tags_to_groups = array(
    'ib' => 10113262,
    'inkomstenbelasting' => 10113262,
    'ob' => 12967492,
    'btw' => 12967492,
    'omzetbelasting' => 12967492,
    'lh' => 10112672,
    'loonheffingen' => 10112672,
    'open forum' => 7746192,
    'toeslagen' => 7746232,
    'Toeslagen' => 7746232,
    'vennootschapsbelasting' => 7746292
  );

  $container_guid = false;

  if (!$page->tags) {
    return;
  }

  if (!is_array($page->tags)) {
    $tags = array($page->tags);
  } else {
    $tags = $page->tags;
  }

  foreach ($tags_to_groups as $tag => $group_guid) {
    if (in_array($tag, $tags)) {
      $container_guid = $group_guid;
      continue;
    }
  }

  $news = new ElggObject();
  $news->subtype = "news";
  $news->title = $page->title;
  $news->description = $page->description;
  $news->tags = $page->tags;
  $news->owner_guid = $page->owner_guid;
  $news->container_guid = $container_guid;
  $news->save();

  $news->time_created = $page->time_created;
  $news->time_updated = $page->time_updated;
  $news->save();
}

$bookmarks = new ElggBatch('elgg_get_entities_from_metadata', array(
  'type' => 'object',
  'subtype' => 'bookmarks',
  'metadata_name_value_pairs' => array(
    array(
      'name' => 'tags',
      'value' => 'redactie',
    )
  ),
  'limit' => false
));

foreach ($bookmarks as $bookmark) {
  preg_match("/(?:.*)\/pages\/view\/([0-9]*)\/(?:.*)/", $bookmark->address, $address);
  if (count($address) === 0) {
    continue;
  }

  $page = get_entity($address[1]);
  if ($page) {
    process_page($page);
  }
}

$pages = new ElggBatch('elgg_get_entities_from_metadata', array(
  'type' => 'object',
  'subtype' => 'page_top',
  'metadata_name_value_pairs' => array(
    array(
      'name' => 'tags',
      'value' => 'juris',
    )
  ),
  'limit' => false
));

foreach ($pages as $page) {
  process_page($page);
}

elgg_set_ignore_access($ia);