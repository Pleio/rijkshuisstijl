<div class="rhs-sections">
    <div class="rhs-section rhs-section--with-row">
        <?php echo elgg_view('rijkshuisstijl/elements/latest_popular_questions'); ?>
    </div>

    <div class="rhs-section rhs-section--background-grey">
        <?php echo elgg_view('rijkshuisstijl/elements/news', array(
            'show_title' => true
        )); ?>
    </div>

    <?php echo elgg_view("rijkshuisstijl/elements/banner"); ?>

    <div class="rhs-section rhs-section--background-grey rhs-section--no-subtitle">
        <div class="rhs-container">
            <?php echo elgg_view('rijkshuisstijl/elements/themes_pinboard'); ?>
        </div>
    </div>
</div>