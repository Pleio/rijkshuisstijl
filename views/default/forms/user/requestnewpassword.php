<?php
/**
 * Elgg forgotten password.
 *
 * @package Elgg
 * @subpackage Core
 */
?>

<h1 class="rhs-splash__title">Wachtwoord vergeten?</h1>
<a href="/login" title="<?php echo elgg_echo('rijkshuisstijl:back_to_login'); ?>" class="rhs-splash__close">
    <?php echo elgg_echo('rijkshuisstijl:back_to_login'); ?>
</a>

<p class="rhs-splash__form-element">
    <label class="rhs-form__label">
        <span class="rhs-form__label-text">
            <?php echo elgg_echo('loginusername'); ?>
        </span>
        <?php echo elgg_view("input/text", array(
            "name" => "username",
            "class" => "rhs-form__input js-validateInput",
            "placeholder" => elgg_echo('loginusername'),
            "data-validation" => ".{4,}",
            "data-validationmessage" => "Vul uw gebruikersnaam of e-mail in"
        )); ?>
    </label>
</p>

<p class="rhs-splash__form-element">
    <?php echo elgg_view('input/captcha'); ?>
</p>

<p class="rhs-form__actions">
    <?php echo elgg_view("input/button", array(
        "type" => "submit",
        "class" => "rhs-button rhs-button--color-septenary rhs-button--disabled js-submitForm",
        "value" => elgg_echo('request')
    )); ?>
</p>