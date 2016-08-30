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

  $notificationSettings = get_user_notification_settings($targetUser->guid);

  /* will recode to use entitiesfromrelationship later
  $interests = $user->getEntitiesFromRelationship(array(
    'type' => 'group',
    'relationship' => 'interests'
  ));*/
?>

<script type="text/javascript">
  var gUsername = '<?php echo $username ?>';
  var gUserGuid = '<?php echo $targetUser->guid ?>';
  var gName = '<?php echo $targetUser->name ?>';
  var gLanguage = '<?php echo $targetUser->language ?>';
  var gElggSiteGuid = '<?php echo elgg_get_site_entity()->getGUID(); ?>';
  var gEmail = '<?php echo $targetUser->email ?>';
</script>

<div class="rhs-container">
  <div class="rhs-sections rhs-sections--large-top-padding">
    <div class="rhs-section rhs-section--item rhs-section--background-transparent">
      <div class="rhs-profile-block">
        <div class="rhs-row">
          <div class="rhs-col-sm-12">
            <h2 class="rhs-profile-block__title"><?php echo elgg_echo('rijkshuisstijl:profile:interests:notifications') ?></h2>
            <p class="rhs-form__element rhs-form__element--no-padding">
              <label for="option-1" class="rhs-checkbox rhs-checkbox--theme">
                <?php
                $options = array(
                  "id" => "option-1",
                  "name" => "option-1",
                  //"class" => "rhs-checkbox__input js-validateCheckbox"
                );

                if (isset($notificationSettings->email) && $notificationSettings->email == 1) {
                  $options['checked'] = 'checked';
                }

                echo elgg_view("input/checkbox", $options);
                ?>
                <?php echo elgg_echo('rijkshuisstijl:profile:interests:receivenotification') ?>
              </label>
            </p>

            <p class="rhs-form__element rhs-form__element--no-padding">
              <label for="option-2" class="rhs-checkbox rhs-checkbox--theme">
                <?php $options = array(
                  "id" => "option-2",
                  "name" => "option-$opt"
                  //"class" => "rhs-checkbox__input js-validateCheckbox"
                );

                if (newsletter_check_user_subscription($targetUser, elgg_get_site_entity()))
                {
                  $options['checked'] = 'checked';
                }

                ?>
                <?php echo elgg_view("input/checkbox", $options) ?>
                <?php echo elgg_echo('rijkshuisstijl:profile:interests:receivenewsletter'); ?>
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
            <h2 class="rhs-profile-block__title"><?php echo elgg_echo('rijkshuisstijl:profile:interests:emailsummary') ?></h2>
          </div>
        </div>
        <div class="rhs-row">
          <?php
            $groups = rijkshuisstijl_get_featured_groups();
            $groupCountPerColumn = ceil(count($groups) / 3);
            $groupIndex = 0;

            for ($i = 0; $i < 3; $i++) :
              if ($groupIndex >= count($groups))
                break;
          ?>
            <div class="rhs-col-md-4 rhs-col-sm-6">
              <?php
                for ($j = 0; $j < $groupCountPerColumn; $j++) :
                  if ($groupIndex >= count($groups))
                    break;

                  $group = $groups[$groupIndex++];
                  $interval = $targetUser->getPrivateSetting("digest_" . $group->guid);
              ?>
                  <p class="rhs-form__element">
                    <label class="rhs-form__label"><span class="rhs-form__label-text"><?php echo $group->name ?></span>
                      <?php echo elgg_view("input/dropdown", array(
                        "name" => "groupNotifications",
                        "group-id" => $group->guid,
                        "data-label" => "custom",
                        "options_values" => array(
                          "none" => elgg_echo("digest:interval:none"),
                          "daily" => elgg_echo("digest:interval:daily"),
                          "weekly" => elgg_echo("digest:interval:weekly"),
                          "fortnightly" => elgg_echo("digest:interval:fortnightly"),
                          "Monthly" => elgg_echo("digest:interval:monthly")
                        )
                      ));
                      ?>
                    </label>
                  </p>
              <?php
                endfor;
              ?>
            </div>
          <?php
            endfor;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>