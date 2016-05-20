<?php
/**
 * Shows the view page of a specific cafe message
 *
 * @package theme_ffd
 */

$guid = get_input('guid');
$entity = get_entity($guid);

if (!$entity | !$entity instanceof ElggCafe) {
    register_error(elgg_echo("InvalidParameterException:NoEntityFound"));
    forward(REFERER);
}

$content = elgg_view_layout('one_column', array(
    'class' => 'rhs-card-user-content',
    'content' => elgg_view('pinboard/pages/detail', array(
        'entity' => $entity
    ))
));

echo elgg_view_page($entity->title, $content);