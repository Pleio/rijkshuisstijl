<?php
$guid = get_input("guid");

if ($guid) {
    $videos = get_entity($guid);
    if (!$videos | !$videos instanceof ElggVideos) {
        register_error(elgg_echo("InvalidParameterException:NoEntityFound"));
        forward(REFERER);
    }
}

$options = array(
        "name" => "videos",
        "action" => "action/videos/save",
);

$content = elgg_view_form(
    "videos/edit", $options, array(
        "entity" => $videos
    )
);

if ($guid) {
    $title = elgg_echo("videos:edit");
} else {
    $title = elgg_echo("videos:add");
}

$content = elgg_view_layout("content", array(
    "title" => $title,
    "filter" => "",
    "content" => $content,
    "sidebar" => elgg_view("pages/sidebar")
));

echo elgg_view_page($title, $content);