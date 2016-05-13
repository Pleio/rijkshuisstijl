<?php
/**
 * Elgg forgotten password.
 *
 * @package Elgg
 * @subpackage Core
 */
?>

<h1 class="rhs-splash__title">Wachtwoord vergeten?</h1>
<a href="/login" title="<?php echo elgg_echo('rijkshuisstijl:back_to_login'); ?>" class="rhs-splash__close"><?php echo elgg_echo('rijkshuisstijl:back_to_login'); ?></a>

<p class="rhs-splash__form-element">
    <label class="rhs-form__label"><span class="rhs-form__label-text"><?php echo elgg_echo('loginusername'); ?></span>
      <input name="username" type="text" placeholder="<?php echo elgg_echo('loginusername'); ?>" required="" data-validation=".{4,}" data-validationmessage="Vul uw gebruikersnaam of e-mail in" class="rhs-form__input js-validateInput">
    </label>
</p>

<p class="rhs-splash__form-element">
    <?php echo elgg_view('input/captcha'); ?>
</p>

<p class="rhs-form__actions">
    <button type="submit" class="rhs-button rhs-button--color-septenary rhs-button--disabled js-submitForm"><?php echo elgg_echo('request'); ?></button>
</p>