<?php
$entity = $vars['entity'];
?>

<div class="rhs-row">
    <div class="rhs-col-md-offset-2 rhs-col-md-8">
        <?php
        echo elgg_view_entity($entity, array('full_view' => true));

        $options = array(
            'type' => 'object',
            'subtype' => 'comment',
            'container_guid' => $entity->guid,
            'order_by' => 'time_created ASC',
            'limit' => false,
            'pagination' => false
        );

        $count = elgg_get_entities(array_merge($options, array(
            'count' => true
        )));

        $comments_title = elgg_view_icon("comment-o", "mrs") . $count . " " . elgg_echo('answers');
        $comments = elgg_list_entities($options);

        echo elgg_view_module('info', $comments_title, $comments, array("class" => "mtm ffd-answers"));

        if (elgg_is_logged_in()) {
            $entity_comment = elgg_view_form('theme_ffd/cafe/comment', array(
                'name' => 'cafe_comment',
                'action' => 'action/comment/save'
            ), array(
                'cafe' => $entity
            ));

            echo elgg_view_module('info', elgg_echo('pinboard:comment'), $entity_comment);
        }
        ?>
    </div>
</div>