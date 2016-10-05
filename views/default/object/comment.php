<?php
$entity = $vars['entity'];
$poster = $entity->getOwnerEntity();

?>
<div class="comment-container">
    <div class="comment">
        <div class="comment__vote">
            <div data-vote-up data-guid="<?php echo $entity->guid ?>" class="comment__vote-up">
                <?php echo elgg_echo("rijkshuisstijl:vote:up"); ?>
            </div>
            <div data-vote-points class="comment__points">
                <?php echo rijkshuisstijl_get_votes($entity); ?>
            </div>
            <div data-vote-down data-guid="<?php echo $entity->guid ?>" class="comment__vote-down">
                <?php echo elgg_echo("rijkshuisstijl:vote:down"); ?>
            </div>
        </div>
        <div class="comment__top">
            <a href="#" title="Bekijk profiel" style="background-image: url(&quot;<?php echo $poster->getIconURL('small'); ?>&quot;);" class="comment__picture"></a>
            <div class="comment__justify">
                <a href="<?php echo $poster->getURL(); ?>" title="<?php echo elgg_echo("rijkshuisstijl:go_to_profile"); ?>" class="comment__name">
                    <?php echo $poster->name; ?>
                </a>
                <div class="comment__date">
                    <?php echo rijkshuisstijl_view_friendly_time($entity->time_created); ?>
                </div>
                <div class="comment__edit">
                    <a href="#" data-comment-edit title="Wijzig reactie">
                        <span>
                            <?php echo elgg_echo("rijkshuisstijl:edit"); ?>
                        </span>
                    </a>
                </div>
          </div>
        </div>
        <div class="comment__body">
            <?php echo elgg_view("output/longtext", ["value" => $entity->description]); ?>
        </div>
    </div>

    <?php if ($entity->canEdit()): ?>
        <div data-comment-edit-target class="comment-edit__wrapper">
            <?php echo elgg_view_form("comment/save", array(
                "class" => "comment-edit"
            ), array(
                "entity" => $entity
            )); ?>
        </div>
    <?php endif; ?>
</div>