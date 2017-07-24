<?php $poll = elgg_extract("poll", $vars); ?>

<?php if ($poll->topic || $poll->link): ?>
    <div class="rhs-card-poll__related">
        <div class="rhs-card-poll__related-content">
            <div class="rhs-row">
                <?php if ($poll->topic): ?>
                    <div class="rhs-col-sm-6 rhs-col-md-12">
                        <a href="<?php echo $poll->topic; ?>" class="rhs-related">
                            <div class="rhs-related__title"><?php echo elgg_echo("polls:topic"); ?></div>
                            <?php echo $poll->title; ?>
                            <div class="rhs-related__more"></div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if ($poll->link): ?>
                    <div class="rhs-col-sm-6 rhs-col-md-12">
                        <a href="<?php echo $poll->link; ?>" class="rhs-related">
                            <div class="rhs-related__title"><?php echo elgg_echo("polls:link"); ?></div>
                            <?php echo $poll->title; ?>
                            <div class="rhs-related__more"></div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>