<?php $user = elgg_extract("user", $vars); ?>

<?php echo elgg_view_module(
    "inline",
    elgg_echo("rijkshuisstijl:admin:profile:edit"), 
    elgg_view("forms/admin/users/components/profile", ["entity" => $user])
); ?>

<div class="elgg-foot">
    <?php echo elgg_view("input/hidden", ["name" => "guid", "value" => $user->guid]); ?>
    <?php echo elgg_view("input/submit", ["value" => elgg_echo("save")]); ?>
    <?php echo elgg_view("output/url", [
        "class" => "elgg-button",
        "href" => "/profile/{$user->username}",
        "text" => elgg_echo("rijkshuisstijl:view_profile")
    ]); ?>
</div>