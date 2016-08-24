<?php
elgg_load_js('rhsadmin');
?>

<div class="color" style="clear:both;">
    <div class="description" style="float:left;margin-left:10px">
        <label><?php echo $vars["label"]; ?></label>
    </div>
    <div data-color="data-color" class="sample" style="margin-left:10px;margin-right:10px;border:1px solid black;float:left;width:40px;margin-left:10px;height:25px;background-color:<?php echo $vars["value"]; ?>"></div>
    <div class="input-text" style="float:left;">
        <?php
            echo elgg_view("input/text", array(
                "name" => $vars["name"],
                "value" => $vars["value"],
                "data-colorpicker" => true
            ));
        ?>
    </div>
</div>

