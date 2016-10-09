<?php
$group = elgg_get_page_owner_entity();
$user = elgg_get_logged_in_user_entity();

$popular_users = rijkshuisstijl_get_popular_users();
?>

<div class="rhs-sections">
    <div class="rhs-section rhs-section--item-even rhs-section--padding-top">
        <div class="rhs-container">
          <div class="rhs-row">
            <div class="rhs-col-lg-6">
              <div data-accordion-item="" class="rhs-card-list rhs-card-list--margin-bottom">
                <h3 data-accordion-trigger="" class="rhs-card-list__title">
                  <?php echo elgg_echo("rijkshuisstijl:recent_questions"); ?>
                </h3>
                <div class="rhs-card-list__content">
                  <?php
                    foreach (rijkshuisstijl_get_latest_objects('question') as $question)
                      echo elgg_view("rijkshuisstijl/elements/question_row", array('question' => $question));
                  ?>
                  <a href="/questions/all" title="<?php echo elgg_echo("rijkshuisstijl:all"); ?>" class="rhs-read-more rhs-card-list__read-more">
                    <span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>
                    <?php echo elgg_echo("rijkshuisstijl:all"); ?>
                  </a>
                </div>
              </div>
            </div>
            <div class="rhs-col-lg-6">
              <div data-accordion-item="" class="rhs-card-list rhs-card-list--margin-bottom">
                <h3 data-accordion-trigger="" class="rhs-card-list__title">
                  <?php echo elgg_echo("rijkshuisstijl:popular_users"); ?>
                </h3>
                <div class="rhs-card-list__content">
                  <?php foreach ($popular_users as $user): ?>
                      <?php echo elgg_view("rijkshuisstijl/elements/user_row", array(
                        "user" => $user)
                      ); ?>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="rhs-section rhs-section--item-even rhs-section--background-grey">
        <div class="rhs-container">
            <?php echo elgg_view("rijkshuisstijl/elements/forum", array(
                'title' => elgg_echo("rijkshuisstijl:topics")
            )); ?>
        </div>
    </div>
</div>

<?php echo elgg_view("modals/save_question"); ?>