<?php if (elgg_is_logged_in()): ?>
	<?php $logged_in = elgg_get_logged_in_user_entity(); ?>
	<a href="/profile/<?php echo $logged_in->username;?>" title="<?php echo $logged_in->username; ?>" class="rhs-top-navigation__link rhs-top-navigation__link--right">
		<?php echo elgg_view('output/img', array(
			'src' => $logged_in->getIconURL('tiny'),
			'alt' => $logged_in->name,
			'title' => $logged_in->name
		)); ?>
		<?php echo $logged_in->name; ?>
	</a>
<?php endif ?>