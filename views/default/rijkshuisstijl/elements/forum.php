<?php
  $groups = rijkshuisstijl_get_featured_groups();

  $user = elgg_get_logged_in_user_entity();
  if ($user)
    $interests = rijkshuisstijl_get_interests($user);
?>

<<<<<<< HEAD
<div class="rhs-home__section">
  <div class="rhs-container">
    <div class="rhs-row">
      <div class="rhs-col-md-12">
        <h2 class="rhs-home__subtitle">Forum</h2><a href="/forum" title="..." class="rhs-home__readmore"><?php echo elgg_echo("rijkshuisstijl:all"); ?></a>
      </div>
    </div>
    <div class="rhs-row">
      <?php foreach ($groups as $group): ?>
        <?php         
          if ($user && !in_array($group->guid, $interests))
            continue; 
        ?>
        <div class="rhs-col-lg-6">
          <div data-accordion-item="" class="rhs-card-list">
            <h3 data-accordion-trigger="" class="rhs-card-list__title"><?php echo $group->name; ?></h3>
            <div class="rhs-card-list__content">
              <?php 
                foreach (rijkshuisstijl_get_latest_objects_from_group('question', $group) as $question)
                  echo elgg_view("forum/forumQuestionRow", array('question' => $question));
              ?>
              <a href="/forum/category/<?php echo $group->guid ?>" title="Bekijk alles" class="rhs-read-more rhs-card-list__read-more">
                <span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>Alles
              </a>
            </div>
          </div>
=======
<h2 class="rhs-section__subtitle">Forum</h2>
<a href="/forum" title="<?php echo elgg_echo("rijkshuisstijl:more"); ?>" class="rhs-section__read-more"><?php echo elgg_echo("rijkshuisstijl:all"); ?></a>
<div class="rhs-row">
  <?php foreach ($groups as $group): ?>
    <div class="rhs-col-lg-6">
      <div data-accordion-item="" class="rhs-card-list rhs-card-list--margin-bottom">
        <h3 data-accordion-trigger="" class="rhs-card-list__title"><?php echo $group->name; ?></h3>
        <div class="rhs-card-list__content">
          <?php 
            foreach (rijkshuisstijl_get_latest_objects_from_group('question', $group) as $question)
              echo elgg_view("forum/forumQuestionRow", array('question' => $question));
          ?>
          <a href="/forum/category/<?php echo $group->guid ?>" title="Bekijk alles" class="rhs-read-more rhs-card-list__read-more">
            <span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>Alles
          </a>
>>>>>>> 5911ef545d368d47ce3a36cd1bb5064678520fc0
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>