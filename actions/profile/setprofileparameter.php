<?php
	$user = elgg_get_logged_in_user_entity();

	$name = (int)get_input("name");
	$value = (int)get_input("value");

	echo $name . ' ' . $value;
?>