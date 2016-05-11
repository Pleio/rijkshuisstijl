<?php
$groups = rijkshuisstijl_get_featured_groups();
?>

<div class="rhs-home__section">
  <div class="rhs-container">
    <div class="rhs-row">
      <div class="rhs-col-md-12">
        <h2 class="rhs-home__subtitle">Forum</h2><a href="/forum" title="..." class="rhs-home__readmore"><?php echo elgg_echo("rijkshuisstijl:all"); ?></a>
      </div>
    </div>
    <div class="rhs-row">
      <?php foreach ($groups as $group): ?>
        <div class="rhs-col-lg-6">
          <div data-accordion-item="" class="rhs-card-list">
            <h3 data-accordion-trigger="" class="rhs-card-list__title"><?php echo $group->name; ?></h3>
            <div class="rhs-card-list__content">
              <?php foreach (rijkshuisstijl_get_latest_objects_from_group('question', $group) as $question): ?>
                <a href="<?php echo $question->getURL(); ?>" title="..." class="rhs-card-list__item">
                  <table class="rhs-card-list__table">
                    <tbody>
                      <tr>
                        <td class="rhs-card-list__date"><?php echo strftime("%e %b", $question->time_created); ?></td>
                        <td class="rhs-card-list__text" style="word-wrap: break-word;"><?php echo $question->title; ?></td>
                        <td class="rhs-card-list__number"><span><?php echo $question->getAnswers(array('count' => true)); ?></span></td>
                      </tr>
                    </tbody>
                  </table>
                </a>
              <?php endforeach; ?>
              <a href="forum-subject.html" title="Bekijk alles" class="rhs-read-more rhs-card-list__read-more">
                <span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>Alles
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>