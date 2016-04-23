<?php
  $user = elgg_get_page_owner_entity();
  if (!$user) 
  {
    register_error(elgg_echo("profile:notfound"));
    forward();
  }

  $username = elgg_extract("username", $vars);
  $name = elgg_extract("name", $vars);
  $selected = elgg_extract("selected", $vars);
?>

<div class="rhs-content-header rhs-content-header--profile">
  <div class="rhs-container">
    <div class="rhs-row">
      <div class="rhs-col-xs-9">
      <h1 data-name="name" data-value="<?php echo $name ?>" data-placeholder="Voor- en achternaam" data-classname="editable-field-link--show-on-mobile" class="rhs-profile__title"><?php echo $name ?></h1>
      </div>
      <div class="rhs-col-xs-3">
        <div class="rhs-profile__actions"><a class="rhs-button rhs-button--primary rhs-button--only-icon-on-mobile"> <span class="rhs-icon rhs-icon-log-out"></span>Uitloggen</a></div>
      </div>
    </div>
    <div class="rhs-content-header__menu rhs-card-topic__menu--profile"><a href="/profilet/<?php echo $username; ?>/" title="Profiel" class="rhs-content-header__link <?php echo $selected == "Profiel" ? "active" : ""; ?>">Profiel</a><a href="/profilet/<?php echo $username; ?>/interests" title="..." class="rhs-content-header__link <?php echo $selected == "Interesses" ? "active" : ""; ?>">Interesses</a><a href="/profilet/<?php echo $username; ?>/settings" title="..." class="rhs-content-header__link <?php echo $selected == "Instellingen" ? "active" : ""; ?>">Instellingen</a><!--<a href="/profile-colleagues.html" title="..." class="rhs-content-header__link">Vakgenoten</a></div>-->
    <div class="rhs-content-header__dropdown">
      <div class="selecter  closed" tabindex="0"><select tabindex="-1" name="category" id="selecter-menu" class="selecter-menu selecter-element">
        <option value="/profilet/<?php echo $username; ?>/" selected="selected">Profiel</option>
        <option value="/profilet/<?php echo $username; ?>/interests">Interesses</option>
        <option value="/profilet/<?php echo $username; ?>/settings">Instellingen</option>
        <!--<option value="profile-colleagues.html">Vakgenoten</option>-->
      </select><span class="selecter-selected">Profiel</span><div class="selecter-options"><a class="selecter-item selected" href="profile.html">Profiel</a><a class="selecter-item" href="profile-interests.html">Interesses</a><a class="selecter-item" href="profile-settings.html">Instellingen</a><!--<a class="selecter-item" href="profile-colleagues.html">Vakgenoten</a>--></div></div>
    </div>
  </div>
</div>