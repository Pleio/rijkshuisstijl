<?php
  $user = elgg_get_page_owner_entity();
  if (!$user) 
  {
    register_error(elgg_echo("profile:notfound"));
    forward();
  }

  $fields = elgg_extract("fields", $vars);
  $username = elgg_extract("username", $vars);
  $targetUser = get_user_by_username($username);
  if (!$targetUser) 
  {
    register_error(elgg_echo("profile:notfound"));
    forward();
  }

  $editable = $targetUser->canEdit();

  /*$answer_options = array(
    "type" => "object",
    "subtype" => $answer_subtype,
    "container_guid" => $question->getGUID(),
    "count" => true
  );

  $num_answers = elgg_get_entities($answer_options);*/
?>

<script type="text/javascript">
  var gUsername = '<?php echo $username ?>';

  function onEditableTextComplete(event, save)
  {
      event.preventDefault();
      event.stopPropagation();
      var editableTextTrigger = $('[data-editable-text]');

      if (editableTextTrigger.hasClass('rhs-editable-text--editing')) 
      {
          editableTextTrigger.removeClass('rhs-editable-text--editing');
      }

      if (save)
      {
          elgg.action('rijkshuisstijl/profile/setprofilefield', {
          data: {
            username: '<?php echo $username ?>',
            name: 'aboutme',
            value: '"' + $('textarea').val().replace("\"","\\\"") + '"'
          },
          success: function (wrapper) {
            if (wrapper.output) {
              if (wrapper.output.success == false)
                alert('An error occurred setting the value.');
            } else {
              // the system prevented the action from running
            }
          }
        });

        $('.rhs-editable-text__content').html($('textarea').val());
      }
      else
      {
        $('textarea').val($('.rhs-editable-text__content').html());
      }
  }
</script>

<div class="rhs-container">
  <div class="rhs-profile-blocks">
    <div class="rhs-profile-block">
      <div class="rhs-row">
        <div class="rhs-col-lg-2 rhs-col-sm-3"><a data-modal-id="#modal-profile-photo" class="rhs-profile-image rhs-profile-image--url js-toggleModal"><img src="<?php echo $user->getIconURL('large') ?>" alt="<?php echo $user->name ?>" title="<?php echo $user->name ?>" class="rhs-profile-image__img"></a></div>
        <div class="rhs-col-lg-1 rhs-col-sm-1"></div>
        <div class="rhs-col-lg-6 rhs-col-sm-8">
          <div class="js-editableFields"><?php if ($editable) : ?><a class="js-editableFieldsToggle">Bewerk velden</a><?php endif; ?>
            <dl class="rhs-profile-information">
              <?php foreach ($fields as $field) : ?>
                <?php 
                  if ($field["category"] == 'profiel') :
                ?>
                  <dt><?php echo $field["label"] ?></dt>
                  <dd data-type="<?php echo $field["type"] ?>" data-name="<?php echo $field["name"] ?>" data-value="<?php echo $field["value"] ?>" data-placeholder="<?php echo $field["label"] ?>" <?php echo $editable ? 'class="js-editableField"' : ''?>><?php echo $field["value"] ?></dd>
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
          <div class="js-editableFields"><?php if ($editable) : ?><a class="js-editableFieldsToggle">Bewerk velden</a><?php endif; ?>
            <dl class="rhs-profile-information">
              <dt>Werklocatie</dt>
              <?php foreach ($fields as $field) : ?>
                <?php 
                  if ($field["category"] == 'profielLocatie' && $field["name"] != 'overmij') :
                ?>
                  <dd data-name="<?php echo $field["name"] ?>" data-value="<?php echo $field["value"] ?>" <?php echo $editable ? 'class="js-editableField"' : ''?>><?php echo $field["value"] ?></dd>
                <?php endif ?>
            <?php endforeach ?>
            </dl>
          </div>
          <div class="rhs-profile-about"><strong>Over mij</strong>
            <?php if ($editable) : ?>
              <div data-editable-text class="rhs-editable-text">
                <div class="rhs-editable-text__content"><?php echo isset($user->aboutme) ? $user->aboutme : "Empty" ?></div>
                <form class="rhs-editable-text__editor">
                  <div>
                    <textarea class="elgg-input-plaintext" id="js-initiateTinymce"><?php echo isset($user->aboutme) ? $user->aboutme : "" ?></textarea>
                  </div>
                  <div class="rhs-form__actions rhs-form__under-tinymce" style="position: initial;"><a href="#" class="rhs-button rhs-button--grey" onclick="onEditableTextComplete(event, false)">Annuleer</a>
                    <button class="rhs-button rhs-button--primary" onclick="onEditableTextComplete(event, true)">Opslaan</button>
                  </div>
                </form>
              </div>
            <?php else : ?>
              <p><?php echo isset($user->aboutme) ? $user->aboutme : "" ?></p>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>