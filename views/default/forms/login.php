<?php
$site = elgg_get_site_entity();
?>

<h1 class="rhs-splash__title"><?php echo elgg_echo('rijkshuisstijl:welcome_to'); ?> <?php echo $site->name; ?></h1>

<p class="rhs-form__element">
    <label class="rhs-form__label"><span class="rhs-form__label-text rhs-form__label-text--hidden"><?php echo elgg_echo('email'); ?></span>
      <input name="username" type="text" placeholder="E-mail of gebruikersnaam" autofocus="" class="rhs-form__input" required="" data-validation=".{4,}" data-validationmessage="Vul uw gebruikersnaam of e-mail in">
    </label>
</p>

<p class="rhs-form__element">
    <label class="rhs-form__label"><span class="rhs-form__label-text rhs-form__label-text--hidden"><?php echo elgg_echo('password'); ?></span>
      <input name="password" type="password" placeholder="Wachtwoord" required="" data-only-validate-on-submit="" data-validation=".{4,}" data-validationmessage="Vul uw wachtwoord in" class="rhs-form__input js-validateInput">
    </label>
</p>

<p class="rhs-splash__form-element">
    <button class="rhs-button rhs-button--color-septenary rhs-button--full-width" type="submit"><?php echo elgg_echo('login'); ?></button>
</p>

<p class="rhs-splash__alternative-actions">
    <?php if (elgg_get_config('allow_registration')): ?>
        <a href="/register">Registreren</a>
    <?php endif; ?>
    <a href="/forgotpassword">Wachtwoord vergeten?</a>
</p>

<?php
if (isset($vars['returntoreferer'])) {
    echo elgg_view('input/hidden', array('name' => 'returntoreferer', 'value' => 'true'));
}
?>