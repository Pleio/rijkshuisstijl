<div class="rhs-sections">
    <div class="rhs-section rhs-section--background-white rhs-section--no-padding">
        <div class="rhs-container">
            <div class="rhs-bulletin-action">
                <h2 class="rhs-forum__title hidden-md hidden-lg hidden-xl"><?php echo elgg_echo("pinboard"); ?></h2>
                <div class="rhs-row">
                    <div class="rhs-col-md-4 rhs-col-lg-3 rhs-col-lg-offset-3 rhs-pull-right">
                        <a href="#" title="<?php echo elgg_echo("rijkshuisstijl:pinboard:add"); ?>" data-modal-id="#modal-item" class="js-toggleModal rhs-button rhs-button--primary rhs-button--inline rhs-bulletin-action__add-button">+ <span><?php echo elgg_echo("rijkshuisstijl:pinboard:add"); ?></span></a>
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
                <?php echo $vars["entities"]; ?>
            </div>
        </div>
    </div>
</div>

<?php echo elgg_view("modals/save_pinboard"); ?>