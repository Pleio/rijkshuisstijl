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
$topbar = elgg_view('page/elements/topbar', $vars);

// @todo: show messages
$messages = elgg_view('page/elements/messages', array('object' => $vars['sysmessages']));

$header = elgg_view('page/elements/header', $vars);
$leader = elgg_view('page/elements/leader', $vars);
$main_navigation = elgg_view('page/elements/main_navigation', $vars);
$body = elgg_view('page/elements/body', $vars);
$footer = elgg_view('page/elements/footer', $vars);
$navresults = elgg_view('page/elements/navresults', $vars);

// Set the content type
header("Content-type: text/html; charset=utf-8");

$lang = get_current_language();

?>
<!DOCTYPE html><!--[if IE 9]><html lang="nl" dir="ltr" class="ie lt-ie10 no-js"> <![endif]-->
<!--[if gt IE 9]><!--><html lang="nl" dir="ltr" class="ie no-js"><!--<![endif]-->
<html>
<head>
  <?php echo elgg_view('page/elements/head', $vars); ?>
</head>

<body class="<?php echo isset($vars['body_class']) ? $vars['body_class'] : ""; ?>">
<!-- Header set -->
<div class="rhs-page-wrapper">
	<div class="print-header"><img src="<?php echo rijkshuisstijl_asset("image/logo-print.png"); ?>"></div>
	<?php if (elgg_is_logged_in()){ ?>
		<div class="rhs-top-navigation">
			<div class="rhs-container">
				<?php echo $topbar; ?>
			</div>
		</div>
	<?php } ?>

	<div class="rhs-header">
		<div class="rhs-container">
			<?php echo $header; ?>
		</div>
	</div>

	<div class="rhs-main-navigation-wrapper">
		<?php echo $main_navigation; ?>
	</div>

    <div class="elgg-page-messages">
		<?php echo $messages; ?>
	</div>

	<?php if ($vars['leader']): ?>
		<?php echo $leader; ?>
	<?php endif ?>

	<?php echo $body; ?>
</div>

<!-- Footer -->
<div class="rhs-footer">
	<div class="rhs-container">
		<?php echo $footer; ?>
	</div>
</div>

<div data-nav-results class="rhs-main-nav-results">
	<?php echo $navresults; ?>
</div>

<div class="rhs-overlay"></div>
<?php echo elgg_view('page/elements/foot'); ?>

</body>
</html>