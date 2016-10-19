<?php
$registration_text = elgg_get_plugin_setting("registration_text", "rijkshuisstijl");
?>

<h1 class="rhs-splash__title">
    <?php echo elgg_echo("register"); ?>
    <span class="rhs-splash__title--lighter-font">
        <?php echo $vars["step"][0]; ?>/<?php echo $vars["step"][1]; ?>
    </span>
</h1>

<a href="/login" title="Terug naar login" class="rhs-splash__close">
    Terug naar login
</a>

<?php if ($registration_text): ?>
    <p class="rhs-form__element rhs-form__element--text">
        <?php echo $registration_text; ?>
    </p>
<?php endif; ?>

<p class="rhs-form__element">
    <label class="rhs-form__label">
        <span class="rhs-form__label-text">
            <?php echo elgg_echo("rijkshuisstijl:register:becon"); ?>*
        </span>
        <?php
        echo elgg_view("input/text", array(
            "name" => "custom_profile_fields_beconnummer",
            "placeholder" => elgg_echo("rijkshuisstijl:register:becon"),
            "class" => "rhs-form__input js-validateInput js-validateBecon",
            "autofocus" => "autofocus",
            "data-validation" => ".{4,}",
            "data-validationmessage" => elgg_echo("rijkshuisstijl:register:becon:error")
        ));
        ?>
    </label>
</p>

<p class="rhs-form__actions">
    <?php echo elgg_view("output/url", array(
        "href" => "/login",
        "text" => elgg_echo("rijkshuisstijl:previous"),
        "class" => "rhs-button rhs-button--link"
    )); ?>

    <?php echo elgg_view("input/button", array(
        "href" => "/login",
        "value" => elgg_echo("rijkshuisstijl:next"),
        "class" => "rhs-button rhs-button--color-septenary rhs-button--disabled js-submitForm",
        "data-validation",
        "data-step-next" => ""
    )); ?>
</p>
