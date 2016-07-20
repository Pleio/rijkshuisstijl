<?php
$leader = $vars['leader'];
?>

<div class="rhs-article rhs-article--content-right">
  <div style="background-image: url('<?php echo $leader->getFeaturedPhotoURL(); ?>');" class="rhs-article__image"></div>
  <div class="rhs-article__content">
    <h2 class="rhs-article__title">
      <a href="<?php echo $leader->getURL(); ?>" title="<?php echo $leader->title; ?>"><?php echo $leader->title; ?></a>
    </h2>
    <span class="rhs-article__category"><?php echo $leader->getContainerEntity()->name; ?></span>
    <p class="rhs-article__text" style="word-wrap: break-word;"><?php echo elgg_get_excerpt($leader->description); ?></p>
    <div class="rhs-article__read-more">
      <a href="<?php echo $leader->getURL(); ?>" title="<?php echo $leader->title; ?>" class="rhs-read-more">
          <span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>Lees meer
      </a>
    </div>
  </div>
</div>