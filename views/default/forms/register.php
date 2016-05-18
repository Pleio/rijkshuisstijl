<?php
/**
 * Elgg register form
 *
 * @package Elgg
 * @subpackage Core
 */

$password = $password2 = '';
$username = get_input('u');
$email = get_input('e');
$name = get_input('n');

if (elgg_is_sticky_form('register')) {
    extract(elgg_get_sticky_values('register'));
    elgg_clear_sticky_form('register');
}

?>

<h1 class="rhs-splash__title"><?php echo elgg_echo('register'); ?></h1>
<p class="rhs-form__element">
    <label class="rhs-form__label">
        <span class="rhs-form__label-text"><?php echo elgg_echo('rijkshuisstijl:register:name'); ?>*</span>
        <?php
        echo elgg_view('input/text', array(
            'name' => 'name',
            'value' => $name,
            'placeholder' => elgg_echo('rijkshuisstijl:register:name'),
            'class' => 'rhs-form__input js-validateInput',
            'required' => '',
            'data-validation' => '.{4,}',
            'data-validationmessage' => elgg_echo('rijkshuisstijl:register:name:error')
        ));
        ?>
    </label>
</p>

<p class="rhs-form__element">
    <label class="rhs-form__label">
        <span class="rhs-form__label-text"><?php echo elgg_echo('email'); ?>*</span>
        <?php
        echo elgg_view('input/text', array(
            'name' => 'email',
            'value' => $email,
            'placeholder' => elgg_echo('email'),
            'class' => 'rhs-form__input js-validateInput',
            'required',
            'data-validation' => '.+@.+',
            'data-validationmessage' => elgg_echo('rijkshuisstijl:register:email:error')
        ));
        ?>
    </label>
</p>

<p class="rhs-form__element">
    <label class="rhs-form__label">
        <span class="rhs-form__label-text"><?php echo elgg_echo('username'); ?>*</span>
        <?php
        echo elgg_view('input/text', array(
            'name' => 'username',
            'value' => $username,
            'placeholder' => elgg_echo('username'),
            'class' => 'rhs-form__input js-validateInput',
            'required',
            'data-validation' => '.{4,}',
            'data-validationmessage' => elgg_echo('rijkshuisstijl:register:username:error')
        ));
        ?>
    </label>
</p>

<p class="rhs-form__element">
    <label class="rhs-form__label">
        <span class="rhs-form__label-text"><?php echo elgg_echo('password'); ?>*</span>
        <?php
        echo elgg_view('input/password', array(
            'id' => 'password',
            'name' => 'password',
            'value' => $password,
            'class' => 'rhs-form__input js-validateInput',
            'required',
            'placeholder' => elgg_echo('rijkshuisstijl:register:password:placeholder', array($CONFIG->min_password_length)),
            'data-validation' => '.{' . $CONFIG->min_password_length . ',}',
            'data-validationmessage' => elgg_echo('rijkshuisstijl:register:password:error')
        ));
        ?>
    </label>
</p>

<p class="rhs-form__element">
    <label class="rhs-form__label">
        <span class="rhs-form__label-text"><?php echo elgg_echo('passwordagain'); ?>*</span>
        <?php
        echo elgg_view('input/password', array(
            'name' => 'password2',
            'value' => $password2,
            'class' => 'rhs-form__input js-validateInput',
            'required',
            'placeholder' => elgg_echo('rijkshuisstijl:register:password:enter_again'),
            'data-validation' => 'duplicateOf=password',
            'data-validationmessage' => elgg_echo('rijkshuisstijl:register:password_again:error')
        ));
        ?>
    </label>
</p>

<?php
// view to extend to add more fields to the registration form
echo elgg_view('register/extend', $vars);

// Add captcha hook
echo elgg_view('input/captcha', $vars);

echo '<div class="elgg-foot">';
echo elgg_view('input/hidden', array('name' => 'friend_guid', 'value' => $vars['friend_guid']));
echo elgg_view('input/hidden', array('name' => 'invitecode', 'value' => $vars['invitecode']));
echo elgg_view('input/submit', array('name' => 'submit', 'value' => elgg_echo('register')));
echo '</div>';
