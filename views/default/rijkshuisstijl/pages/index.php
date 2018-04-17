<?php
$special = elgg_get_plugin_setting("special", "rijkshuisstijl");
?>

<div class="rhs-sections">
    <?php if ($special === "ht"): ?>
        <div class="rhs-section rhs-section--background-grey">
            <?php echo elgg_view("rijkshuisstijl/elements/news", array(
                "show_title" => true
            )); ?>
        </div>

        <?php echo elgg_view("rijkshuisstijl/elements/banner"); ?>

        <div class="rhs-section rhs-section--background-white rhs-section--with-row">
            <?php echo elgg_view("rijkshuisstijl/elements/latest_popular_questions", [
                "limit" => 5
            ]); ?>
        </div>

        <?php if (elgg_is_active_plugin("polls")): ?>
            <div class="rhs-section rhs-section--with-row rhs-section--no-subtitle">
                <div class="rhs-container">
                    <?php echo elgg_view("rijkshuisstijl/elements/poll"); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="rhs-section rhs-section--background-white rhs-section--with-row">
            <?php echo elgg_view("rijkshuisstijl/elements/latest_popular_questions", [
                "limit" => 5
            ]); ?>
        </div>

        <div class="rhs-section rhs-section--background-grey">
            <?php echo elgg_view("rijkshuisstijl/elements/news", array(
                "show_title" => true
            )); ?>
        </div>

        <?php if (elgg_is_active_plugin("polls")): ?>
            <div class="rhs-section rhs-section--with-row rhs-section--no-subtitle">
                <div class="rhs-container">
                    <?php echo elgg_view("rijkshuisstijl/elements/poll"); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php echo elgg_view("rijkshuisstijl/elements/banner"); ?>

        <?php if (elgg_is_active_plugin("pinboard")): ?>
            <div class="rhs-section rhs-section--background-grey rhs-section--no-subtitle">
                <div class="rhs-container">
                        <?php echo elgg_view("rijkshuisstijl/elements/themes_blogs"); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>