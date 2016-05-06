<?php
$answer = $vars['entity'];

$image = elgg_view_entity_icon(get_entity($answer->owner_guid), 'small');

// mark this as the correct answer?
$correct_answer = $answer->isCorrect();
if ($correct_answer) {
	$owner = $answer->getOwnerEntity();
	$owner_name = htmlspecialchars($owner->name);
	
	$timestamp = htmlspecialchars(date(elgg_echo('friendlytime:date_format'), $correct_answer->time_created));
	
	$title = elgg_echo("questions:answer:checkmark:title", array($owner_name, $timestamp));
	
	$image .= "<div class='questions-checkmark' title='$title'></div>";
}

// create subtitle
$owner = $answer->getOwnerEntity();
$owner_link = elgg_view("output/url", array("text" => $owner->name, "href" => $owner->getURL(), "is_trusted" => true));

$friendly_time = elgg_view_friendly_time($answer->time_created);
$subtitle = $owner_link . " " . $friendly_time;

?>
<div class="rhs-card-user-content">
	<div class="rhs-container">
		<div class="rhs-row">
			<div class="rhs-col-md-offset-1 rhs-col-md-10 rhs-col-lg-offset-2 rhs-col-lg-8">
				<div class="rhs-reaction">
					<div class="rhs-reaction__top"><a href="forum-item--edit-answer.html" title="Wijzigen" class="rhs-reaction__edit-btn"></a><a href="<?php echo $owner->getURL() ?>" title="Bekijk profiel" class="rhs-reaction__profile"><img src="<?php echo $owner->getIconURL('medium') ?>"></a><a href="<?php echo $owner->getURL() ?>" title="Bekijk profiel" class="rhs-reaction__name"><?php echo $owner->name ?></a>
						<div class="rhs-reaction__time"><?php echo $friendly_time ?></div>
					</div><a href="forum-item--edit-answer.html" title="" class="rhs-reaction__body rhs-reaction__editable"><?php echo $answer->description ?></a>
					<div class="rhs-reaction__bottom"><a href="#" title="Stem omhoog" class="rhs-reaction__upvote rhs-reaction__vote"> <span>10</span> nuttig</a><a href="#" title="Stem omlaag" class="rhs-reaction__downvote rhs-reaction__vote"> <span>3</span> minder nuttig</a></div>
				</div>
			</div>
		</div>
	</div>
</div>