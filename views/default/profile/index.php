<?php
$user = elgg_get_page_owner_entity();
if (!$user) 
{
  register_error(elgg_echo("profile:notfound"));
  forward();
}

$fields = elgg_extract("fields", $vars);
?>

<div class="rhs-content-header rhs-content-header--profile">
  <div class="rhs-container">
    <div class="rhs-row">
      <div class="rhs-col-xs-9">
      <h1 data-name="name" data-value="<?php echo $user->name ?>" data-placeholder="Voor- en achternaam" data-classname="editable-field-link--show-on-mobile" class="rhs-profile__title js-editableField"><a class="editable-field-link editable-field-link--show-on-mobile" href="#Edit field" title="Update veld"><?php echo $user->name ?></a></h1>
      </div>
      <div class="rhs-col-xs-3">
        <div class="rhs-profile__actions"><a class="rhs-button rhs-button--primary rhs-button--only-icon-on-mobile"> <span class="rhs-icon rhs-icon-log-out"></span>Uitloggen</a></div>
      </div>
    </div>
    <div class="rhs-content-header__menu rhs-card-topic__menu--profile"><a href="/profile.html" title="Profiel" class="rhs-content-header__link active">Profiel</a><a href="/profile-interests.html" title="..." class="rhs-content-header__link">Interesses</a><a href="/profile-settings.html" title="..." class="rhs-content-header__link">Instellingen</a><!--<a href="/profile-colleagues.html" title="..." class="rhs-content-header__link">Vakgenoten</a></div>-->
    <div class="rhs-content-header__dropdown">
      <div class="selecter  closed" tabindex="0"><select tabindex="-1" name="category" id="selecter-menu" class="selecter-menu selecter-element">
        <option value="profile.html" selected="selected">Profiel</option>
        <option value="profile-interests.html">Interesses</option>
        <option value="profile-settings.html">Instellingen</option>
        <!--<option value="profile-colleagues.html">Vakgenoten</option>-->
      </select><span class="selecter-selected">Profiel</span><div class="selecter-options"><a class="selecter-item selected" href="profile.html">Profiel</a><a class="selecter-item" href="profile-interests.html">Interesses</a><a class="selecter-item" href="profile-settings.html">Instellingen</a><!--<a class="selecter-item" href="profile-colleagues.html">Vakgenoten</a>--></div></div>
    </div>
  </div>
<div class="rhs-container">
  <div class="rhs-profile-blocks">
    <div class="rhs-profile-block">
      <div class="rhs-row">
        <div class="rhs-col-lg-2 rhs-col-sm-3"><a data-modal-id="#modal-profile-photo" class="rhs-profile-image rhs-profile-image--url js-toggleModal"><img src="<?php echo $user->getIconURL('large') ?>" alt="<?php echo $user->name ?>" title="<?php echo $user->name ?>" class="rhs-profile-image__img"></a></div>
        <div class="rhs-col-lg-1 rhs-col-sm-1"></div>
        <div class="rhs-col-lg-6 rhs-col-sm-8">
          <div class="js-editableFields"><a class="js-editableFieldsToggle">Bewerk velden</a>
            <dl class="rhs-profile-information">
              <?php foreach ($fields as $field) : ?>
                <?php 
                  if ($field["name"] != 'overmij' && $field["name"] != 'werklocatie') :
                ?>
                  <dt><?php echo $field["label"] ?></dt>
                  <dd data-type="<?php echo $field["type"] ?>" data-name="<?php echo $field["name"] ?>" data-value="<?php echo $field["value"] ?>" data-placeholder="<?php echo $field["label"] ?>" class="js-editableField"><?php echo $field["value"] ?></dd>
                <?php endif ?>
            <?php endforeach ?>
            </dl>
          </div>
        </div>
        <div class="rhs-col-lg-3 rhs-col-xs-12 rhs-col-xs-8 rhs-col-sm-offset-4 rhs-col-lg-offset-0">
          <div class="rhs-profile-progress">
            <p class="rhs-profile-progress__bar rhs-profile-progress__bar--level-2" style="width: <?php echo profile_manager_profile_completeness($user)["percentage_completeness"] ?>%;"><span class="rhs-profile-progress__bar-text">Redelijk profiel</span></p>
            <dl class="rhs-profile-progress__statistics">
              <dt>Vragen gesteld</dt>
              <dd>5</dd>
              <dt>Antwoorden gegevens</dt>
              <dd>9</dd>
              <dt>Stem omhoogs</dt>
              <dd>42</dd>
              <dt>Stem omlaags</dt>
              <dd>1</dd>
            </dl>
          </div>
        </div>
      </div>
    </div>
    <div class="rhs-profile-block rhs-profile-block--no-bottom-padding rhs-profile-block--icon-building">
      <div class="rhs-row">
        <div class="rhs-col-sm-4 rhs-col-lg-3"> </div>
        <div class="rhs-col-sm-8 rhs-col-lg-6">
          <div class="js-editableFields"><a class="js-editableFieldsToggle">Bewerk velden</a>
            <dl class="rhs-profile-information">
              <dt>Werklocatie</dt>
              <?php foreach ($fields as $field) : ?>
                <?php 
                  if ($field["name"] == 'werklocatie') :
                ?>
                  <dd data-name="location" data-value="<?php $field["value"] ?>" class="js-editableField"><a class="editable-field-link <?php echo strlen($field["value"]) > 0 ? '' : 'editable-field-link--empty js-openEditableField' ?>" href="#Edit field" title="Update veld"><?php $field["value"] ?></a></dd>
                <?php endif ?>
            <?php endforeach ?>
            </dl>
          </div>
          <div class="rhs-profile-about"><strong>Over mij</strong>
            <div data-editable-text="" class="rhs-editable-text">
              <?php foreach ($fields as $field) : ?>
                <?php 
                  if ($field["name"] == 'overmij') :
                ?>
                  <div class="rhs-editable-text__content <?php echo strlen($field["value"]) > 0 ? '' : 'editable-field-link--empty js-openEditableField' ?>">
                    <?php echo $field["value"] ?>
                  </div>
                  <form class="rhs-editable-text__editor"> 
                    <textarea id="js-initiateTinymce">
                      <?php echo $field["value"] ?>
                    </textarea>
                    <div class="rhs-form__actions rhs-form__under-tinymce"><a href="/profile.html" class="rhs-button rhs-button--grey">Annuleer</a>
                      <button class="rhs-button rhs-button--primary">Opslaan</button>
                    </div>
                  </form>
                <?php endif ?>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>