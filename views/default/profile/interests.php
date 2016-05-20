<?php
  $user = elgg_get_logged_in_user_entity();
  if (!$user)
  {
    register_error(elgg_echo("profile:notfound"));
    forward();
  }

  if (!$user->canEdit()) {
    register_error(elgg_echo("profile:notfound"));
    forward();
  }

  $username = elgg_extract("username", $vars);
  $notifications = array(true, false);

  $targetUser = get_user_by_username($username);
  if (!$targetUser)
  {
    register_error(elgg_echo("profile:notfound"));
    forward();
  }

  if (isset($targetUser->notifications))
  {
    for ($i = 0; $i < max(count($targetUser->notifications), count($notifications)); $i++)
      $notifications[$i] = $targetUser->notifications[$i] != "0";
  }

  $groups = rijkshuisstijl_get_featured_groups();
  $interests = rijkshuisstijl_get_interests($targetUser);

  /* will recode to use entitiesfromrelationship later
  $interests = $user->getEntitiesFromRelationship(array(
    'type' => 'group',
    'relationship' => 'interests'
  ));*/
?>

<script type="text/javascript">
  var gUsername = '<?php echo $username ?>';
</script>

<div class="rhs-container">
  <div class="rhs-sections rhs-sections--large-top-padding">
    <?php if (count($groups) > 0): ?>
      <div class="rhs-section rhs-section--item rhs-section--background-transparent">
        <div class="rhs-profile-block">
          <div class="rhs-row">
            <div class="rhs-col-md-7">
              <h2 class="rhs-profile-block__title">Hier kunt u uw interesses aangeven waardoor informatie voor u op maat wordt gefilterd in het forum en nieuws.</h2>
            </div>
            <div class="rhs-col-md-1"></div>
            <div class="rhs-col-md-4">
              <p class="rhs-form__element rhs-form__element--small-padding">
                <?php foreach($groups as $group): ?>
                  <label for="interest-<?php echo $group->guid; ?>" class="rhs-checkbox-switch">
                    <input type="checkbox" id="interest-<?php echo $group->guid; ?>" interest-id="<?php echo $group->guid ?>" name="interests" <?php echo in_array($group->guid, $interests) ? "checked" : ""; ?> class="rhs-checkbox-switch__input"><span class="rhs-checkbox-switch__placeholder"></span><?php echo $group->name; ?>
                  </label>
                <?php endforeach; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <div class="rhs-section rhs-section--item rhs-section--background-transparent">
      <div class="rhs-profile-block">
        <div class="rhs-row">
          <div class="rhs-col-sm-12">
            <h2 class="rhs-profile-block__title">Notificaties </h2>
            <p class="rhs-form__element rhs-form__element--no-padding">
              <label for="option-1" class="rhs-checkbox rhs-checkbox--theme">
                <input type="checkbox" id="option-1" name="options-1" <?php echo $notifications[0] ? "checked" : "" ?> class="rhs-checkbox__input js-validateCheckbox"><span class="rhs-checkbox__placeholder"></span>Ontvang een melding als iemand op jou reageert
              </label>
            </p>
            <p class="rhs-form__element rhs-form__element--no-padding">
              <label for="option-2" class="rhs-checkbox rhs-checkbox--theme">
                <input type="checkbox" id="option-2" name="options-2" <?php echo $notifications[1] ? "checked" : "" ?> class="rhs-checkbox__input"><span class="rhs-checkbox__placeholder"></span>Ik wil de site nieuwsbrief ontvangen
              </label>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="rhs-section rhs-section--item rhs-section--background-transparent">
      <div class="rhs-profile-block rhs-profile-block--small-bottom-padding">
        <div class="rhs-row">
          <div class="rhs-col-sm-12">
            <h2 class="rhs-profile-block__title">Je e-mailoverzicht instellen </h2>
          </div>
        </div>
        <div class="rhs-row">
          <div class="rhs-col-md-4 rhs-col-sm-6">
            <p class="rhs-form__element">
              <label class="rhs-form__label"><span class="rhs-form__label-text">Inkomstenbelasting</span>
                <select name="thema" id="inkomstenbelasting" data-label="custom" class="selecter-default elgg-input-dropdown">
                  <option value="" disabled>Geef uw voorkeur</option>
                  <option value="1">Geen</option>
                  <option value="2" selected="selected">Dagelijks</option>
                  <option value="3">Wekelijks</option>
                  <option value="4">Tweewekelijks</option>
                  <option value="4">Maandelijks</option>
                </select>
              </label>
            </p>
            <p class="rhs-form__element rhs-form__element--small-padding">
              <label class="rhs-form__label"><span class="rhs-form__label-text">Open Forum</span>
                <select name="thema" id="open-forum" data-label="custom" class="selecter-default elgg-input-dropdown">
                  <option value="" disabled>Geef uw voorkeur</option>
                  <option value="1">Geen</option>
                  <option value="2" selected="selected">Dagelijks</option>
                  <option value="3">Wekelijks</option>
                  <option value="4">Tweewekelijks</option>
                  <option value="4">Maandelijks</option>
                </select>
              </label>
            </p>
          </div>
          <div class="rhs-col-md-4 rhs-col-sm-6">
            <p class="rhs-form__element">
              <label class="rhs-form__label"><span class="rhs-form__label-text">Loonheffingen</span>
                <select name="thema" id="loonheffingen" data-label="custom" class="selecter-default elgg-input-dropdown">
                  <option value="" disabled>Geef uw voorkeur</option>
                  <option value="1">Geen</option>
                  <option value="2" selected="selected">Dagelijks</option>
                  <option value="3">Wekelijks</option>
                  <option value="4">Tweewekelijks</option>
                  <option value="4">Maandelijks</option>
                </select>
              </label>
            </p>
            <p class="rhs-form__element rhs-form__element--small-padding">
              <label class="rhs-form__label"><span class="rhs-form__label-text">Toeslagen</span>
                <select name="thema" id="toeslagen" data-label="custom" class="selecter-default elgg-input-dropdown">
                  <option value="" disabled>Geef uw voorkeur</option>
                  <option value="1">Geen</option>
                  <option value="2" selected="selected">Dagelijks</option>
                  <option value="3">Wekelijks</option>
                  <option value="4">Tweewekelijks</option>
                  <option value="4">Maandelijks</option>
                </select>
              </label>
            </p>
          </div>
          <div class="rhs-col-md-4">
            <div class="rhs-row">
              <div class="rhs-col-sm-6 rhs-col-md-12">
                <p class="rhs-form__element">
                  <label class="rhs-form__label"><span class="rhs-form__label-text">Omzetbelasting</span>
                    <select name="thema" id="omzetbelasting" data-label="custom" class="selecter-default elgg-input-dropdown">
                      <option value="" disabled>Geef uw voorkeur</option>
                      <option value="1">Geen</option>
                      <option value="2" selected="selected">Dagelijks</option>
                      <option value="3">Wekelijks</option>
                      <option value="4">Tweewekelijks</option>
                      <option value="4">Maandelijks</option>
                    </select>
                  </label>
                </p>
              </div>
              <div class="rhs-col-sm-6 rhs-col-md-12">
                <p class="rhs-form__element rhs-form__element--small-padding">
                  <label class="rhs-form__label"><span class="rhs-form__label-text">Vennootschapsbelasting</span>
                    <select name="thema" id="vennootschapsbelasting" data-label="custom" class="selecter-default elgg-input-dropdown">
                      <option value="">Geef uw voorkeur</option>
                      <option value="1">Geen</option>
                      <option value="2">Dagelijks</option>
                      <option value="3">Wekelijks</option>
                      <option value="4">Tweewekelijks</option>
                      <option value="4">Maandelijks</option>
                    </select>
                  </label>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>