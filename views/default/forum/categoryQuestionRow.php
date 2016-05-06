<?php
  if (!isset($question))
    return;

  $poster = $question->getOwnerEntity();
  $posterName = "Unknown";
  $posterUserName = "unknown";
  $profilePictureUrl = "";
  $pfoileUrl = "";
  if ($poster != null)
  {
    $posterName = $poster->name;
    $posterUserName = $poster->username;
    $profilePictureUrl = $poster->getIconURL('medium');
    $profileUrl = $poster->getURL();
  }

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

<div class="rhs-col-md-12">
  <div class="rhs-card-topic"><a href="<?php echo $profileUrl ?>" title="Ga naar profielpagina" class="rhs-card-topic__profile-picture"><img src="<?php echo $profilePictureUrl ?>"></a>
    <div class="rhs-card-topic__content"><a href="<?php echo $question->getURL() ?>" title="..." class="rhs-card-topic__title"><?php echo $question->title ?></a>
      <div class="rhs-card-topic__info"><span class="rhs-hidden-mobile">Gesteld door:</span> <a href="/profile/<?php echo $posterUserName ?>" title="Ga naar profielpagina"><?php echo $posterName ?></a> <?php echo elgg_view_friendly_time($question->time_created) ?> <span class="rhs-hidden-mobile">in</span> <a href="/forum/category/inkomstenbelasting" class="rhs-hidden-mobile">Inkomstenbelasting </a></div>
      <div class="rhs-card-topic__description"><?php echo elgg_get_excerpt($question->description, 100) ?></div>
    </div>
    <div class="rhs-card-topic__aside">
      <div class="rhs-card-topic__views"><span>24</span></div><a href="#" title="Vraag volgen" class="rhs-card-topic__follow">Vraag volgen</a><a href="<?php echo $question->getURL() ?>" title="Vraag antwoorden" class="rhs-card-topic__answers"><span><?php echo getNumAnswers($question) ?></span> antwoorden</a>
    </div>
  </div>
</div>