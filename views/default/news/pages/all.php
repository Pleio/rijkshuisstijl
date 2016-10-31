<?php
$special = elgg_get_plugin_setting("special", "rijkshuisstijl");
$leader = rijkshuisstijl_get_news_leader();

$topic = get_input("topic");
if ($topic == "all") {
    $topic = false;
}

$category = get_input("category");
if ($category == "all") {
    $category = false;
}

?>

<?php if ($leader && !$topic && !$category): ?>
    <div class="rhs-section rhs-section--item">
    <?php echo elgg_view('rijkshuisstijl/elements/news/leader', array(
        'leader' => $leader
    )); ?>
    </div>
<?php endif; ?>

<div class="rhs-section rhs-section--no-padding">
    <div class="rhs-news__filter">
        <div class="rhs-row">
            <form>
            <?php if ($special == "ffd"): ?>
                <p class="rhs-col-md-4 rhs-col-lg-3">
                    <?php echo elgg_view('rijkshuisstijl/input/news_category'); ?>
                </p>
            <?php endif; ?>
            <p class="rhs-col-md-4 rhs-col-lg-3">
                <?php echo elgg_view('rijkshuisstijl/input/topic'); ?>
            </p>
            </form>
        </div>
    </div>
</div>

<div class="rhs-section">
    <div class="rhs-news-list">
        <?php echo $vars['entities']; ?>
    </div>
</div>