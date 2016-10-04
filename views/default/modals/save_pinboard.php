<?php
$entity = elgg_extract("entity", $vars);
?>

<div id="modal-item" tabindex="0" class="rhs-modal">
    <div data-modal-id="#modal-item" class="rhs-modal__background js-toggleModal">
    </div>
    <div class="rhs-modal__box">
        <button data-modal-id="#modal-item" class="rhs-modal__close js-toggleModal">
            <?php echo elgg_echo("rijkshuisstijl:closemodal") ?>
        </button>
        <h2 class="rhs-modal__title">
            <?php if ($entity): ?>
                <?php echo elgg_echo("rijkshuisstijl:pinboard:edit"); ?>
            <?php else: ?>
                <?php echo elgg_echo("rijkshuisstijl:pinboard:add"); ?>
            <?php endif; ?>
        </h2>
        <div class="rhs-modal__content">
            <?php echo elgg_view_form("pinboard/save", array(), $vars); ?>
        </div>
    </div>
</div>