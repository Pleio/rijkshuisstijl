<?php
elgg_load_library("elgg:polls");

$poll = rijkshuisstijl_get_latest_poll();
?>

<?php if ($poll): ?>
    <a id="poll"></a>
    <div class="rhs-card-poll-container">
    <?php if (rijkshuisstijl_can_vote_on_poll($poll)): ?>
        <div class="rhs-card-poll rhs-card-poll--margin-bottom" data-poll>
            <div class="rhs-card-poll__icon"><img src="/mod/rijkshuisstijl/assets/image/poll.svg"></div>
            <?php echo elgg_view_form("rijkshuisstijl/poll", ["class" => "rhs-card-poll__content", "action" => "action/polls/vote", "method" => "POST"], ["poll" => $poll]); ?>
        </div>
    <?php else: ?>
        <div class="rhs-card-poll rhs-card-poll--margin-bottom ___results">
            <div class="rhs-card-poll__icon"><img src="/mod/rijkshuisstijl/assets/image/poll.svg"></div>
            <?php echo elgg_view("rijkshuisstijl/elements/poll/results", ["poll" => $poll]); ?>
            <?php echo elgg_view("rijkshuisstijl/elements/poll/related", ["poll" => $poll]); ?>
        </div>
    <?php endif; ?>
    </div>
<?php endif; ?>