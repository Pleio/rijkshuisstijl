<?php if (elgg_is_logged_in()): ?>
    <?php echo elgg_view("subsite_manager/subsites/dropdown"); ?>
<?php endif; ?>

<?php if (elgg_is_logged_in()): ?>
    <?php echo elgg_view("subsite_manager/account/dropdown"); ?>
<?php else: ?>
    <a href="/login" class="rhs-top-navigation__link rhs-top-navigation__link--right">
        <?php echo elgg_echo("rijkshuisstijl:login"); ?>
    </a>
<?php endif; ?>