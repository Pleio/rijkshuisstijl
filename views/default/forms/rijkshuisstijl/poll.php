<?php
$poll = elgg_extract("poll", $vars);
$has_voted = rijkshuisstijl_has_voted_on_poll($poll);
?>
<h3 class="rhs-card-poll__title"><?php echo $poll->title; ?></h3>
<div data-validationmessage="Vul uw keuze in" required="" class="rhs-radios">
    <?php echo elgg_view("input/radio", [
        "name" => "response",
        "options" => polls_get_choice_array($poll),
        "value" => $has_voted ? $has_voted->value : null
    ]); ?>
</div>
<div class="rhs-card-poll__actions">
    <button class="rhs-button rhs-button--color-quaternary js-submitForm" type="submit">Stem</button>
    <?php if ($poll->canEdit() || $has_voted): ?>
        <button class="rhs-button rhs-button--color-quaternary rhs-button--line" data-toggle-poll>Tussenstand</button>
    <?php endif; ?>
    <?php echo elgg_view("rijkshuisstijl/elements/poll/stats", ["poll" => $poll]); ?>
</div>

<?php echo elgg_view("input/hidden", ["name" => "guid", "value" => $poll->guid]); ?>