<div id="modal-item" tabindex="0" class="rhs-modal">
    <div data-modal-id="#modal-item" class="rhs-modal__background js-toggleModal">
    </div>
    <div class="rhs-modal__box">
        <button data-modal-id="#modal-item" class="rhs-modal__close js-toggleModal">
            <?php echo elgg_echo("rijkshuisstijl:forum:closemodal") ?>
        </button>
        <h2 class="rhs-modal__title">
            <?php echo elgg_echo("rijkshuisstijl:ask_question") ?>
        </h2>
        <div class="rhs-modal__content">
            <?php if(elgg_is_active_plugin("questions")): ?>
                <?php echo elgg_view_form('object/question/save', array(
                    'class' => 'js-validateForm js-validateItemForm'
                    )); ?>
            <?php endif; ?>
        </div>
    </div>
</div>