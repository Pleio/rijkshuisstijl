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

$views = get_data("SELECT * FROM elgg_private_settings WHERE name='view_counter'");
foreach ($views as $view) {
    $entity = get_entity($view->entity_guid);
    if (!$entity) {
        continue;
    }

    insert_data("
        INSERT INTO elgg_entity_views (guid, type, subtype, container_guid, views)
        VALUES ({$entity->guid}, '{$entity->type}', {$entity->subtype}, {$entity->container_guid}, {$view->value})
        ON DUPLICATE KEY UPDATE views = views + {$view->value}"
    );
}