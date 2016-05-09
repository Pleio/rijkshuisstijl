<?php $site = elgg_get_site_entity(); ?>

<div class="rhs-lead rhs-lead--forum">
        <div style="background-image: url('/mod/rijkshuisstijl/assets/image/lead.jpg')" class="rhs-lead__background"></div>
        <div class="rhs-lead__content">
          <div class="rhs-container">
            <div class="rhs-forum-action">
              <div class="rhs-row">
                <div class="rhs-col-xs-6 rhs-col-md-8 rhs-col-lg-9">
                  <h1 class="rhs-forum-action__title">Forum</h1>
                </div>
                <div class="rhs-col-xs-6 rhs-col-md-4 rhs-col-lg-3">
                  <div class="rhs-forum-action__indicator">
                    <p><span id="amout-of-users"><?php $usersOnline = count(find_active_users()); echo $usersOnline ?></span> <span class="hidden-mobile">gebruiker<?php echo $usersOnline == 1 ? "" : "s" ?></span> online <span class="rhs-icon rhs-icon-community"> </span></p>
                  </div>
                </div>
              </div>
              <div class="rhs-row">
                <div class="rhs-col-md-8 rhs-col-lg-9">
                  <div class="rhs-forum-action__search">
                    <form action="search-results.html" data-autocomplete="" class="rhs-forum-action__search">
                      <label for="lead-search" class="rhs-forum-action__search__label"><span class="rhs-icon-circle-arrow"></span><span class="rhs-icon-search"></span></label>
                      <button type="submit" class="rhs-autocomplete__submit-button"><span class="rhs-icon-search"></span></button>
                      <input name="s" id="lead-search" placeholder="Zoeken" autocomplete="off" data-autocomplete-input="" class="rhs-forum-action__search__input">
                      <div class="rhs-autocomplete">
                        <div class="rhs-autocomplete__results"></div>
                        <button type="submit" class="rhs-autocomplete__more">Bekijk alle resultaten</button>
                      </div>
                    </form>
                  </div>
                </div>
                    <div class="rhs-col-md-4 rhs-col-lg-3"><span class="rhs-forum-action__separate-text">of</span><a href="/questions/add/<?php echo $group->guid ?>" data-modal-id="#modal-item" class="js-toggleModal rhs-button rhs-button--primary rhs-button--inline rhs-forum-action__button">+ Een vraag stellen</a>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>