<?php
// Set the content type
header("Content-type: text/html; charset=UTF-8");

$messages = elgg_view("page/elements/messages", array(
    "object" => $vars["sysmessages"]
));

$header = elgg_view("page/elements/header", $vars);
$body = elgg_view("page/elements/body", $vars);

?>
<!DOCTYPE html>
    <!--[if IE 9]>
        <html lang="<?php echo get_current_language(); ?>" dir="ltr" class="ie lt-ie10 no-js">
    <![endif]-->
    <!--[if gt IE 9]><!-->
        <html lang="<?php echo get_current_language(); ?>" dir="ltr" class="ie no-js">
    <!--<![endif]-->
<html>
    <head>
        <?php echo elgg_view("page/elements/head", $vars); ?>
    </head>

    <body class="<?php echo isset($vars["body_class"]) ? $vars["body_class"] : ""; ?>">
        <div class="elgg-page-messages">
            <?php echo $messages; ?>
        </div>

        <header class="rhs-page-layout__header">
            <?php echo $header; ?>
        </header>

        <main class="rhs-page-layout__main">
            <?php echo $body; ?>
        </main>

        <footer class="rhs-page-layout__footer">
        </footer>
        <?php echo elgg_view("page/elements/foot"); ?>
    </body>
</html>