<a href="/login" title="<?php echo elgg_echo('rijkshuisstijl:back_to_login'); ?>" class="rhs-splash__close"><?php echo elgg_echo('rijkshuisstijl:back_to_login'); ?></a>

<?php
echo elgg_autop(elgg_echo('user:resetpassword:reset_password_confirm'));

echo elgg_view('input/hidden', array(
    'name' => 'u',
    'value' => $vars['guid'],
));

echo elgg_view('input/hidden', array(
    'name' => 'c',
    'value' => $vars['code'],
));
?>

<p class="rhs-form__actions">
<?php
echo elgg_view('input/submit', array(
    'value' => elgg_echo('resetpassword')
));
?>
</p>