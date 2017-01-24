<?php
$special = elgg_get_plugin_setting("special", "rijkshuisstijl");
?>

<div class="rhs-sections">
    <div class="rhs-section rhs-section--background-white rhs-section--with-row">
        <?php echo elgg_view("rijkshuisstijl/elements/latest_popular_questions", [
            "limit" => ($special == "cpf" ? 15 : 5)
        ]); ?>
    </div>

    <?php if ($special !== "cpf"): ?>
        <div class="rhs-section rhs-section--background-grey">
            <?php echo elgg_view("rijkshuisstijl/elements/news", array(
                "show_title" => true
            )); ?>
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
</div>