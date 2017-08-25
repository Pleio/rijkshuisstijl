<?php
$poll = elgg_extract("entity", $vars);
if ($poll) {
    $guid = $poll->guid;
} else  {
    $guid = 0;
}

$poll_front_page = elgg_get_plugin_setting("front_page", "polls");
$front_page_input = "";
if (elgg_is_admin_logged_in() && ($poll_front_page == "yes")) {
    $front_page_input = "<div>";
    $checked = array();
    if ($vars["fd"]["front_page"]) {
        $checked = array("checked" => "checked");
    }

    $front_page_input .= elgg_view("input/checkbox", array("name" => "front_page", "value" => 1, "id" => "polls-front-page") + $checked);
    $front_page_input .= "<label for='polls-fornt-page'>" . elgg_echo("polls:front_page_label") . "</label>";
    $front_page_input .= "</div>";
}

$entity_hidden = "";
if (isset($vars["entity"])) {
    $entity_hidden = elgg_view("input/hidden", array("name" => "guid", "value" => $guid));
}

echo "<div>";
echo "<label for='polls-question'>" . elgg_echo("polls:question") . "</label><br />";
echo elgg_view("input/text", array("name" => "question", "value" => $vars["fd"]["question"], "id" => "polls-question"));
echo "</div>";

echo "<div>";
echo "<label>" . elgg_echo("polls:responses") . "</label><br />";
echo elgg_view("polls/input/choices", array("poll" => $poll));
echo "</div>";

echo $front_page_input;

echo "<div>";
echo "<label>" . elgg_echo("polls:close_date");
echo elgg_view("input/date", array("name" => "close_date", "timestamp" => true, "value" => $vars["fd"]["close_date"]));
echo "</label>";
echo "</div>";

echo "<div>";
echo "<label>" . elgg_echo("polls:topic") . "</label><br />";
echo elgg_view("polls/input/links", array("name" => "topics", "value" => $vars["entity"]->topics, "id" => "polls-topic"));
echo "</div>";

echo "<div>";
echo "<label>" . elgg_echo("polls:link") . "</label><br />";
echo elgg_view("polls/input/links", array("name" => "links", "value" => $vars["entity"]->links, "id" => "polls-link"));
echo "</div>";

echo "<div>";
echo "<label for='polls-tags'>" . elgg_echo("tags") . "</label><br />";
echo elgg_view("input/tags", array("name" => "tags", "value" => $vars["fd"]["tags"], "id" => "polls-tags"));
echo "</div>";

echo "<div>";
echo "<label for='polls-access-id'>" . elgg_echo("access") . "</label><br />";
echo elgg_view("input/access", array("name" => "access_id", "value" => $vars["fd"]["access_id"], "id" => "polls-access-id"));
echo "</div>";

echo "<div class='elgg-foot'>";
echo elgg_view("input/hidden", array("name" => "container_guid", "value" => elgg_get_page_owner_guid()));
echo $entity_hidden;
echo elgg_view("input/submit", array("name" => "submit", "value" => elgg_echo("save")));

?>

<div style="height:200px"></div>