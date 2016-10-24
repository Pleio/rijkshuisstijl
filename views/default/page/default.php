<?php
// Set the content type
header("Content-type: text/html; charset=utf-8");

$messages = elgg_view("page/elements/messages", array(
    "object" => $vars["sysmessages"]
));

$topbar = elgg_view("page/elements/topbar", $vars);
$header = elgg_view("page/elements/header", array_merge($vars, [
	"show_menu" => true
]));

$leader = elgg_view("page/elements/leader", $vars);
$main_navigation = elgg_view("page/elements/main_navigation", $vars);
$body = elgg_view("page/elements/body", $vars);
$footer = elgg_view("page/elements/footer", $vars);
$navresults = elgg_view("page/elements/navresults", $vars);

?>
<!DOCTYPE html>
    <!--[if IE 9]>
        <html lang="<?php echo get_current_language(); ?>" dir="ltr" class="ie lt-ie10 no-js">
    <![endif]-->
    <!--[if gt IE 9]><!-->
        <html lang="<?php echo get_current_language(); ?>" dir="ltr" class="ie no-js">
    <!--<![endif]-->
<html lang="<?php echo get_current_language(); ?>">
    <head>
      <?php echo elgg_view("page/elements/head", $vars); ?>
    </head>

    <body class="<?php echo isset($vars["body_class"]) ? $vars["body_class"] : ""; ?>">
    <!-- Header set -->
    <div class="rhs-page-layout">
    	<div class="rhs-page-layout__header">
			<div class="rhs-top-navigation">
				<div class="rhs-container">
					<?php echo $topbar; ?>
				</div>
			</div>

    		<header class="rhs-page-layout__header">
    			<?php echo $header; ?>
    		</header>

    		<div class="rhs-main-navigation-wrapper">
    			<?php echo $main_navigation; ?>
    		</div>

    	    <div class="elgg-page-messages">
    			<?php echo $messages; ?>
    		</div>
    	</div>
    	<div class="rhs-page-layout__main">
    		<?php if ($vars["leader"]): ?>
    			<?php echo $leader; ?>
    		<?php endif ?>

    		<?php echo $body; ?>
    	</div>

    	<!-- Footer -->
    	<div class="rhs-page-layout__footer">
    		<div class="rhs-footer">
    			<div class="rhs-container">
    				<?php echo $footer; ?>
    			</div>
    		</div>
    	</div>
    </div>

    <div data-nav-results class="rhs-main-nav-results">
    	<?php echo $navresults; ?>
    </div>

    <div class="rhs-overlay"></div>
    <?php echo elgg_view("page/elements/foot"); ?>

    </body>
</html>