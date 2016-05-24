<?php
$site = elgg_get_site_entity();
$users_online = count(find_active_users());
?>

<div class="rhs-lead rhs-lead--forum">
  <div style="background-image: url('<?php echo rijkshuisstijl_asset("image/lead.jpg"); ?>')" class="rhs-lead__background"></div>
  <div class="rhs-lead__content">
    <div class="rhs-container">
      <div class="rhs-forum-action">
        <div class="rhs-row">
          <div class="rhs-col-xs-6 rhs-col-md-8 rhs-col-lg-9">
            <h1 class="rhs-forum-action__title"><?php echo elgg_echo("rijkshuisstijl:forum"); ?></h1>
          </div>
          <div class="rhs-col-xs-6 rhs-col-md-4 rhs-col-lg-3">
            <div class="rhs-forum-action__indicator">
              <p>
                <span id="amount-of-users">
                  <?php echo $users_online; ?>
                </span>
                <span class="hidden-mobile">
                  <?php echo $users_online == 1 ? elgg_echo("rijkshuisstijl:user_online") : elgg_echo("rijkshuisstijl:users_online"); ?>
                </span>
                <span class="rhs-icon rhs-icon-community"></span>
              </p>
            </div>
          </div>
        </div>
        <div class="rhs-row">
          <div class="rhs-col-md-8 rhs-col-lg-9">
            <div class="rhs-forum-action__search">
              <form action="/search" data-autocomplete="" class="rhs-forum-action__search">
                <label for="lead-search" class="rhs-forum-action__search__label"><span class="rhs-icon-circle-arrow"></span><span class="rhs-icon-search"></span></label>
                <button type="submit" class="rhs-autocomplete__submit-button"><span class="rhs-icon-search"></span></button>
                <input name="q" id="lead-search" placeholder="Zoeken" autocomplete="off" data-autocomplete-input="" class="rhs-forum-action__search__input">
                <div class="rhs-autocomplete">
                  <div class="rhs-autocomplete__results"></div>
                  <button type="submit" class="rhs-autocomplete__more"><?php echo elgg_echo("rijkshuisstijl:search:view_all_results"); ?></button>
                </div>
              </form>
            </div>
          </div>
              <div class="rhs-col-md-4 rhs-col-lg-3">
              <span class="rhs-forum-action__separate-text">
                <?php echo elgg_echo("rijkshuisstijl:or"); ?>
              </span>
                <button class="rhs-button rhs-button--primary rhs-button--inline rhs-forum-action__button js-toggleModal" data-modal-id="#modal-item">
                  + <?php echo elgg_echo("rijkshuisstijl:ask_question"); ?>
                </button>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>