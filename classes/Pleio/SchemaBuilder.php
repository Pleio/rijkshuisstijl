<?php
namespace Pleio;

use GraphQL\Type\Definition\EnumType;
use GraphQL\Type\Definition\InterfaceType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Schema;
use GraphQLRelay\Relay;

class SchemaBuilder {
    static function build() {
        $typeEnum = new EnumType([
            "name" => "Type",
            "description" => "The type of entity",
            "values" => [
                "user" => [
                    "value" => "user"
                ],
                "group" => [
                    "value" => "group"
                ],
                "object" => [
                    "value" => "object"
                ]
            ]
        ]);

        $statusEnum = new EnumType([
            "name" => "Status",
            "description" => "The status of the entity",
            "values" => [
                "ok" => [
                    "value" => "ok"
                ],
                "access_denied" => [
                    "value" => "access_denied"
                ],
                "not_found" => [
                    "value" => "not_found"
                ]
            ]
        ]);

        $voteDirectionEnum = new EnumType([
            "name" => "VoteType",
            "description" => "The type of vote",
            "values" => [
                "up" => [
                    "value" => "up"
                ],
                "down" => [
                    "value" => "down"
                ]
            ]
        ]);

        $entityInterface = new InterfaceType([
            "name" => "Entity",
            "fields" => [
                "guid" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "status" => [
                    "type" => Type::nonNull($statusEnum)
                ]
            ],
            "resolveType" => function($object) use (&$userType, &$objectType, &$groupType) {
                switch ($object["type"]) {
                    case "user":
                        return $userType;
                    case "object":
                        return $objectType;
                    case "group":
                        return $groupType;
                }
            }
        ]);

        $accessIdType = new ObjectType([
            "name" => "AccessId",
            "fields" => [
                "id" => [
                    "type" => Type::nonNull(Type::int())
                ],
                "description" => [
                    "type" => Type::nonNull(Type::string())
                ]
            ]
        ]);

        $userType = new ObjectType([
            "name" => "User",
            "interfaces" => [$entityInterface],
            "fields" => [
                "guid" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "status" => [
                    "type" => Type::nonNull($statusEnum)
                ],
                "name" => [
                    "type" => Type::string()
                ],
                "icon" => [
                    "type" => Type::string()
                ],
                "url" => [
                    "type" => Type::string()
                ]
            ]
        ]);

        $groupType = new ObjectType([
            "name" => "Group",
            "interfaces" => [$entityInterface],
            "fields" => [
                "guid" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "status" => [
                    "type" => Type::nonNull($statusEnum)
                ],
                "name" => [
                    "type" => Type::string()
                ],
                "icon" => [
                    "type" => Type::string()
                ],
                "canEdit" => [
                    "type" => Type::boolean()
                ],
                "isClosed" => [
                    "type" => Type::boolean()
                ],
                "canJoin" => [
                    "type" => Type::boolean()
                ],
                "defaultAccessId" => [
                    "type" => Type::int()
                ]
            ]
        ]);

        $objectType = new ObjectType([
            "name" => "Object",
            "interfaces" => [$entityInterface],
            "fields" => [
                "guid" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "status" => [
                    "type" => Type::nonNull($statusEnum)
                ],
                "title" => [
                    "type" => Type::string()
                ],
                "subtype" => [
                    "type" => Type::string()
                ],
                "description" => [
                    "type" => Type::string()
                ],
                "url" => [
                    "type" => Type::string()
                ],
                "tags" => [
                    "type" => Type::listOf(Type::string())
                ],
                "timeCreated" => [
                    "type" => Type::string()
                ],
                "timeUpdated" => [
                    "type" => Type::string()
                ],
                "canEdit" => [
                    "type" => Type::boolean()
                ],
                "canComment" => [
                    "type" => Type::boolean()
                ],
                "accessId" => [
                    "type" => Type::int()
                ],
                "isBookmarked" => [
                    "type" => Type::boolean(),
                    "resolve" => function($object) {
                        return Resolver::isBookmarked($object);
                    }
                ],
                "votes" => [
                    "type" => Type::int(),
                    "resolve" => function($object) {
                        return Resolver::countVotes($object);
                    }
                ],
                "owner" => [
                    "type" => $userType,
                    "resolve" => function($object) {
                        return Resolver::getUser($object["ownerGuid"]);
                    }
                ],
                "comments" => [
                    "type" => function() use (&$objectType) {
                        return Type::listOf($objectType);
                    },
                    "resolve" => function($object) {
                        return Resolver::getComments($object);
                    }
                ]
            ]
        ]);

        $searchListType = new ObjectType([
            "name" => "Search",
            "fields" => [
                "total" => [
                    "type" => Type::nonNull(Type::int())
                ],
                "results" => [
                    "type" => Type::listOf($entityInterface)
                ]
            ]
        ]);

        $entityListType = new ObjectType([
            "name" => "EntityList",
            "fields" => [
                "total" => [
                    "type" => Type::nonNull(Type::int())
                ],
                "canWrite" => [
                    "type" => Type::nonNull(Type::boolean())
                ],
                "entities" => [
                    "type" => Type::listOf($entityInterface)
                ]
            ]
        ]);

        $viewerType = new ObjectType([
            "name" => "Viewer",
            "description" => "The current site viewer",
            "fields" => [
                "guid" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "loggedIn" => [
                    "type" => Type::nonNull(Type::boolean())
                ],
                "username" => [
                    "type" => Type::string()
                ],
                "name" => [
                    "type" => Type::string()
                ],
                "icon" => [
                    "type" => Type::string()
                ],
                "url" => [
                    "type" => Type::string()
                ],
                "bookmarks" => [
                    "type" => $entityListType,
                    "args" => [
                        "offset" => [
                            "type" => Type::int()
                        ],
                        "limit" => [
                            "type" => Type::int()
                        ],
                    ],
                    "resolve" => "Pleio\Resolver::getBookmarks"
                ]
            ]
        ]);

        $menuItemType = new ObjectType([
            "name" => "MenuItem",
            "fields" => [
                "guid" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "title" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "link" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "js" => [
                    "type" => Type::nonNull(Type::boolean())
                ]
            ]
        ]);

        $siteType = new ObjectType([
            "name" => "Site",
            "description" => "The current site",
            "fields" => [
                "id" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "title" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "menu" => [
                    "type" => Type::listOf($menuItemType)
                ],
                "accessIds" => [
                    "type" => Type::listOf($accessIdType)
                ],
                "defaultAccessId" => [
                    "type" => Type::nonNull(Type::int())
                ]
            ]
        ]);

        $queryType = new ObjectType([
            "name" => "Query",
            "fields" => [
                "viewer" => [
                    "type" => $viewerType,
                    "resolve" => "Pleio\Resolver::getViewer"
                ],
                "entity" => [
                    "type" => $entityInterface,
                    "args" => [
                        "guid" => [
                            "type" => Type::nonNull(Type::string())
                        ]
                    ],
                    "resolve" => "Pleio\Resolver::getEntity"
                ],
                "search" => [
                    "type" => $searchListType,
                    "args" => [
                        "q" => [
                            "type" => Type::nonNull(Type::string()),
                        ],
                        "offset" => [
                            "type" => Type::int()
                        ],
                        "limit" => [
                            "type" => Type::int()
                        ]
                    ],
                    "resolve" => "Pleio\Resolver::search"
                ],
                "tagsAutocomplete" => [
                    "type" => Type::listOf(Type::string()),
                    "args" => [
                        "q" => [
                            "type" => Type::nonNull(Type::string())
                        ]
                    ],
                    "resolve" => "Pleio\Resolver::tagsAutocomplete"
                ],
                "entities" => [
                    "type" => $entityListType,
                    "args" => [
                        "offset" => [
                            "type" => Type::int()
                        ],
                        "limit" => [
                            "type" => Type::int()
                        ],
                        "type" => [
                            "type" => $typeEnum
                        ],
                        "subtype" => [
                            "type" => Type::string()
                        ],
                        "containerGuid" => [
                            "type" => Type::int()
                        ],
                        "tags" => [
                            "type" => Type::listOf(Type::string())
                        ]
                    ],
                    "resolve" => "Pleio\Resolver::getEntities"
                ],
                "site" => [
                    "type" => $siteType,
                    "resolve" => "Pleio\Resolver::getSite"
                ]
            ]
        ]);

        $loginMutation = Relay::mutationWithClientMutationId([
            "name" => "login",
            "inputFields" => [
                "username" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "password" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "rememberMe" => [
                    "type" => Type::boolean()
                ]
            ],
            "outputFields" => [
                "viewer" => [
                    "type" => $viewerType,
                    "resolve" => "Pleio\Resolver::getViewer"
                ]
            ],
            "mutateAndGetPayload" => "Pleio\Mutations::login"
        ]);

        $logoutMutation = Relay::mutationWithClientMutationId([
            "name" => "logout",
            "inputFields" => [],
            "outputFields" => [
                "viewer" => [
                    "type" => $viewerType,
                    "resolve" => "Pleio\Resolver::getViewer"
                ]
            ],
            "mutateAndGetPayload" => "Pleio\Mutations::logout"
        ]);

        $registerMutation = Relay::mutationWithClientMutationId([
            "name" => "register",
            "inputFields" => [
                "name" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "email" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "password" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "newsletter" => [
                    "type" => Type::boolean()
                ],
                "terms" => [
                    "type" => Type::boolean()
                ]
            ],
            "outputFields" => [
                "viewer" => [
                    "type" => $viewerType,
                    "resolve" => "Pleio\Resolver::getViewer"
                ]
            ],
            "mutateAndGetPayload" => "Pleio\Mutations::register"
        ]);

        $forgotPasswordMutation = Relay::mutationWithClientMutationId([
            "name" => "forgotPassword",
            "inputFields" => [
                "username" => [
                    "type" => Type::nonNull(Type::string())
                ],
            ],
            "outputFields" => [
                "status" => [
                    "type" => Type::nonNull($statusEnum),
                    "resolve" => function($return) {
                        return $return["status"];
                    }
                ]
            ],
            "mutateAndGetPayload" => "Pleio\Mutations::forgotPassword"
        ]);

        $forgotPasswordConfirmMutation = Relay::mutationWithClientMutationId([
            "name" => "forgotPasswordConfirm",
            "inputFields" => [
                "userGuid" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "code" => [
                    "type" => Type::nonNull(Type::string())
                ]
            ],
            "outputFields" => [
                "status" => [
                    "type" => Type::nonNull($statusEnum),
                    "resolve" => function($return) {
                        return $return["status"];
                    }
                ]
            ],
            "mutateAndGetPayload" => "Pleio\Mutations::forgotPasswordConfirm"
        ]);

        $subscribeNewsletterMutation = Relay::mutationWithClientMutationId([
            "name" => "subscribeNewsletter",
            "inputFields" => [
                "email" => [
                    "type" => Type::nonNull(Type::string())
                ]
            ],
            "outputFields" => [
                "viewer" => [
                    "type" => $viewerType,
                    "resolve" => "Pleio\Resolver::getViewer"
                ]
            ],
            "mutateAndGetPayload" => "Pleio\Mutations::subscribeNewsletter"
        ]);

        $addEntityMutation = Relay::mutationWithClientMutationId([
            "name" => "addEntity",
            "inputFields" => [
                "type" => [
                    "type" => Type::nonNull($typeEnum)
                ],
                "subtype" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "title" => [
                    "type" => Type::string()
                ],
                "description" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "containerGuid" => [
                    "type" => Type::int()
                ],
                "accessId" => [
                    "type" => Type::int()
                ],
                "tags" => [
                    "type" => Type::listOf(Type::string())
                ]
            ],
            "outputFields" => [
                "entity" => [
                    "type" => $entityInterface,
                    "resolve" => function($entity) {
                        return Resolver::getEntity(null, $entity, null);
                    }
                ]
            ],
            "mutateAndGetPayload" => "Pleio\Mutations::addEntity"
        ]);

        $editEntityMutation = Relay::mutationWithClientMutationId([
            "name" => "editEntity",
            "inputFields" => [
                "guid" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "title" => [
                    "type" => Type::string()
                ],
                "description" => [
                    "type" => Type::nonNull(Type::string())
                ],
                "accessId" => [
                    "type" => Type::int()
                ],
                "tags" => [
                    "type" => Type::listOf(Type::string())
                ]
            ],
            "outputFields" => [
                "entity" => [
                    "type" => $entityInterface,
                    "resolve" => function($entity) {
                        return Resolver::getEntity(null, $entity, null);
                    }
                ]
            ],
            "mutateAndGetPayload" => "Pleio\Mutations::editEntity"
        ]);

        $deleteEntityMutation = Relay::mutationWithClientMutationId([
            "name" => "deleteEntity",
            "inputFields" => [
                "guid" => [
                    "type" => Type::nonNull(Type::string())
                ]
            ],
            "outputFields" => [
                "entity" => [
                    "type" => $entityInterface,
                    "resolve" => function($entity) {
                        return Resolver::getEntity(null, $entity, null);
                    }
                ]
            ],
            "mutateAndGetPayload" => "Pleio\Mutations::deleteEntity"
        ]);

        $bookmarkMutation = Relay::mutationWithClientMutationId([
            "name" => "bookmark",
            "inputFields" => [
                "guid" => [
                    "type" => Type::nonNull((Type::string())),
                    "description" => "The guid of the entity to bookmark."
                ],
                "isAdding" => [
                    "type" => Type::nonNull(Type::boolean()),
                    "description" => "True when adding, false when removing."
                ]
            ],
            "outputFields" => [
                "object" => [
                    "type" => Type::nonNull($objectType),
                    "resolve" => function($entity) {
                        return Resolver::getEntity(null, $entity, null);
                    }
                ]
            ],
            "mutateAndGetPayload" => "Pleio\Mutations::bookmark"
        ]);

        $voteMutation = Relay::mutationWithClientMutationId([
            "name" => "vote",
            "inputFields" => [
                "guid" => [
                    "type" => Type::nonNull((Type::string())),
                    "description" => "The guid of the entity to bookmark."
                ],
                "direction" => [
                    "type" => Type::nonNull($voteDirectionEnum)
                ]
            ],
            "outputFields" => [
                "object" => [
                    "type" => Type::nonNull($objectType),
                    "resolve" => function($entity) {
                        return Resolver::getEntity(null, $entity, null);
                    }
                ]
            ],
            "mutateAndGetPayload" => "Pleio\Mutations::vote"
        ]);

        $mutationType = new ObjectType([
            "name" => "Mutation",
            "fields" => [
                    "login" => $loginMutation,
                    "logout" => $logoutMutation,
                    "register" => $registerMutation,
                    "forgotPassword" => $forgotPasswordMutation,
                    "forgotPasswordConfirm" => $forgotPasswordConfirmMutation,
                    "addEntity" => $addEntityMutation,
                    "editEntity" => $editEntityMutation,
                    "deleteEntity" => $deleteEntityMutation,
                    "subscribeNewsletter" => $subscribeNewsletterMutation,
                    "bookmark" => $bookmarkMutation,
                    "vote" => $voteMutation
            ]
        ]);

        $schema = new Schema($queryType, $mutationType);
        return $schema;
   }
}