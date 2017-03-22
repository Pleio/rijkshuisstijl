<?php
$name = elgg_extract("name", $vars);
$value = elgg_extract("value", $vars);
$entity = elgg_extract("entity", $vars);
if ($entity) {
    $value = $entity->vars;
}

if (is_array($value)) {
    $value = implode(",", $value);
}

?>

<div data-tags data-name="<?php echo $name; ?>" data-value="<?php echo $value; ?>"></div>