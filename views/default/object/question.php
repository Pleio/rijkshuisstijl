<?php
$entity = elgg_extract('entity', $vars);
$full_view = elgg_extract('full_view', $vars, false);
$workflow = elgg_extract('workflow', $vars);

if (!$workflow) {
    echo elgg_view("object/question/default", array(
      'entity' => $entity,
      'full_view' => $full_view
    ));
} else {
    echo elgg_view("object/question/workflow", array(
      'entity' => $entity,
      'full_view' => $full_view,
      'workflow' => $workflow
    ));
}