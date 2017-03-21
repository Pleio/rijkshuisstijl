<?php
$groups = rijkshuisstijl_get_featured_groups();
$user = elgg_get_logged_in_user_entity();
$display_title = elgg_extract("display_title", $vars, true);
$title = elgg_extract("title", $vars);

$special = elgg_get_plugin_setting("special", "rijkshuisstijl");
$limit = ($special == "cpf" ? 15 : 5)

?>

<?php if ($title): ?>
  <h2 class="rhs-section__subtitle"><?php echo $title; ?></h2>
<?php elseif ($display_title): ?>
  <h2 class="rhs-section__subtitle"><?php echo elgg_echo('rijkshuisstijl:forum') ?></h2>
  <a href="/questions/all" title="<?php echo elgg_echo("rijkshuisstijl:more"); ?>" class="rhs-section__read-more">  <?php echo elgg_echo("rijkshuisstijl:all"); ?>
  </a>
<?php endif; ?>

<?php if ($special == "cpf"): ?>
    <form method="get" action="/questions/all">
      <div class="rhs-bulletin-action">
        <div class="rhs-row">
            <div class="rhs-col-lg-3">
                <?php echo elgg_view("rijkshuisstijl/input/topic"); ?>
            </div>
        </div>
      </div>
    </form>
<?php endif; ?>

<div class="rhs-row">
  <?php foreach ($groups as $group): ?>
    <div class="rhs-col-lg-<?php echo ($special === "cpf") ? 12 : 6; ?>">
      <div data-accordion-item="" class="rhs-card-list rhs-card-list--margin-bottom">
        <h3 data-accordion-trigger="" class="rhs-card-list__title"><?php echo $group->name; ?></h3>
        <div class="rhs-card-list__content">
          <?php
            foreach (rijkshuisstijl_get_latest_objects('question', $group, $limit) as $question)
              echo elgg_view("rijkshuisstijl/elements/question_row", array('question' => $question));
          ?>
          <a href="/questions/all?topic=<?php echo $group->guid ?>" title="Bekijk alles" class="rhs-read-more rhs-card-list__read-more">
            <span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span><?php echo elgg_echo('rijkshuisstijl:all') ?>
          </a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>