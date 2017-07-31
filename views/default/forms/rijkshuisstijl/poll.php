<?php $poll = elgg_extract("poll", $vars); ?>
<h3 class="rhs-card-poll__title"><?php echo $poll->title; ?></h3>
<div data-validationmessage="Vul uw keuze in" required="" class="rhs-radios">
    <?php echo elgg_view("input/radio", [
        "name" => "response",
        "options" => polls_get_choice_array($poll)
    ]); ?>
</div>
<div class="rhs-card-poll__actions">
    <button class="rhs-button rhs-button--color-quaternary js-submitForm" type="submit">Stem</button>
    <?php echo elgg_view("rijkshuisstijl/elements/poll/stats", ["poll" => $poll]); ?>
</div>

<?php echo elgg_view("input/hidden", ["name" => "guid", "value" => $poll->guid]); ?>