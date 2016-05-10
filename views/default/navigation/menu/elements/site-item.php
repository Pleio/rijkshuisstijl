<?php
/**
 * A single element of a menu.
 *
 * @package Elgg.Core
 * @subpackage Navigation
 *
 * @uses $vars['item']       ElggMenuItem
 * @uses $vars['item_class'] Additional CSS class for the menu item
 */

$item = $vars['item'];

$link_class = 'elgg-menu-closed';
if ($item->getSelected()) {
	// @todo switch to addItemClass when that is implemented
	//$item->setItemClass('elgg-state-selected');
	$link_class = 'elgg-menu-opened';
}

$children = $item->getChildren();
if ($children) {
	$item->addLinkClass($link_class);
	$item->addLinkClass('elgg-menu-parent');
}

$item->addLinkClass('rhs-main-navigation__link');

if ($item->getSelected()) {
	$item->addLinkClass('active');
}

if ($children) {
	$item->addLinkClass('rhs-main-navigation-dropdown');
	$item->addLinkClass('rhs-dropdown__trigger');
}

?>

<?php if ($children): ?>
	<div class="rhs-dropdown">
		<?php echo $item->getContent(array(
			'data-dropdown-trigger' => ''
		)); ?>
		<div class="rhs-dropdown__wrapper">
			<div class="rhs-dropdown__mobile">
				<a href="#" class="rhs-dropdown__back">
					<?php echo elgg_echo('rijkshuisstijl:back'); ?>
				</a>
				<div class="rhs-dropdown__subject">
					<?php echo $item->getText(); ?>
				</div>
			</div>

			<?php echo elgg_view('navigation/menu/elements/site-section', array(
			'items' => $children,
			'class' => 'elgg-menu elgg-child-menu',
			)); ?>
		</div>
	</div>
<?php else: ?>
	<?php echo $item->getContent(); ?>
<?php endif ?>