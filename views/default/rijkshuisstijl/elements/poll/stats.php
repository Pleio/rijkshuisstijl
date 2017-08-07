<?php
$poll = elgg_extract("poll", $vars);
$can_vote = rijkshuisstijl_can_vote_on_poll($poll);
?>
<div class="rhs-card-poll__stats">
    <?php if ($poll->canEdit() || !$can_vote): ?>
        <div class="rhs-card-poll__votes">
            <div class="rhs-card-poll__votes-icon"></div>
            <span><?php echo $poll->countAnnotations("vote"); ?> <?php echo $poll->countAnnotations("vote") == 1 ? elgg_echo("rijkshuisstijl:vote") : elgg_echo("rijkshuisstijl:votes"); ?></span>
        </div>
    <?php endif; ?>
    <?php if ($poll->close_date): ?>
        <span><?php echo elgg_echo("rijkshuisstijl:closes"); ?> <?php echo rijkshuisstijl_view_friendly_time($poll->close_date, true); ?></span>
    <?php endif; ?>
</div>
