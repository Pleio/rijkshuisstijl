<?php
$question = elgg_extract("question", $vars);

if (method_exists($question, "getLatestAnswer")) {
    $latestAnswer = $question->getLatestAnswer();
    if ($latestAnswer) {
        $date = date("d M", $latestAnswer->time_created);
    } else {
        $date = date("d M", $question->time_created);
    }
}

if (method_exists($question, "countAnswers")) {
    $countAnswers = $question->countAnswers();
}

?>

<a href="<?php echo $question->getURL() ?>" title="<?php echo $question->title ?>" class="rhs-card-list__item">
    <table class="rhs-card-list__table">
        <tbody>
            <tr>
                <td class="rhs-card-list__date"><?php echo $date; ?></td>
                <td class="rhs-card-list__text" style="min-width: 20rem;">
                    <?php echo $question->title ?>
                </td>
                <td class="rhs-card-list__number">
                    <span><?php echo $countAnswers; ?></span>
                </td>
            </tr>
        </tbody>
    </table>
</a>