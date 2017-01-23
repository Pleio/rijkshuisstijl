<?php
$special = elgg_get_plugin_setting("special", "rijkshuisstijl");

if (isset($vars['group'])) {
  $group = $vars['group'];
}
?>

<div class="rhs-container">
    <h2 class="rhs-section__subtitle"><?php echo elgg_echo("rijkshuisstijl:forum"); ?></h2>
    <a href="/questions/all" title="<?php echo elgg_echo("rijkshuisstijl:all"); ?>" class="rhs-section__read-more">
        <?php echo elgg_echo("rijkshuisstijl:all"); ?>
    </a>
    <div class="rhs-row">
        <?php if ($special == "ffd"): ?>
            <div class="rhs-col-lg-6">
                <div data-accordion-item="" class="rhs-card-list rhs-card-list--margin-bottom">
                    <h3 data-accordion-trigger="" class="rhs-card-list__title">
                        <?php echo elgg_echo("rijkshuisstijl:recent_questions"); ?>
                    </h3>
                    <div class="rhs-card-list__content">
                        <?php
                        foreach (rijkshuisstijl_get_latest_objects('question', $group) as $question)
                            echo elgg_view("rijkshuisstijl/elements/question_row", array('question' => $question));
                        ?>
                        <a href="/questions/all?topic=<?php echo ($group) ? $group->guid : "all"; ?>" title="<?php echo elgg_echo("rijkshuisstijl:all"); ?>" class="rhs-read-more rhs-card-list__read-more">
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
                        foreach (rijkshuisstijl_get_popular_objects('question', $group) as $question)
                            echo elgg_view("rijkshuisstijl/elements/question_row", array('question' => $question));
                        ?>
                        <a href="/questions/all?category=most_viewed&topic=<?php echo ($group) ? $group->guid : "all"; ?>" title="Bekijk alles" class="rhs-read-more rhs-card-list__read-more">
                            <span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>
                            <?php echo elgg_echo("rijkshuisstijl:all"); ?></a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="rhs-col-lg-12">
                <div data-accordion-item="" class="rhs-card-list rhs-card-list--margin-bottom">
                    <div class="rhs-card-list__content">
                        <?php
                        foreach (rijkshuisstijl_get_latest_objects('question', $group) as $question)
                            echo elgg_view("rijkshuisstijl/elements/question_row", array('question' => $question));
                        ?>
                        <a href="/questions/all?topic=<?php echo ($group) ? $group->guid : "all"; ?>" title="<?php echo elgg_echo("rijkshuisstijl:all"); ?>" class="rhs-read-more rhs-card-list__read-more">
                            <span class="rhs-icon-arrow-right-circle rhs-read-more__icon"></span>
                            <?php echo elgg_echo("rijkshuisstijl:all"); ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>