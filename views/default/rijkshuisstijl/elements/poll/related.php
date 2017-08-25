<?php

$poll = elgg_extract("poll", $vars);
$topics = $poll->topics ? json_decode($poll->topics) : null;
$links = $poll->links ? json_decode($poll->links) : null;

if (!$topics && !$links) {
    return;
}
?>

<div class="rhs-card-poll__related">
    <div class="rhs-card-poll__related-content">
        <div class="rhs-row">
            <?php if ($topics): ?>
                <div class="rhs-col-sm-6 rhs-col-md-12">
                    <?php foreach ($topics as $topic): ?>
                        <a href="<?php echo $topic->link; ?>" class="rhs-related">
                            <div class="rhs-related__title"><?php echo elgg_echo("polls:topic"); ?></div>
                            <?php echo $topic->title; ?>
                            <div class="rhs-related__more"></div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if ($links): ?>
                <div class="rhs-col-sm-6 rhs-col-md-12">
                    <?php foreach ($links as $link): ?>
                        <a href="<?php echo $link->link; ?>" class="rhs-related">
                            <div class="rhs-related__title"><?php echo elgg_echo("polls:link"); ?></div>
                            <?php echo $link->title; ?>
                            <div class="rhs-related__more"></div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>