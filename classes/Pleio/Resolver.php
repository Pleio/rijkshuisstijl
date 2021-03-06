<?php
namespace Pleio;

class Resolver {
    static function getSite($a, $args, $c) {
        $site = elgg_get_site_entity();

        $accessIds = [];
        foreach (get_write_access_array() as $id => $description) {
            $accessIds[] = [
                "id" => $id,
                "description" => $description
            ];
        }

        return [
            "guid" => $site->guid,
            "title" => $site->title,
            "menu" => [
                ["guid" => "menu:" . 1, "title" => "Blog", "link" => "/blog", "js" => true],
                ["guid" => "menu:" . 2, "title" => "Nieuws", "link" => "/news", "js" => true],
                ["guid" => "menu:" . 3, "title" => "Forum", "link" => "/forum", "js" => true]
            ],
            "accessIds" => $accessIds,
            "defaultAccessId" => get_default_access()
        ];
    }

    static function getEntity($a, $args, $c) {
        $guid = (int) $args["guid"];
        $entity = get_entity($guid);

        if (!$entity) {
            return [
                "guid" => $guid,
                "type" => "object",
                "status" => "not_found"
            ];
        }

        return [
            "guid" => $guid,
            "status" => "ok",
            "type" => $entity->type,
            "subtype" => $entity->getSubtype(),
            "title" => $entity->title,
            "description" => elgg_autop(filter_tags($entity->description)),
            "timeCreated" => date("c", $entity->time_created),
            "timeUpdated" => date("c", $entity->time_updated),
            "canComment" => $entity->canWriteToContainer(0, "object", "comment"),
            "canEdit" => $entity->canEdit(),
            "accessId" => $entity->access_id,
            "tags" => Helpers::renderTags($entity->tags)
        ];
    }

    static function getComments($object) {
        switch ($object["subtype"]) {
            case "question":
                $subtype = "answer";
                break;
            default:
                $subtype = "comment";
                break;
        }

        $options = array(
            "type" => "object",
            "subtype" => $subtype,
            "container_guid" => (int) $object['guid'],
            "limit" => 100
        );

        $entities = elgg_get_entities($options);
        if (!$entities) {
            return [];
        }

        $comments = [];
        foreach ($entities as $entity) {
            $comments[] = [
                "guid" => $entity->guid,
                "ownerGuid" => $entity->owner_guid,
                "canEdit" => $entity->canEdit(),
                "description" => elgg_autop(filter_tags($entity->description)),
                "timeCreated" => date("c", $entity->time_created),
                "timeUpdated" => date("c", $entity->time_updated)
            ];
        }

        return $comments;
    }

    static function getUser($guid) {
        $user = get_entity($guid);
        if (!$user) {
            return [
                "guid" => 0,
                "name" => "Unknown user"
            ];
        }

        return [
            "guid" => $user->guid,
            "name" => $user->name,
            "icon" => $user->getIconURL(),
            "url" => $user->getURL()
        ];
    }

    static function getGroups($a, $args, $c) {
        $options = array(
            "type" => "group",
            "limit" => (int) $args["limit"],
            "offset" => (int) $args["offset"]
        );

        $total = elgg_get_entities(array_merge($options, array(
            "count" => true
        )));

        $entities = [];
        foreach (elgg_get_entities($options) as $entity) {
            $entities[] = [
                "guid" => $entity->guid,
                "name" => $entity->name,
                "timeCreated" => date("c", $entity->time_created),
                "timeUpdated" => date("c", $entity->time_updated),
                "tags" => Helpers::renderTags($entity->tags)
            ];
        }

        return [
            "total" => $total,
            "canWrite" => $site->canWriteToContainer(0, "group"),
            "entities" => $entities
        ];
    }

    static function getEntities($a, $args, $c) {
        $subtype = $args["subtype"];
        $tags = $args["tags"];

        if (!in_array($subtype, array("news"))) {
            $subtype = "news";
        }

        $options = array(
            "type" => "object",
            "subtype" => $subtype,
            "limit" => (int) $args["limit"],
            "offset" => (int) $args["offset"],
            "order_by" => "e.guid DESC"
        );

        // @todo: Elgg will generate a query that will definately not scale for large amounts of items.
        // Think we will need a seperate table to speed up tag matching
        if ($tags) {
            $options["metadata_name_value_pairs"] = [];
            foreach ($tags as $tag) {
                $options["metadata_name_value_pairs"][] = [
                    "name" => "tags",
                    "value" => $tag
                ];
            }
        }

        $total = elgg_get_entities_from_metadata(array_merge($options, array(
            "count" => true
        )));

        $entities = array();
        foreach (elgg_get_entities_from_metadata($options) as $entity) {
            $entities[] = array(
                "guid" => $entity->guid,
                "status" => "ok",
                "ownerGuid" => $entity->owner_guid,
                "title" => $entity->title,
                "type" => $entity->type,
                "description" => elgg_autop(filter_tags($entity->description)),
                "timeCreated" => date("c", $entity->time_created),
                "timeUpdated" => date("c", $entity->time_updated),
                "tags" => Helpers::renderTags($entity->tags)
            );
        }

        $site = elgg_get_site_entity();

        return [
            "total" => $total,
            "canWrite" => $site->canWriteToContainer(0, "object", $subtype),
            "entities" => $entities
        ];
    }

    static function isBookmarked($object) {
        if (!elgg_is_logged_in()) {
            return false;
        }

        $user = elgg_get_logged_in_user_entity();
        if (check_entity_relationship($user->guid, "bookmarked", $object['guid'])) {
            return true;
        }

        return false;
    }

    static function countVotes($object) {
        $result = elgg_get_annotations(array(
            'guid' => $object['guid'],
            'annotation_name' => 'vote',
            'annotation_calculation' => 'sum',
            'limit' => false
        ));

        if ($result) {
            return (int) $result;
        }

        return 0;
    }

    static function search($a, $args, $c) {
        $searchResult = \ESInterface::get()->search($args['q']);

        $results = array();
        foreach ($searchResult['hits'] as $hit) {
            $results[] = array(
                "guid" => $hit->guid,
                "title" => $hit->title ? $hit->title : $hit->name,
                "url" => $hit->getURL()
            );
        }

        return [
            "total" => $searchResult['count'],
            "results" => $results
        ];
    }

    static function getViewer() {
        $entity = elgg_get_logged_in_user_entity();

        return [
            "guid" => 0,
            "loggedIn" => elgg_is_logged_in(),
            "username" => $entity ? $entity->username : "",
            "name" => $entity ? $entity->name : "",
            "icon" => $entity ? $entity->getIconURL() : "",
            "url" => $entity ? $entity->getURL() : ""
        ];
    }

    static function getBookmarks($a, $args, $c) {
        $user = elgg_get_logged_in_user_entity();

        if ($user) {
            $options = [
                "relationship_guid" => $user->guid,
                "relationship" => "bookmarked",
                "offset" => (int) $args["offset"],
                "limit" => (int) $args["limit"]
            ];

            $total = elgg_get_entities_from_relationship(array_merge($options, ["count" => true]));
            foreach (elgg_get_entities_from_relationship($options) as $entity) {
                $entities[] = [
                    "guid" => $entity->guid,
                    "ownerGuid" => $entity->owner_guid,
                    "title" => $entity->title,
                    "type" => $entity->type,
                    "description" => elgg_autop(filter_tags($entity->description)),
                    "timeCreated" => date("c", $entity->time_created),
                    "timeUpdated" => date("c", $entity->time_updated),
                    "tags" => Helpers::renderTags($entity->tags)
                ];
            }
        } else {
            $total = 0;
            $entities = [];
        }

        return [
            "total" => $total,
            "entities" => $entities
        ];
    }

    static function tagsAutocomplete($a, $args, $c) {
        $q = sanitize_string($args["q"]);
        if (!$q) {
            return [];
        }
        
        $tags = string_to_tag_array(elgg_get_plugin_setting("tags", "rijkshuisstijl"));

        $result = preg_grep('~' . $q . '~', $tags);
        $result = array_slice($result, 0, 5);

        return $result;
    }
}