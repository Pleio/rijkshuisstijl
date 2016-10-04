<?php
$group = elgg_get_page_owner_entity();
$user = elgg_get_logged_in_user_entity();
$interests = rijkshuisstijl_get_interests($user);
?>

<div class="rhs-sections">
    <div class="rhs-section rhs-section--item-even rhs-section--padding-top">
        <div class="rhs-container">
            <?php echo elgg_view("rijkshuisstijl/elements/forum", array(
                'display_title' => false
            )); ?>
        </div>
    </div>
</div>

<?php echo elgg_view("modals/save_question"); ?>