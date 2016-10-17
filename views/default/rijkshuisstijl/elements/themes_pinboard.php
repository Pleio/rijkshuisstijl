<?php
$topics = rijkshuisstijl_get_featured_groups();
$pins = rijkshuisstijl_get_latest_objects("cafe");
?>

<div class="rhs-row">
  <div class="rhs-col-md-6 rhs-col-lg-4">
    <div class="rhs-card-links">
      <div class="rhs-card-links__list">
        <h4 class="rhs-card-links__title">
          <?php echo elgg_echo("rijkshuisttijl:topics"); ?>
        </h4>
        <?php foreach($topics as $topic): ?>
          <a href="/topics/<?php echo $topic->guid; ?>/<?php echo elgg_get_friendly_title($topic->name); ?>/" title="Inkomstenbelasting" class="rhs-card-links__item">
            <?php echo $topic->name; ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="rhs-col-md-6 rhs-col-lg-8">
    <div data-accordion-item="" class="rhs-bulletin-block">
      <h3 data-accordion-trigger="" class="rhs-bulletin-block__title">
        <?php echo elgg_echo("rijkshuisstijl:pinboard"); ?>
      </h3>
      <div class="rhs-bulletin-block__content">
          <?php foreach ($pins as $pin): ?>
            <a href="<?php echo $pin->getURL(); ?>" title="<?php echo $pin->title; ?>" class="rhs-bulletin-block__item">
              <table class="rhs-bulletin-block__table">
                <tbody>
                    <td class="rhs-bulletin-block__date"><?php echo date("d M", $pin->time_created); ?></td>
                    <td class="rhs-bulletin-block__text"><?php echo elgg_echo("pinboard:purpose:" . $pin->purpose) . " " . $pin->title; ?></td>
                    <td class="rhs-bulletin-block__number"><span><?php echo $pin->countComments(); ?></span></td>
                  </tr>
                </tbody>
              </table>
            </a>
          <?php endforeach; ?>

          <a href="/pinboard" title="Bekijk alles" class="rhs-read-more rhs-bulletin-block__readmore">
            <span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>
            <?php echo elgg_echo("rijkshuisstijl:view_all"); ?>
          </a>
        </div>
    </div>
  </div>
</div>
