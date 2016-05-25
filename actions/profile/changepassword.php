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

	if ($currentPassword == $newPassword)
	{
		register_error(elgg_echo('rijkshuisstijl:password:change:sameasold'));
	  	forward();
	}

	if ($newPassword != $newPasswordValidation)
	{
		register_error(elgg_echo('user:password:fail:notsame'));
	  	forward();
	}

	if (!validate_password($newPassword))
	{
		register_error(elgg_echo('registration:passwordnotvalid'));
	  	forward();	
	}

	$result = elgg_authenticate($targetUser->username, $currentPassword);
	if ($result !== true) 
	{
		register_error(elgg_echo('user:password:fail:incorrect_current_password'));
		forward();
	}

	$targetUser->setPassword($newPassword);
	$targetUser->save();
	
	system_message(elgg_echo('user:password:success'));
	forward();
?>