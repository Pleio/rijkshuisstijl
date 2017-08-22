<?php
elgg_load_library("elgg:polls");

$poll = rijkshuisstijl_get_latest_poll();

$can_vote = rijkshuisstijl_can_vote_on_poll($poll);
$has_voted = rijkshuisstijl_has_voted_on_poll($poll);
$show_results_initially = $has_voted || !$can_vote;
?>

<?php if ($poll): ?>
    <a id="poll"></a>
    <div class="rhs-card-poll-container">
        <div class="rhs-card-poll rhs-card-poll--margin-bottom" data-poll <?php echo ($show_results_initially) ? 'style="display:none;"' : ''; ?>>
            <div class="rhs-card-poll__icon"><img src="/mod/rijkshuisstijl/assets/image/poll.svg"></div>
            <?php echo elgg_view_form("rijkshuisstijl/poll", ["class" => "rhs-card-poll__content", "action" => "action/polls/vote", "method" => "POST"], ["poll" => $poll]); ?>
        </div>
        <div class="rhs-card-poll rhs-card-poll--margin-bottom ___results" data-poll-results <?php echo (!$show_results_initially) ? 'style="display:none;"' : ''; ?>>
            <div class="rhs-card-poll__icon"><img src="/mod/rijkshuisstijl/assets/image/poll.svg"></div>
            <?php echo elgg_view("rijkshuisstijl/elements/poll/results", ["poll" => $poll]); ?>
            <?php echo elgg_view("rijkshuisstijl/elements/poll/related", ["poll" => $poll]); ?>
        </div>
    </div>
<?php endif; ?>