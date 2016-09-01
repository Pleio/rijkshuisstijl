<?php
$banner = unserialize(elgg_get_plugin_setting("banner", "rijkshuisstijl"));
?>

<p>
    <label><?php echo elgg_echo("rijkshuisstijl:show"); ?></label>
    <?php echo elgg_view("input/dropdown", array(
        "name" => "show",
        "options_values" => array(
            "no" => elgg_echo("option:no"),
            "yes" => elgg_echo("option:yes")
        ),
        "value" => $banner["show"]
    )); ?>
</p>

<p>
    <label><?php echo elgg_echo("rijkshuisstijl:title"); ?></label>
    <?php echo elgg_view("input/text", array(
        "name" => "title",
        "value" => $banner["title"]
    )); ?>
</p>

<p>
    <?php echo elgg_view("input/longtext", array(
        "name" => "description",
        "value" => $banner["description"]
    )); ?>
</p>

<p>
    <label><?php echo elgg_echo("rijkshuisstijl:url"); ?></label>
    <?php echo elgg_view("input/text", array(
        "name" => "url",
        "value" => $banner["url"]
    )); ?>
</p>

<p>
    <label><?php echo elgg_echo("rijkshuisstijl:photo"); ?></label><br />
    <?php echo elgg_view("input/file", array(
        "name" => "photo"
    )); ?>
</p>

<p>
    <?php echo elgg_view("input/button", array(
        "type" => "submit",
        "name" => elgg_echo("save")
    )); ?>
</p>