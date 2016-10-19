<?php $logged_in = elgg_get_logged_in_user_entity(); ?>

<nav class="rhs-main-navigation">
    <div class="rhs-container">
        <div class="rhs-main-navigation__wrapper rhs-mobile-navigation">
            <?php if ($logged_in): ?>
                <a href="/profile/<?php echo $logged_in->username;?>" title="profiel" class="rhs-mobile-navigation__profile"><img src="<?php echo $logged_in->getIconURL('tiny'); ?>"><?php echo $logged_in->name; ?></a>
                <div data-mobile-nav-trigger class="rhs-mobile-navigation__close"><span class="rhs-icon rhs-icon-cross"></span></div>
                <div class="rhs-mobile-navigation__search">
                    <form action="/search" method="GET">
                        <label for="mobile-navigation-search"><span class="rhs-icon rhs-icon-search"></span></label>
                        <input id="mobile-navigation-search" placeholder="Zoeken" name="q">
                    </form>
                </div>
            <?php endif ?>

            <?php echo elgg_view_menu('site', array(
                'sort_by' => 'priority'
            )); ?>
        </div>
        <a href="#" title="<?php echo elgg_echo('search'); ?>" data-nav-search-trigger class="rhs-main-navigation__link rhs-main-navigation__link--search"><span class="rhs-icon-search rhs-main-navigation__link--search__icon"></span><span class="rhs-main-navigation__link__text"><?php echo elgg_echo('search'); ?></span></a>
        <div class="rhs-mobile-navigation-bar">
            <div data-mobile-nav-trigger="" class="rhs-mobile-navigation-bar__trigger"><span class="rhs-icon rhs-icon-mobile-menu"></span><span class="rhs-mobile-navigation-bar__span">Menu</span></div>
        </div>
    </div>
    <form action="/search" data-nav-search="rhs-main-nav-search--open" data-nav-search-form="" class="rhs-main-nav-search">
        <div class="rhs-container rhs-main-nav-search__container">
          <label for="nav-search" class="rhs-main-nav-search__label"><span class="rhs-icon rhs-icon-search"></span></label>
          <input id="nav-search" name="q" type="text" maxlength="60" autocomplete="off" data-nav-search-input="" class="rhs-main-nav-search__input"><a href="#" data-nav-search-close="" class="rhs-main-nav-search__close"><?php echo elgg_echo('rijkshuisstijl:close'); ?></a>
        </div>
    </form>
</nav>
