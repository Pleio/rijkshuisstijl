<?php
$becon_enabled = elgg_is_active_plugin("pleio_beconnummer");
?>

<div class="rhs-steps">
    <?php if ($becon_enabled): ?>
        <div class="rhs-splash rhs-step" data-step="1">
            <?php echo elgg_view("register/step-0-becon", array(
                'step' => [1,3]
            )); ?>
        </div>
    <?php endif; ?>

    <div class="rhs-splash rhs-step" data-step="2" style="display:none;">
        <?php echo elgg_view("register/step-1-account", array(
            'step' => [2,3]
        )); ?>
    </div>

    <div class="rhs-splash rhs-step" data-step="3" style="display:none;">
        <?php echo elgg_view("register/step-2-profile", array(
            'step' => [3,3]
        )); ?>
    </div>
</div>

<?php
echo elgg_view('input/hidden', array('name' => 'friend_guid', 'value' => $vars['friend_guid']));
echo elgg_view('input/hidden', array('name' => 'invitecode', 'value' => $vars['invitecode']));
?>
