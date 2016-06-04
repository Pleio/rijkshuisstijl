<?php
  $user = elgg_get_logged_in_user_entity();
  if (!$user) 
  {
    register_error(elgg_echo("profile:notfound"));
    forward();
  }

  $fields = elgg_extract("fields", $vars);
  $username = elgg_extract("username", $vars);
  $targetUser = get_user_by_username($username);

  if (!$targetUser) {
    register_error(elgg_echo("profile:notfound"));
    forward();
  }

  $editable = $targetUser->canEdit();
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
  <div class="rhs-sections rhs-sections--large-top-padding">
    <div class="rhs-section rhs-section--item rhs-section--background-transparent">
      <div class="rhs-profile-block">
        <div class="rhs-row">
          <div class="rhs-col-lg-2 rhs-col-sm-3">
            <?php 
              if ($editable)
                echo '<a data-modal-id="#modal-item" class="rhs-profile-image rhs-profile-image--url js-toggleModal">';
              else
                echo '<div class="rhs-profile-image">'
            ?>          
            
            <img src="<?php echo $targetUser->getIconURL('large') ?>" alt="<?php echo $targetUser->name ?>" title="<?php echo $targetUser->name ?>" class="rhs-profile-image__img">

            <?php
              if ($editable)
                echo '</a>';
              else
                echo '</div>';
            ?>
          </div>
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
              <p class="rhs-profile-progress__bar rhs-profile-progress__bar--level-<?php echo $vars['completeness']; ?>">
                <span class="rhs-profile-progress__bar-text"><?php echo elgg_echo("rijkshuisstjil:completeness:" . $vars['completeness']); ?></span>
              </p>
                <dl class="rhs-profile-progress__statistics">
                  <dt><?php echo elgg_echo('rijkshuisstijl:profile:questionsasked') ?></dt>
                  <dd><?php echo $vars['number_questions']; ?></dd>
                  <dt><?php echo elgg_echo('rijkshuisstijl:profile:answersgiven') ?></dt>
                  <dd><?php echo $vars['number_answers']; ?></dd>
                  <dt><?php echo elgg_echo('rijkshuisstijl:profile:upvotes') ?></dt>
                  <dd><?php echo $vars['number_upvotes']; ?></dd>
                  <dt><?php echo elgg_echo('rijkshuisstijl:profile:downvotes') ?></dt>
                  <dd><?php echo $vars['number_downvotes']; ?></dd>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="rhs-section rhs-section--item rhs-section--background-transparent">
      <div class="rhs-profile-block rhs-profile-block--no-bottom-padding rhs-profile-block--icon-building">
        <div class="rhs-row">
          <div class="rhs-col-sm-4 rhs-col-lg-3"> </div>
          <div class="rhs-col-sm-8 rhs-col-lg-6">
            <div class="js-editableFields"><?php if ($editable) : ?><a class="js-editableFieldsToggle">Bewerk velden</a><?php endif; ?>
              <dl class="rhs-profile-information">
                <dt><?php echo elgg_echo('rijkshuisstijl:profile:worklocation') ?></dt>
                <?php foreach ($fields as $field) : ?>
                  <?php 
                    if ($field["category"] == 'profielLocatie' && $field["name"] != 'overmij') :
                  ?>
                    <dd data-name="<?php echo $field["name"] ?>" data-value="<?php echo $field["value"] ?>" <?php echo $editable ? 'class="js-editableField"' : ''?>><?php echo $field["value"] ?></dd>
                  <?php endif ?>
              <?php endforeach ?>
              </dl>
            </div>
            <div class="rhs-profile-about"><strong><?php echo elgg_echo('rijkshuisstijl:profile:aboutme') ?></strong>
              <?php if ($editable) : ?>
                <div data-editable-text class="rhs-editable-text">
                  <div class="rhs-editable-text__content"><?php echo isset($targetUser->aboutme) ? $targetUser->aboutme : "Leeg" ?></div>
                  <form class="rhs-editable-text__editor">
                    <div>
                      <textarea class="elgg-input-plaintext" id="js-initiateTinymce"><?php echo isset($targetUser->aboutme) ? $targetUser->aboutme : "" ?></textarea>
                    </div>
                    <div class="rhs-form__actions rhs-form__under-tinymce" style="position: initial;"><a href="#" class="rhs-button rhs-button--grey" onclick="onEditableTextComplete(event, false)">Annuleer</a>
                      <button class="rhs-button rhs-button--primary" onclick="onEditableTextComplete(event, true)">Opslaan</button>
                    </div>
                  </form>
                </div>
              <?php else : ?>
                <p><?php echo isset($targetUser->aboutme) ? $targetUser->aboutme : "" ?></p>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="modal-item" tabindex="0" class="rhs-modal">
    <div data-modal-id="#modal-item" class="rhs-modal__background js-toggleModal"></div>
    <div class="rhs-modal__box"> 
      <button data-modal-id="#modal-item" class="rhs-modal__close js-toggleModal">Sluit modal</button>
      <h2 class="rhs-modal__title">Upload een avatar</h2>
      <div class="rhs-modal__content">
        <?php 
          echo elgg_view('core/avatar/upload', array('entity' => $targetUser));

          // only offer the crop view if an avatar has been uploaded
          /*if (isset($targetUser->icontime))
            echo elgg_view('core/avatar/crop', array('entity' => $targetUser));*/
        ?>
      </div>
    </div>
  </div>
</div>