<?php
$category = get_input("category");
$category_options = array(
    'all' => 'Alles',
    'most_viewed' => 'Meest bekeken',
    'mine' => 'Mijn vragen'
    );

    ?>

    <div class="rhs-sections">
        <div class="rhs-section rhs-section--background-white rhs-section--no-padding">
            <div class="rhs-bulletin-action">
                <div class="rhs-container">
                    <h1 class="rhs-forum__title">
                        <?php echo $vars['title']; ?>
                    </h1>
                    <div class="rhs-row">
                        <?php if(elgg_is_logged_in()): ?>
                            <div class="rhs-col-md-4 rhs-col-lg-3 rhs-col-lg-offset-3 rhs-pull-right">
                                <button class="js-toggleModal rhs-button rhs-button--primary rhs-button--inline rhs-bulletin-action__add-button" data-modal-id="#modal-item">
                                    + <?php echo elgg_echo("rijkshuisstijl:question:add"); ?>
                                </button>
                            </div>
                        <?php endif; ?>
                        <form>
                            <div class="rhs-col-md-4 rhs-col-lg-3">
                                <div class="rhs-forum__filter">
                                    <?php echo elgg_view("rijkshuisstijl/input/forum_category"); ?>
                                </div>
                            </div>
                            <div class="rhs-col-md-4 rhs-col-lg-3">
                                <div class="rhs-forum__filter">
                                    <?php echo elgg_view("rijkshuisstijl/input/topic"); ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="rhs-section rhs-section--background-grey">
            <div class="rhs-container">
                <?php echo $vars['entities']; ?>
            </div>
        </div>
    </div>

    <?php echo elgg_view("modals/save_question"); ?>