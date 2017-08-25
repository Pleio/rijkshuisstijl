<?php
elgg_load_js("elgg.polls");

$name = elgg_extract("name", $vars);
$value = elgg_extract("value", $vars);

if ($value) {
    $value = json_decode($value);
}

if (!$value) {
    $value = [];
}

?>

<div class="links">
    <div class="links-options">
        <?php foreach($value as $i => $option): ?>
            <div class="link">
                <div class="elgg-col elgg-col-2of5">
                    <?php echo elgg_view("input/text", [
                        "name" => "${name}[${i}][title]",
                        "value" => $option->title,
                        "placeholder" => elgg_echo("title")
                    ]); ?>
                </div>

                <div class="elgg-col elgg-col-2of5">
                    <?php echo elgg_view("input/text", [
                        "name" => "${name}[${i}][link]",
                        "value" => $option->link,
                        "placeholder" => elgg_echo("link")
                    ]); ?>
                </div>

               <div class="elgg-col elgg-col-1of5">
                    <a href="#" class="poll-delete-link">
                        <img src="/mod/polls/graphics/16-em-cross.png">
                    </a>
               </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script class="link-template" type="text/x-custom-template">
        <div class="link">
            <div class="elgg-col elgg-col-2of5">
                <?php echo elgg_view("input/text", [
                    "name" => "${name}[{{i}}][title]",
                    "placeholder" => elgg_echo("title")
                ]); ?>
            </div>

            <div class="elgg-col elgg-col-2of5">
                <?php echo elgg_view("input/text", [
                    "name" => "${name}[{{i}}][link]",
                    "placeholder" => elgg_echo("link")
                ]); ?>
            </div>

           <div class="elgg-col elgg-col-1of5">
                <a href="#" class="poll-delete-link">
                    <img src="/mod/polls/graphics/16-em-cross.png">
                </a>
           </div>
        </div>
    </script>

    <div style="clear:both;"></div>

    <?php echo elgg_view("input/button", [
        "class" => "poll-add-link",
        "value" => elgg_echo("add")
    ]); ?>
</div>