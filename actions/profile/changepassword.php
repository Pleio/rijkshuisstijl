<?php
	if (!elgg_is_xhr()) 
	{
	    register_error('Sorry, Ajax only!');
	    forward();
	}

	$user = elgg_get_logged_in_user_entity();
	if (!$user) 
	{
		register_error(elgg_echo("profile:notfound"));
		forward();
	}

	$username = get_input("username");
	$targetUser = get_user_by_username($username);
	if (!$targetUser) 
	{
	  register_error(elgg_echo("profile:notfound"));
	  forward();
	}
	
	$editable = $targetUser->canEdit();
	if (!$editable) 
	{
	  register_error(elgg_echo("profile:noaccess"));
	  forward();
	}

	$currentPassword = get_input("currentPassword");
	$newPassword = get_input("newPassword");
	$newPasswordValidation = get_input("newPasswordValidation");

	$categories = profile_manager_get_categorized_fields($targetUser, true);

	$success = false;

	$passHash = generate_user_password($targetUser, $currentPassword);
	
	if ($currentPassword != $newPassword && $newPassword == $newPasswordValidation && validate_password($newPassword) && $targetUser->password == $passHash)
	{
		$ia = elgg_set_ignore_access();

		$targetUser->salt = generate_random_cleartext_password();
		$hash = generate_user_password($targetUser, $newPassword);
		$targetUser->password = $hash;
		$success = (bool)$targetUser->save();

		elgg_set_ignore_access($ia);
	}

	echo json_encode([
    	'success' => $success
	]);
?>