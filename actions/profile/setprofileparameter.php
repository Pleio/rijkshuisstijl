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

	$site = elgg_get_site_entity();
	if (method_exists($site, 'getACL')) {
		$acl = $site->getACL();
	} else {
		$acl = ACCESS_LOGGED_IN;
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

	$categories = profile_manager_get_categorized_fields($targetUser, true);

	$success = false;
	$fieldNames = '';
	foreach ($categories['fields'] as $category) 
	{
		foreach ($category as $field)
		{
	    	$fieldNames = $fieldNames . ' ' . $field->metadata_name;
	    	if ($field->metadata_name == $name)
	    	{
	    		create_metadata($targetUser->guid, $name, $value, '', 0, $acl);
	    		$success = true;
	    		break;
	    	}
	    }

	    if ($success)
	    	break;
	}

	if ($success)
	{
		system_message(sprintf(elgg_echo('rijkshuisstijl:profile:field:success'), $name));
		forward();
	}
	else
	{
		register_error(sprintf(elgg_echo('rijkshuisstijl:profile:field:invalid'), $name));
	  	forward();	
	}
?>