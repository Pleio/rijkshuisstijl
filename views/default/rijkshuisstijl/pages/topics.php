<?php
$group = $vars['group'];
?>

<div class="rhs-sections">
  <div class="rhs-section rhs-section--item-even">
    <div class="rhs-container">
      <h2 class="rhs-section__subtitle">Forum</h2>
      <a href="/questions/all" title="..." class="rhs-section__read-more">
        <?php echo elgg_echo("rijkshuisstijl:all"); ?>
      </a>
      <div class="rhs-row">
        <div class="rhs-col-lg-6">
          <div data-accordion-item="" class="rhs-card-list rhs-card-list--margin-bottom">
            <h3 data-accordion-trigger="" class="rhs-card-list__title">
              <?php echo elgg_echo("rijkshuisstijl:recent_questions"); ?>
            </h3>
            <div class="rhs-card-list__content">
              <?php
                foreach (rijkshuisstijl_get_latest_objects_from_group('question', $group) as $question)
                  echo elgg_view("rijkshuisstijl/elements/forum_question_row", array('question' => $question));
              ?>
              <a href="/questions/all?topic=<?php echo $group->guid; ?>" title="<?php echo elgg_echo("rijkshuisstijl:all"); ?>" class="rhs-read-more rhs-card-list__read-more">
                <span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>
                <?php echo elgg_echo("rijkshuisstijl:all"); ?>
              </a>
            </div>
          </div>
        </div>
        <div class="rhs-col-lg-6">
          <div data-accordion-item="" class="rhs-card-list rhs-card-list--margin-bottom">
            <h3 data-accordion-trigger="" class="rhs-card-list__title">
              <?php echo elgg_echo("rijkshuisstijl:popular_questions"); ?>
            </h3>
            <div class="rhs-card-list__content">
              <?php
                foreach (rijkshuisstijl_get_popular_objects_from_group('question', $group) as $question)
                  echo elgg_view("rijkshuisstijl/elements/forum_question_row", array('question' => $question));
              ?>
              <a href="/questions/all?category=most_viewed&topic=<?php echo $group->guid; ?>" title="Bekijk alles" class="rhs-read-more rhs-card-list__read-more">
              <span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>
              <?php echo elgg_echo("rijkshuisstijl:all"); ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="rhs-section rhs-section--background-grey">
      <div class="rhs-container">
          <?php echo elgg_view('rijkshuisstijl/elements/news', array(
              'group' => $group,
              'show_title' => true
          )); ?>
      </div>
  </div>

  <div class="rhs-section">
    <div class="rhs-container">
      <h2 class="rhs-section__subtitle">Video’s</h2><a href="forum.html" title="..." class="rhs-section__read-more">Alles</a>
      <div class="rhs-row">
        <div class="rhs-col-md-12">
          <div data-video-block="" class="rhs-video-block">
            <div class="rhs-video-block__right">
              <div style="background-image:url('asset/image/dummy-video.jpg');" class="rhs-video-block__background"><a href="#" title="Speel video af" data-video-block-trigger="" data-video-type="youtube" data-video-id="77-pNVbE0Uw" class="rhs-video-block__play"><span class="rhs-icon rhs-icon-play"></span></a></div>
              <div class="rhs-video-block__menu"><a href="#" title="Sluit overzicht" data-video-block-trigger="" class="rhs-video-block__menu-close"><span class="rhs-icon rhs-icon-cross"></span></a>
                <div class="rhs-video-block__title">Kwalificerende buitenlandse belastingplicht</div>
                <div class="rhs-video-block__list">
                  <div class="rhs-row">
                    <div class="rhs-col-md-6">
                      <div class="rhs-video-block__item"><a href="#" title="" data-video-type="youtube" data-video-id="77-pNVbE0Uw" class="rhs-video-block__link visited"><span>1.</span> Inleiding en programma</a></div>
                      <div class="rhs-video-block__item"><a href="#" title="" data-video-type="youtube" data-video-id="JE02wDcx5Rw" class="rhs-video-block__link"><span>2.</span> Inleiding en programma</a></div>
                      <div class="rhs-video-block__item"><a href="#" title="" data-video-type="youtube" data-video-id="dQw4w9WgXcQ" class="rhs-video-block__link"><span>3.</span> Inleiding en programma</a></div>
                      <div class="rhs-video-block__item"><a href="#" title="" data-video-type="vimeo" data-video-id="116170883" class="rhs-video-block__link"><span>4.</span> Inleiding en programma</a></div>
                      <div class="rhs-video-block__item"><a href="#" title="" data-video-type="vimeo" data-video-id="116170883" class="rhs-video-block__link"><span>5.</span> Inleiding en programma</a></div>
                    </div>
                    <div class="rhs-col-md-6">
                      <div class="rhs-video-block__item"><a href="#" title="" data-video-type="vimeo" data-video-id="116170883" class="rhs-video-block__link"><span>6.</span> Inleiding en programma</a></div>
                      <div class="rhs-video-block__item"><a href="#" title="" data-video-type="vimeo" data-video-id="116170883" class="rhs-video-block__link"><span>7.</span> Inleiding en programma</a></div>
                      <div class="rhs-video-block__item"><a href="#" title="" data-video-type="vimeo" data-video-id="116170883" class="rhs-video-block__link"><span>8.</span> Inleiding en programma</a></div>
                      <div class="rhs-video-block__item"><a href="#" title="" data-video-type="vimeo" data-video-id="116170883" class="rhs-video-block__link"><span>9.</span> Inleiding en programma</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="rhs-video-block__left">
              <div class="rhs-video-block__meta"><span class="rhs-video-block__date">2016</span> <span class="rhs-video-block__subject">| Inkomstenbelasting</span></div>
              <h2 class="rhs-video-block__title">Kwalificerende buitenlandse belastingplicht</h2><a href="#" title="Alle hoofdstukken bekijken" data-video-block-trigger="" class="rhs-read-more rhs-video-block__readmore"><span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>Alle hoofdstukken</a><a href="#" title="Alle hoofdstukken bekijken" data-video-block-trigger="" class="rhs-read-more rhs-video-block__readmore rhs-video-block__back"><span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>Ga terug</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>