<div class="rhs-sections">
    <div class="rhs-section rhs-section--no-padding">
        <div class="rhs-container">
            <div class="rhs-bulletin-action">
                <h2 class="rhs-forum__title hidden-md hidden-lg hidden-xl"><?php echo elgg_echo('pinboard'); ?></h2>
                <div class="rhs-row">
                    <div class="rhs-col-md-4 rhs-col-lg-3 rhs-col-lg-offset-3 rhs-pull-right">
                        <a href="#" title="Een nieuwe vraag stellen" data-modal-id="#modal-item" class="js-toggleModal rhs-button rhs-button--primary rhs-button--inline rhs-bulletin-action__add-button">+ <span>Plaats een bericht</span></a>
                    </div>
                    <div class="rhs-col-md-4 rhs-col-lg-3">
                        <form>
                            <?php echo elgg_view("rijkshuisstijl/input/pinboard_category"); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rhs-section rhs-section--background-grey">
        <div class="rhs-container">
            <div class="rhs-row">
                <?php echo $vars['entities']; ?>
            </div>
        </div>
    </div>
</div>

<div id="modal-item" tabindex="0" class="rhs-modal" style="display: none;">
  <div data-modal-id="#modal-item" class="rhs-modal__background js-toggleModal"></div>
  <div class="rhs-modal__box">
    <button data-modal-id="#modal-item" class="rhs-modal__close js-toggleModal">Sluit modal</button>
    <h2 class="rhs-modal__title">Plaats een bericht</h2>
    <div class="rhs-modal__content">
        <?php echo elgg_view_form('pinboard/save'); ?>
    </div>
  </div>
</div>