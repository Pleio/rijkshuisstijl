<?php
$poll = elgg_extract("poll", $vars);
$results = rijkshuisstijl_calculate_poll_results($poll);
$can_vote = rijkshuisstijl_can_vote_on_poll($poll);
?>
<form class="rhs-card-poll__content">
    <h3 class="rhs-card-poll__title"><?php echo $poll->title; ?></h3>
    <?php foreach ($results as $result): ?>
        <div class="rhs-result <?php echo ($result["most_votes"]) ? "___most-votes" : ""; ?>">
            <span><?php echo $result["percentage"]; ?>%</span>
            <label>
                <div style="width:<?php echo $result["percentage"]; ?>%" class="rhs-result__bar"></div>
                <span><?php echo $result["title"]; ?></span>
            </label>
        </div>
    <?php endforeach; ?>
    <div class="rhs-card-poll__actions">
        <?php if ($can_vote): ?>
            <button class="rhs-button rhs-button--color-quaternary ___back" data-toggle-poll>Terug</button>
        <?php endif; ?>
        <?php echo elgg_view("rijkshuisstijl/elements/poll/stats", ["poll" => $poll]); ?>
    </div>
</form>