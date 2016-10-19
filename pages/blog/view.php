<?php

$blog_guid = get_input('guid');
$blog = get_entity($blog_guid);
if (!$blog) {
    register_error(elgg_echo('noaccess'));
    $_SESSION['last_forward_from'] = current_page_url();
    forward('');
}

elgg_set_page_owner_guid($blog->getContainerGUID());

group_gatekeeper();

$container = elgg_get_page_owner_entity();
if (!$container) {
}

$title = $blog->title;

if (elgg_instanceof($container, 'group')) {
    elgg_push_breadcrumb($container->name, "pages/group/$container->guid/all");
} else {
    elgg_push_breadcrumb($container->name, "pages/owner/$container->username");
}

elgg_push_breadcrumb($title);

$body = elgg_view("rijkshuisstijl/elements/item", array(
    'type' => 'blog',
    'content' => elgg_view_entity($blog, array(
        'full_view' => true
    )
)));

echo elgg_view_page($title, $body);
