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
  var gName = '<?php echo $targetUser->name ?>';
  var gUserGuid = '<?php echo $targetUser->guid ?>';
  var gLanguage = '<?php echo $targetUser->language ?>';
  var gEmail = '<?php echo $targetUser->email ?>';
</script>

<div class="rhs-container">
  <div class="rhs-sections rhs-sections--large-top-padding">
    <div class="rhs-section rhs-section--item rhs-section--background-transparent">
      <div class="rhs-profile-block">
        <form method="get" novalidate class="js-validateForm" id="passwordChangeForm">
          <div class="rhs-row">
            <div class="rhs-col-md-5">
              <h2 class="rhs-profile-block__title"><?php echo elgg_echo('rijkshuisstijl:profile:settings:accountpassword') ?></h2>
              <p class="rhs-form__element">
                <label class="rhs-form__label"><span class="rhs-form__label-text"><?php echo elgg_echo('rijkshuisstijl:profile:settings:currentpassword') ?></span>
                  <input id="password" type="password" placeholder="<?php echo elgg_echo("rijkshuisstijl:register:password:placeholder", array($CONFIG->min_password_length)); ?>" required data-validation=".{<?php echo $CONFIG->min_password_length; ?>,}" data-validationMessage="<?php echo elgg_echo('rijkshuisstijl:profile:settings:fillinpassword') ?>" value="" class="rhs-form__input js-validateInput">
                </label>
              </p>
              <p class="rhs-form__element">
                <label class="rhs-form__label"><span class="rhs-form__label-text"><?php echo elgg_echo('rijkshuisstijl:profile:settings:yournewpassword') ?></span>
                  <input id="new_password" type="password" placeholder="<?php echo elgg_echo("rijkshuisstijl:register:password:placeholder", array($CONFIG->min_password_length)); ?>" required data-validation=".{<?php echo $CONFIG->min_password_length; ?>,}" data-validationMessage="<?php echo elgg_echo('rijkshuisstijl:profile:settings:urpasswordminimal') ?>" value="" class="rhs-form__input js-validateInput">
                </label>
              </p>
              <p class="rhs-form__element">
                <label class="rhs-form__label"><span class="rhs-form__label-text"><?php echo elgg_echo('rijkshuisstijl:profile:settings:passwordverification') ?></span>
                  <input type="password" placeholder="<?php echo elgg_echo("rijkshuisstijl:register:password:enter_again"); ?>" required data-validation="duplicateOf=new_password" data-validationMessage="<?php echo elgg_echo('rijkshuisstijl:profile:settings:passwordsdonotmatch') ?>" id="newPasswordValidation" value="" class="rhs-form__input js-validateInput">
                </label>
              </p>
              <p class="rhs-form__element rhs-form__element--small-padding">
                <button class="rhs-button rhs-button rhs-button--color-septenary rhs-button--disabled js-submitForm"><?php echo elgg_echo('rijkshuisstijl:profile:settings:updatepassword') ?></button>
              </p>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="rhs-section rhs-section--item rhs-section--background-transparent">
      <div class="rhs-profile-block">
        <div class="rhs-row">
          <div class="rhs-col-md-5">
            <form method="get" novalidate class="js-validateForm" id="emailChangeForm">
              <h2 class="rhs-profile-block__title"><?php echo elgg_echo('rijkshuisstijl:profile:settings:email') ?></h2>
              <p class="rhs-form__element rhs-form__element--small-padding">
                <label class="rhs-form__label"><span class="rhs-form__label-text rhs-form__label-text--hidden"><?php echo elgg_echo('rijkshuisstijl:profile:settings:email') ?></span>
                  <input id="emailAddress" type="email" placeholder="Account e-mailadres" required data-validation=".+@.+..{2}" data-validationMessage="<?php echo elgg_echo('rijkshuisstijl:profile:settings:fillinvalidemail') ?>" value="<?php echo $targetUser->email ?>" class="rhs-form__input js-validateInput">
                </label>
              </p>
              <p class="rhs-form__element rhs-form__element--small-padding">
                <button class="rhs-button rhs-button rhs-button--color-septenary rhs-button--disabled js-submitForm"><?php echo elgg_echo('rijkshuisstijl:profile:settings:updateemail') ?></button>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="rhs-section rhs-section--item rhs-section--background-transparent">
      <div class="rhs-profile-block">
        <div class="rhs-row">
          <div class="rhs-col-md-4">
            <form method="get" novalidate class="js-validateForm">
              <h2 class="rhs-profile-block__title"><?php echo elgg_echo('rijkshuisstijl:profile:settings:languagesettings') ?></h2>
              <p class="rhs-form__element rhs-form__element--small-padding">
                <label class="rhs-form__label">
                  <select name="taal" id="taalinstellingen" data-label="custom" class="selecter-default">
                    <?php
                      $validLanguages = array("nl" => "Nederlands", "en" => "English"/*, "fr" => "Francais"*/);
                      foreach ($validLanguages as $validLanguage => $languageDescription)
                        echo '<option value="' . $validLanguage . '" ' . ($validLanguage == $targetUser->language ? 'selected' : '') . '>' . $languageDescription . '</option>';
                    ?>
                  </select>
                </label>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="rhs-section rhs-section--item rhs-section--background-transparent">
      <p class="rhs-form__actions">
        <button data-modal-id="#modal-remove-account" class="rhs-button rhs-button--color-septenary js-toggleModal"> <?php echo elgg_echo('rijkshuisstijl:profile:settings:deleteaccount') ?></button>
      </p>
    </div>
  </div>
</div>