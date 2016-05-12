<?php
/**
 * List a section of search results corresponding in a particular type/subtype
 * or search type (comments for example)
 *
 * @uses $vars['results'] Array of data related to search results including:
 *                          - 'entities' Array of entities to be displayed
 *                          - 'count'    Total number of results
 * @uses $vars['params']  Array of parameters including:
 *                          - 'offset'      Offset in search results
 *                          - 'limit'       Number of results per page
 */
 ?>

<div class="rhs-row">
    <?php foreach ($vars['results']['hits'] as $entity): ?>

        <?php
        if ($entity instanceof ElggAnnotation) {
            $id = "elgg-{$entity->type}-{$entity->id}";
        } else {
            $id = "elgg-{$entity->type}-{$entity->guid}";
        }
        ?>

        <div id="<?php echo $id; ?>" class="rhs-col-md-12">

        <?php
        $url_options = array(
            "class" => "float-alt elgg-quiet",
            "href" => "search?q=" . $vars['params']['query'] . "&entity_subtype=" . $subtype . "&entity_type=" . $entity->type . "&search_type=entities",
        );

        if ($entity->type == "object") {
            $subtype = get_subtype_from_id($entity->subtype);
            $url_options["text"] = elgg_echo("item:" . $entity->type . ":" . $subtype);
        } elseif ($entity->type == "annotation") {
            $url_options["text"] = elgg_echo("item:comment");
        } else {
            $url_options["text"] = elgg_echo("item:" . $entity->type);
        }

        if ($vars['params']['container_guid']) {
            $url_options["href"] .= "&container_guid=" . $vars['params']['container_guid'];
        }

        echo elgg_view("output/url", $url_options);

        $view = elasticsearch_get_view($entity);
        echo elgg_view($view, array(
            'entity' => $entity
        ));
        ?>

        </div>
    <?php endforeach ?>
</div>

<div class="rhs-search-results__pagination">
    <?php
        $options = array(
            'limit' => $vars['params']['limit'],
            'offset' => $vars['params']['offset'],
            'count' => $vars['results']['count']
        );

        echo elgg_view('navigation/pagination', $options);
    ?>
</div>