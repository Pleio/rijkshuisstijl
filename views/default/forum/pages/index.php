<?php
$group = elgg_get_page_owner_entity();
$user = elgg_get_logged_in_user_entity();
$interests = rijkshuisstijl_get_interests($user);
?>

<div class="rhs-sections">
    <div class="rhs-section rhs-section--item-even rhs-section--padding-top">
        <div class="rhs-container">
            <?php echo elgg_view("rijkshuisstijl/elements/forum", array(
                'display_title' => false
            )); ?>
        </div>
    </div>
</div>

<div id="modal-item" tabindex="0" class="rhs-modal" style="display: none;">
  <div data-modal-id="#modal-item" class="rhs-modal__background js-toggleModal"></div>
  <div class="rhs-modal__box">
    <button data-modal-id="#modal-item" class="rhs-modal__close js-toggleModal">Sluit modal</button>
    <h2 class="rhs-modal__title">Plaats een bericht</h2>
    <div class="rhs-modal__content">
        <?php echo elgg_view_form('object/question/save', array(
            'class' => 'js-validateForm js-validateItemForm'
        )); ?>
    </div>
  </div>
</div>