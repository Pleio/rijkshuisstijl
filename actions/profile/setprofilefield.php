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

	$name = get_input("name");
	$value = get_input("value");

	$validFields = array('aboutme', 'interests', 'notifications', 'email');
	if (!in_array($name, $validFields))
	{
	    register_error('Invalid field!');
	    forward();
	}

	$obj = json_decode($value, true);

	if ($name == 'interests')
	{
		if (is_null($obj))
		{
			$obj = $value;
			$obj = array(intval($obj[0]));
		}
	}

	$targetUser->$name = $obj;
	$targetUser->save();

	echo json_encode([
    	'success' => true
	]);
?>