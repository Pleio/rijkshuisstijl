<?php
$leader = rijkshuisstijl_get_news_leader();

$topic = get_input("topic");
$category = get_input("category");
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
            <p class="rhs-col-md-4 rhs-col-lg-3">
                <?php echo elgg_view('rijkshuisstijl/input/news_category'); ?>
            </p>
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