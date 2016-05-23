<?php
	$question = elgg_extract("question", $vars);
?>

<a href="<?php echo $question->getURL() ?>" title="..." class="rhs-card-list__item">
	<table class="rhs-card-list__table">
		<tbody>
			<tr>
				<td class="rhs-card-list__date"><?php echo date("d M", $question->getLatestAnswer()->time_created) ?></td>
				<td class="rhs-card-list__text" style="min-width: 20rem;"><?php echo $question->title ?></td>
				<td class="rhs-card-list__number"><span><?php echo $question->countAnswers() ?></span></td>
			</tr>
		</tbody>
	</table>
</a>