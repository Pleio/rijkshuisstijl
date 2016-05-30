<?php
$entity = $vars['entity'];

$year = date("Y", $entity->time_created);
$container = $entity->getContainerEntity();
$first = $entity->getFirstVideo();

?>
<div class="rhs-row">
  <div class="rhs-col-sm12">
    <div data-video-block="" class="rhs-video-block">
        <div class="rhs-video-block__right">
          <div style="background-image:url('<?php echo $first->thumb; ?>');" class="rhs-video-block__background"><a href="#" title="<?php echo elgg_echo("rijkshuisstijl:videos:play"); ?>" data-video-block-trigger="" data-video-type="<?php echo $first->source; ?>" data-video-id="<?php echo $first->id; ?>" class="rhs-video-block__play"><span class="rhs-icon rhs-icon-play"></span></a></div>
          <div class="rhs-video-block__menu"><a href="#" title="<?php echo elgg_echo("rijkshuisstijl:videos:close"); ?>" data-video-block-trigger="" class="rhs-video-block__menu-close"><span class="rhs-icon rhs-icon-cross"></span></a>
            <div class="rhs-video-block__title"><?php echo $entity->title; ?></div>
            <div class="rhs-video-block__list">
              <div class="rhs-row">
                <div class="rhs-col-md-6">
                  <?php foreach ($entity->getVideos() as $i => $video): ?>
                    <?php if (($i+1) % 7 == 0): ?>
                      </div><div class="rhs-col-md-6">
                    <?php endif ?>
                    <div class="rhs-video-block__item"><a href="#" title="" data-video-type="<?php echo $video->source; ?>" data-video-id="<?php echo $video->id; ?>"
                      class="rhs-video-block__link <?php echo ($i == 0) ? "visited" : ""; ?>"><span><?php echo ($i+1); ?>.</span> <?php echo $video->title; ?></a></div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="rhs-video-block__left">
          <div class="rhs-video-block__meta">
            <span class="rhs-video-block__date"><?php echo $year; ?></span> <span class="rhs-video-block__subject">| <?php echo $container->name; ?></span>
          </div>
          <h2 class="rhs-video-block__title"><?php echo $entity->title; ?>
          <?php if ($entity->canEdit()) {
            echo elgg_view('output/url', array(
              'href' => '/videos/edit/' . $entity->guid,
              'text' => elgg_view_icon('edit')
            ));
            echo elgg_view('output/confirmlink', array(
              'href' => '/action/videos/delete?guid=' . $entity->guid,
              'text' => elgg_view_icon('delete'),
              'is_action' => true
            ));
          }
          ?>
          </h2>
          <a href="#" title="<?php echo elgg_echo("rijkshuisstijl:videos:all_chapters"); ?>" data-video-block-trigger="" class="rhs-read-more rhs-video-block__readmore">
            <span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>
            <?php echo elgg_echo("rijkshuisstijl:videos:all_chapters"); ?>
          </a>
          <a href="#" title="<?php echo elgg_echo("rijkshuisstijl:videos:all_chapters"); ?>" data-video-block-trigger="" class="rhs-read-more rhs-video-block__readmore rhs-video-block__back">
            <span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>
            <?php echo elgg_echo("rijkshuisstijl:back"); ?>
          </a>
        </div>
    </div>
</div>