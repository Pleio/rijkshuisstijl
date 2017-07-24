<?php
$poll = elgg_extract("poll", $vars);
?>
<div class="rhs-card-poll__stats">
    <div class="rhs-card-poll__votes">
        <div class="rhs-card-poll__votes-icon"></div>
        <span><?php echo $poll->countAnnotations("vote"); ?> stemmen</span>
    </div>
    <?php if ($poll->close_date): ?>
        <span>Peiling sluit <?php echo rijkshuisstijl_view_friendly_time($poll->close_date, true); ?></span>
    <?php endif; ?>
</div>
