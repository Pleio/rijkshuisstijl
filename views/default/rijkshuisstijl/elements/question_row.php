<?php
$question = elgg_extract("question", $vars);

if (method_exists($question, "countAnswers")) {
    $countAnswers = $question->countAnswers();
}

?>

<a href="<?php echo $question->getURL() ?>" title="<?php echo $question->title ?>" class="rhs-card-list__item">
    <table class="rhs-card-list__table">
        <tbody>
            <tr>
                <td class="rhs-card-list__date"><?php echo rijkshuisstijl_view_friendly_time($question->time_created, true); ?></td>
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