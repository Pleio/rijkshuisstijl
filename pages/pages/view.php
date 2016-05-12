<?php

$page_guid = get_input('guid');
$page = get_entity($page_guid);
if (!$page) {
    register_error(elgg_echo('noaccess'));
    $_SESSION['last_forward_from'] = current_page_url();
    forward('');
}

elgg_set_page_owner_guid($page->getContainerGUID());

group_gatekeeper();

$container = elgg_get_page_owner_entity();
if (!$container) {
}

$title = $page->title;

if (elgg_instanceof($container, 'group')) {
    elgg_push_breadcrumb($container->name, "pages/group/$container->guid/all");
} else {
    elgg_push_breadcrumb($container->name, "pages/owner/$container->username");
}

elgg_push_breadcrumb($title);

$body = elgg_view("rijkshuisstijl/elements/item", array(
    'type' => 'news',
    'content' => elgg_view_entity($page, array(
        'full_view' => true
    )
)));

echo elgg_view_page($title, $body);
