<?php
$categorized_fields = profile_manager_get_categorized_fields(null, true, true);
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

<?php foreach ($categorized_fields['fields'] as $category): ?>
    <?php foreach ($category as $field): ?>
        <?php if ($field->metadata_name == "beconnummer") continue; ?>
        <div class="rhs-form__element <?php echo ($field->metadata_type == "pm_datepicker") ? "rhs-form__date" : "" ?>">
            <label class="rhs-form__label">
                <span class="rhs-form__label-text">
                    <?php echo $field->getTitle(); ?>*
                </span>
                <?php echo elgg_view("input/{$field->metadata_type}", array(
                    "name" => "custom_profile_fields_" . $field->metadata_name,
                    "options" => $field->getOptions()
                )); ?>
            </label>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>

<div class="rhs-form__background">
    <div class="rhs-form__element rhs-form__element--no-padding">
        <label for="accept_terms" class="rhs-checkbox">
            <input type="checkbox" id="accept_terms" name="accept_terms" required data-validationmessage="U moet akkoord gaan" class="rhs-checkbox__input js-validateCheckbox">
            <span class="rhs-checkbox__placeholder"></span>Ik ga akkoord met de <a href="/terms" target="_blank">Algemene Voorwaarden</a>*
        </label>

        <label for="newsletter_subscription" class="rhs-checkbox">
            <input type="checkbox" id="newsletter_subscription" name="newsletter_subscription" value="1" class="rhs-checkbox__input">
            <span class="rhs-checkbox__placeholder"></span>Ik wil de site nieuwsbrief ontvangen
        </label>
    </div>
</div>

<p class="rhs-form__actions">
    <?php echo elgg_view("output/url", array(
        "href" => "#",
        "text" => elgg_echo("rijkshuisstijl:previous"),
        "class" => "rhs-button rhs-button--link",
        "data-step-previous" => ""
    )); ?>

    <?php echo elgg_view("input/button", array(
        "href" => "/login",
        "value" => elgg_echo("rijkshuisstijl:next"),
        "class" => "rhs-button rhs-button--color-septenary rhs-button--disabled js-submitForm",
        "type" => "submit"
    )); ?>
</p>