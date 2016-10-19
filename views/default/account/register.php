<?php
$becon_enabled = elgg_is_active_plugin("pleio_beconnummer");
?>

<div class="rhs-steps">
    <?php if ($becon_enabled): ?>
        <div class="rhs-step" data-step="1">
            <?php echo elgg_view_form("register/step-0-becon", array(
                'class' => 'elgg-form-register rhs-splash js-validateForm'
            ), array(
                'step' => [1,3]
            )); ?>
        </div>
    <?php endif; ?>

    <div class="rhs-step" data-step="2" style="display:none;">
        <?php echo elgg_view_form("register/step-1-account", array(
            'class' => 'elgg-form-register rhs-splash js-validateForm'
        ), array(
            'step' => [2,3]
        )); ?>
    </div>

    <div class="rhs-step" data-step="3" style="display:none;">
        <?php echo elgg_view_form("register/step-2-profile", array(
            'class' => 'elgg-form-register rhs-splash js-validateForm'
        ), array(
            'step' => [3,3]
        )); ?>
    </div>
</div>