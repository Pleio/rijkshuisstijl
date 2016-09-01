<?php
$site = elgg_get_site_entity();

if (!elgg_is_admin_logged_in()) {
    register_error(elgg_echo("noaccess"));
    forward("");
}

$banner = array(
    "show" => get_input("show"),
    "title" => get_input("title"),
    "description" => get_input("description"),
    "url" => get_input("url")
);

$contents = get_resized_image_from_uploaded_file("photo", 1280, 330);
if ($contents) {
    $banner['photoTime'] = time();

    $fh = new ElggFile();
    $fh->owner_guid = $site->guid;
    $fh->setFilename("banner_photo.jpg");
    $fh->open("write");
    $fh->write($contents);
    $fh->close();
}

elgg_set_plugin_setting("banner", serialize($banner), "rijkshuisstijl");

forward("");