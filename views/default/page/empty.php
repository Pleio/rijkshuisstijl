<?php
/**
 * Elgg pageshell
 * The standard HTML page shell that everything else fits into
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['title']       The page title
 * @uses $vars['body']        The main content of the page
 * @uses $vars['sysmessages'] A 2d array of various message registers, passed from system_messages()
 */

// backward compatability support for plugins that are not using the new approach
// of routing through admin. See reportedcontent plugin for a simple example.
if (elgg_get_context() == 'admin') {
    if (get_input('handler') != 'admin') {
        elgg_deprecated_notice("admin plugins should route through 'admin'.", 1.8);
    }
    elgg_admin_add_plugin_settings_menu();
    elgg_unregister_css('elgg');
    echo elgg_view('page/admin', $vars);
    return true;
}

// render content before head so that JavaScript and CSS can be loaded. See #4032
$header = elgg_extract('header', $vars, '');
$messages = elgg_view('page/elements/messages', array('object' => $vars['sysmessages']));
$body = elgg_view('page/elements/body', $vars);

// Set the content type
header("Content-type: text/html; charset=UTF-8");

$lang = get_current_language();

?>
<!DOCTYPE html><!--[if IE 9]><html lang="nl" dir="ltr" class="ie lt-ie10 no-js"> <![endif]-->
<!--[if gt IE 9]><!--><html lang="<?php echo $lang; ?>" dir="ltr" class="ie no-js"><!--<![endif]-->
<html>
<head>
    <?php echo elgg_view('page/elements/head', $vars); ?>
</head>
<body class="<?php echo isset($vars['body_class']) ? $vars['body_class'] : ""; ?>">
    <!-- Header set -->
    <header class="rhs-header">
        <?php echo $header; ?>
    </header>
    <div class="elgg-page-messages">
        <?php echo $messages; ?>
    </div>

    <!-- Content -->
    <?php echo $body; ?>

<?php echo elgg_view('page/elements/foot'); ?>
</body>
</html>