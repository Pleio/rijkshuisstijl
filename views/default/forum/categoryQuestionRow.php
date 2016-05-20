<?php
  $question = elgg_extract("question", $vars);
  $group = elgg_extract("group", $vars);

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
?>

<div class="rhs-col-md-12">
  <div class="rhs-card-topic"><a href="<?php echo $profileUrl ?>" title="Ga naar profielpagina" class="rhs-card-topic__profile-picture"><img src="<?php echo $profilePictureUrl ?>"></a>
    <div class="rhs-card-topic__content"><a href="<?php echo $question->getURL() ?>" title="..." class="rhs-card-topic__title"><?php echo $question->title ?></a>
      <div class="rhs-card-topic__info"><span class="rhs-hidden-mobile">Gesteld door:</span> <a href="/profile/<?php echo $posterUserName ?>" title="Ga naar profielpagina"><?php echo $posterName ?></a> <?php echo elgg_view_friendly_time($question->time_created) ?> <span class="rhs-hidden-mobile">in</span> 
      <?php
        if (!$group)
        {
          echo 'Globaal';
        }
        else
        {
          echo '<a href="/forum/category/' . $group->guid . '" class="rhs-hidden-mobile">' . $group->name . '</a>';
        }
      ?>
      </div>
      <div class="rhs-card-topic__description"><?php echo elgg_get_excerpt($question->description, 100) ?></div>
    </div>
    <div class="rhs-card-topic__aside">
      <div class="rhs-card-topic__views">
        <span>
          <?php echo entity_view_counter_count_views($question) ?>
        </span>
      </div>
      <?php if (elgg_is_active_plugin('content_subscriptions')): ?>
          <?php
          echo elgg_view('rijkshuisstijl/elements/content_subscription', array(
            'entity' => $question,
            'class' => 'rhs-card-topic__follow'
          ));
          ?>
      <?php endif; ?>
      <a href="<?php echo $question->getURL() ?>" title="Vraag antwoorden" class="rhs-card-topic__answers"><span><?php echo rijkshuisstijl_get_num_answers($question) ?></span> antwoorden</a>
    </div>
  </div>
</div>