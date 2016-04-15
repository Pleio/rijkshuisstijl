<div class="rhs-main-navigation__wrapper rhs-mobile-navigation">
    <!-- @todo: fix this!! -->
    <a href="profile.html" title="profiel" class="rhs-mobile-navigation__profile"><img src="<?php echo rijkshuisstijl_asset('image/profile-picture.jpg'); ?>">Sarah Hendriks</a>
    <div data-mobile-nav-trigger="" class="rhs-mobile-navigation__close"><span class="rhs-icon rhs-icon-cross"></span></div>
    <div class="rhs-mobile-navigation__search">
        <form action="">
            <label for="mobile-navigation-search"><span class="rhs-icon rhs-icon-search"></span></label>
            <input id="mobile-navigation-search" placeholder="Zoeken" name="searchQuery">
        </form>
    </div>

    <?php echo elgg_view_menu('site'); ?>

    <!-- <div class="rhs-dropdown"><a href="index.html" title="..." data-dropdown-trigger="" class="rhs-main-navigation__link rhs-main-navigation-dropdown rhs-dropdown__trigger">Thema's</a>
        <div class="rhs-dropdown__wrapper">
        <div class="rhs-dropdown__mobile"><a href="#" class="rhs-dropdown__back">Terug</a>
            <div class="rhs-dropdown__subject">Thema's</div>
        </div>
        <a href="theme.html" class="rhs-dropdown__link">Inkomstenbelasting</a><a href="theme.html" class="rhs-dropdown__link">Loonheffingen</a><a href="theme.html" class="rhs-dropdown__link">Omzetbelasting</a><a href="theme.html" class="rhs-dropdown__link">Toeslagen</a><a href="theme.html" class="rhs-dropdown__link">Toeslagen</a><a href="theme.html" class="rhs-dropdown__link">Vennootschapsbelasting</a>
        </div>
    </div> -->
      <div class="rhs-main-navigation__mobile">
        <div class="rhs-dropdown"><a href="index.html" title="..." data-dropdown-trigger="" class="rhs-main-navigation__link rhs-main-navigation-dropdown rhs-dropdown__trigger">Inloggen</a>
          <div class="rhs-dropdown__wrapper">
            <div class="rhs-dropdown__mobile"><a href="#" class="rhs-dropdown__back">Terug</a>
              <div class="rhs-dropdown__subject">Inloggen</div>
            </div><a href="#" class="rhs-dropdown__link">Pleio</a><a href="#" class="rhs-dropdown__link">Alle deelsites</a><a href="#" class="rhs-dropdown__link">Mijn deelsites</a>
          </div>
        </div>
      </div>
</div>
<a href="#" title="..." data-nav-search-trigger="" class="rhs-main-navigation__link rhs-main-navigation__link--search"><span class="rhs-icon-search rhs-main-navigation__link--search__icon"></span><span class="rhs-main-navigation__link__text">Zoeken</span></a>
<div class="rhs-mobile-navigation-bar">
    <div data-mobile-nav-trigger="" class="rhs-mobile-navigation-bar__trigger"><span class="rhs-icon rhs-icon-mobile-menu"></span><span class="rhs-mobile-navigation-bar__span">Menu</span></div>
</div>