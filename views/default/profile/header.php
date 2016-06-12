<?php
  $user = elgg_get_logged_in_user_entity();
  if (!$user) 
  {
    register_error(elgg_echo("profile:notfound"));
    forward();
  }

  $username = elgg_extract("username", $vars);
  $name = elgg_extract("name", $vars);
  $selected = elgg_extract("selected", $vars);
  $targetUser = get_user_by_username($username);
  if (!$targetUser) 
  {
    register_error(elgg_echo("profile:notfound"));
    forward();
  }

  $editable = $targetUser->canEdit();
?>

<div class="rhs-content-header rhs-content-header--profile">
  <div class="rhs-container">
    <div class="rhs-row">
      <div class="rhs-col-xs-9">
        <?php if ($editable) : ?>
          <h1 data-name="name" data-value="<?php echo $name ?>" data-placeholder="Voor- en achternaam" data-classname="editable-field-link--show-on-mobile" class="rhs-profile__title js-editableField">
            <a class="editable-field-link editable-field-link--show-on-mobile" href="#Edit field" title="Update veld">
              <?php echo $name ?>
            </a>
          </h1>
        <?php else : ?>
          <h1 data-name="name" data-value="<?php echo $name ?>" data-placeholder="Voor- en achternaam" data-classname="editable-field-link--show-on-mobile" class="rhs-profile__title">
            <?php echo $name ?>          
          </h1>
        <?php endif ?>
      </div>
      <div class="rhs-col-xs-3">
        <div class="rhs-profile__actions">
          <a class="rhs-button rhs-button--primary rhs-button--only-icon-on-mobile" href="/action/logout"> 
            <span class="rhs-icon rhs-icon-log-out"></span>
            <?php echo elgg_echo('rijkshuisstijl:logout'); ?>
          </a>
        </div>
      </div>
    </div>
    <?php if ($editable) : ?>
      <div class="rhs-content-header__menu rhs-card-topic__menu--profile">
        <a href="/profile/<?php echo $username; ?>/" title="Profiel" class="rhs-content-header__link <?php echo $selected == "Profiel" ? "active" : ""; ?>">
          <?php echo elgg_echo('rijkshuisstijl:profile:header:profile') ?>
        </a>
          <a href="/profile/<?php echo $username; ?>/interests" title="..." class="rhs-content-header__link <?php echo $selected == "Interesses" ? "active" : ""; ?>">
            <?php echo elgg_echo('rijkshuisstijl:profile:header:interests') ?>
          </a>
          <a href="/profile/<?php echo $username; ?>/settings" title="..." class="rhs-content-header__link <?php echo $selected == "Instellingen" ? "active" : ""; ?>">
            <?php echo elgg_echo('rijkshuisstijl:profile:header:settings') ?>
          </a>
      <div class="rhs-content-header__dropdown">
        <div class="selecter  closed" tabindex="0"><select tabindex="-1" name="category" id="selecter-menu" class="selecter-menu selecter-element">
          <option value="/profile/<?php echo $username; ?>/" selected="selected"><?php elgg_echo('rijkshuisstijl:profile:header:profile') ?></option>
          <?php if ($editable) : ?><option value="/profile/<?php echo $username; ?>/interests"><?php elgg_echo('rijkshuisstijl:profile:header:interests') ?></option><?php endif ?>
          <?php if ($editable) : ?><option value="/profile/<?php echo $username; ?>/settings"><?php elgg_echo('rijkshuisstijl:profile:header:settings') ?></option><?php endif ?>
        </select></div>
        </div>
      </div>
    <?php endif ?>
  </div>
</div>