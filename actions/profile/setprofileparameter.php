<?php
	if (!elgg_is_xhr()) {
	    register_error('Sorry, Ajax only!');
	    forward();
	}

	$user = elgg_get_logged_in_user_entity();
	if (!$user) {
		register_error(elgg_echo("profile:notfound"));
		forward();
	}

	$name = get_input("name");
	$value = get_input("value");

	$categories = profile_manager_get_categorized_fields($user, true);

	$success = false;
	$fieldNames = '';
	foreach ($categories['fields'] as $category) 
	{
		foreach ($category as $field)
		{
	    	$fieldNames = $fieldNames . ' ' . $field->metadata_name;
	    	if ($field->metadata_name == $name)
	    	{
	    		create_metadata($user->guid, $name, $value);
	    		$success = true;
	    		break;
	    	}
	    }

	    if ($success)
	    	break;
	}

	echo json_encode([
    	'success' => $success
	]);
?>