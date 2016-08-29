<?php
$site = elgg_get_site_entity();
?>

<div class="rhs-lead rhs-lead--home">
  <div style="background-image:url('<?php echo rijkshuisstijl_asset("image/leaders/home.jpg"); ?>');" class="rhs-lead__background"></div>
  <div class="rhs-container">
    <h1 class="rhs-home__title"><?php echo $site->name; ?></h1>
    <p class="rhs-home__subtitle visible-md visible-xl visible-lg"><?php echo $site->description; ?></p>
    <form action="/search" data-autocomplete="" class="rhs-lead__search">
      <label for="lead-search" class="rhs-lead__search__label"><span class="rhs-icon-circle-arrow"></span><span class="rhs-icon-search"></span></label>
      <button type="submit" class="rhs-autocomplete__submit-button"><span class="rhs-icon-search"></span></button>
      <input name="q" id="lead-search" placeholder="<?php echo elgg_echo("search"); ?>" autocomplete="off" data-autocomplete-input="" class="rhs-lead__search__input">
      <div class="rhs-autocomplete">
        <div class="rhs-autocomplete__results"></div>
        <button type="submit" class="rhs-autocomplete__more"><?php echo elgg_echo("rijkshuisstijl:search:view_all_results"); ?></button>
      </div>
    </form>
  </div>
</div>