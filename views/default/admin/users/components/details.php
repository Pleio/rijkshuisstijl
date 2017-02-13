<?php
$user = elgg_extract("entity", $vars);
$items = ["time_created", "time_updated", "last_action", "prev_last_action", "last_login", "prev_last_login"];
?>

<table class="elgg-table">
    <tr>
        <td><?php echo elgg_echo("email"); ?></td>
        <td><?php echo $user->email; ?></td>
    </tr>

    <?php foreach ($items as $item): ?>
        <tr>
            <td><?php echo elgg_echo("rijkshuisstijl:${item}"); ?></td>
            <td><?php echo rijkshuisstijl_view_friendly_time($user->$item); ?></td>
        </tr>
    <?php endforeach; ?>
</table>