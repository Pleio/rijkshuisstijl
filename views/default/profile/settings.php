<?php


$user = elgg_get_logged_in_user_entity();
if (!$user) 
{
  register_error(elgg_echo("profile:notfound"));
  forward();
}

$username = elgg_extract("username", $vars);
$targetUser = get_user_by_username($username);
if (!$targetUser) 
{
  register_error(elgg_echo("profile:notfound"));
  forward();
}

$editable = $targetUser->canEdit();
if (!$editable) 
{
  register_error(elgg_echo("profile:noaccess"));
  forward();
}
?>

<script type="text/javascript">
  var gUsername = '<?php echo $username ?>';
</script>

<div class="rhs-container">
  <div class="rhs-profile-blocks">
    <div class="rhs-profile-block">
      <form method="get" novalidate class="js-validateForm" id="passwordChangeForm">
        <div class="rhs-row">
          <div class="rhs-col-md-5">
            <h2 class="rhs-profile-block__title">Account wachtwoord</h2>
            <p class="rhs-form__element">
              <label class="rhs-form__label"><span class="rhs-form__label-text">Huidig wachtwoord</span>
                <input id="password" type="password" placeholder="<?php echo elgg_echo("rijkshuisstijl:register:password:placeholder", array($CONFIG->min_password_length)); ?>" required data-validation=".{<?php echo $CONFIG->min_password_length; ?>,}" data-validationMessage="Vul uw wachtwoord in" value="" class="rhs-form__input js-validateInput">
              </label>
            </p>
            <p class="rhs-form__element">
              <label class="rhs-form__label"><span class="rhs-form__label-text">Je nieuwe wachtwoord</span>
                <input id="new_password" type="password" placeholder="<?php echo elgg_echo("rijkshuisstijl:register:password:placeholder", array($CONFIG->min_password_length)); ?>" required data-validation=".{<?php echo $CONFIG->min_password_length; ?>,}" data-validationMessage="Uw wachtwoord moet minimaal 8 karakters bevatten" value="" class="rhs-form__input js-validateInput">
              </label>
            </p>
            <p class="rhs-form__element">
              <label class="rhs-form__label"><span class="rhs-form__label-text">Wachtwoord verificatie</span>
                <input type="password" placeholder="<?php echo elgg_echo("rijkshuisstijl:register:password:enter_again"); ?>" required data-validation="duplicateOf=new_password" data-validationMessage="Wachtwoord ter verificatie komt niet overeen met uw wachtwoord" id="newPasswordValidation" value="" class="rhs-form__input js-validateInput">
              </label>
            </p>
            <p class="rhs-form__element rhs-form__element--small-padding">
              <button class="rhs-button rhs-button rhs-button--color-septenary rhs-button--disabled js-submitForm">Update wachtwoord</button>
            </p>
          </div>
        </div>
      </form>
    </div>
    <div class="rhs-profile-block">
      <div class="rhs-row">
        <div class="rhs-col-md-5">
          <form method="get" novalidate class="js-validateForm" id="emailChangeForm">
            <h2 class="rhs-profile-block__title">Account e-mailadres</h2>
            <p class="rhs-form__element rhs-form__element--small-padding">
              <label class="rhs-form__label"><span class="rhs-form__label-text rhs-form__label-text--hidden">Account e-mailadres</span>
                <input id="emailAddress" type="email" placeholder="Account e-mailadres" required data-validation=".+@.+..{2}" data-validationMessage="Vul een geldig e-mailadres in" value="<?php echo $targetUser->email ?>" class="rhs-form__input js-validateInput">
              </label>
            </p>
            <p class="rhs-form__element rhs-form__element--small-padding">
              <button class="rhs-button rhs-button rhs-button--color-septenary rhs-button--disabled js-submitForm">Update e-mailadres</button>
            </p>
          </form>
        </div>
      </div>
    </div>
    <div class="rhs-profile-block">
      <div class="rhs-row">
        <div class="rhs-col-md-4">
          <form method="get" novalidate class="js-validateForm">
            <h2 class="rhs-profile-block__title">Taalinstellingen</h2>
            <p class="rhs-form__element rhs-form__element--small-padding">
              <label class="rhs-form__label">
                <select name="taal" id="taalinstellingen" data-label="custom" class="selecter-default">
                  <option value="1" selected="selected">Nederlands</option>
                  <option value="2">Engels</option>
                  <option value="3">Frans</option>
                </select>
              </label>
            </p>
          </form>
        </div>
      </div>
    </div>
    <p class="rhs-form__actions">
      <button data-modal-id="#modal-remove-account" class="rhs-button rhs-button--color-septenary js-toggleModal"> Account verwijderen</button>
    </p>
    <div class="rhs-profile-block--no-bottom-padding"></div>
  </div>
</div>