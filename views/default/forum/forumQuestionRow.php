<?php
	$question = elgg_extract("question", $vars);

	if (!function_exists("getNumAnswers"))
  	{
	    function getNumAnswers($question)
	    {
	      $answerOptions = array(
	        "type" => "object",
	        "subtype" => "answer",
	        "container_guid" => $question->getGUID(),
	        "count" => true
	      );

	      $numAnswers = elgg_get_entities($answerOptions);
	      return $numAnswers;
	    }
  	}
?>

<a href="<?php echo $question->getURL() ?>" title="..." class="rhs-card-list__item">
	<table class="rhs-card-list__table">
		<tbody>
			<tr>
				<td class="rhs-card-list__date"><?php echo date("d M", $question->getLatestAnswer()->time_created) ?></td>
				<td class="rhs-card-list__text" style="min-width: 20rem;"><?php echo $question->title ?></td>
				<td class="rhs-card-list__number"><span><?php echo getNumAnswers($question) ?></span></td>
			</tr>
		</tbody>
	</table>
</a>