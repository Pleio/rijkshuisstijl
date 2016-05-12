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

	$entity_guid = get_input("guid");
	$up = get_input("up") == "true";

	//check to see if the user has already liked the item
	if (elgg_annotation_exists($entity_guid, 'vote')) {
		system_message(elgg_echo("likes:alreadyliked"));
		forward(REFERER);
	}

	// Let's see if we can get an entity with the specified GUID
	$entity = get_entity($entity_guid);
	if (!$entity) {
		register_error(elgg_echo("likes:notfound"));
		forward(REFERER);
	}

	// limit likes through a plugin hook (to prevent liking your own content for example)
	if (!$entity->canAnnotate(0, 'vote')) {
		// plugins should register the error message to explain why liking isn't allowed
		forward(REFERER);
	}

	$annotation = create_annotation($entity->guid, 'vote', "vote", "", $user->guid, $entity->access_id);

	// tell user annotation didn't work if that is the case
	if (!$annotation) {
		register_error(elgg_echo("likes:failure"));
		forward(REFERER);
	}

	// notify if poster wasn't owner
	if ($entity->owner_guid != $user->guid) {

		likes_notify_user($entity->getOwnerEntity(), $user, $entity);
	}

	$settingName = $up ? 'upvotes' : 'downvotes';

	$settingBefore = $entity->getPrivateSetting($settingName);
	if (!is_string($settingBefore))
	{
		$entity->setPrivateSetting($settingName, 1);
	}
	else
	{
		$entity->setPrivateSetting($settingName, $settingBefore + 1);
	}

	echo json_encode([
    	'success' => true,
    	'upvotes' => $entity->getPrivateSetting('upvotes'),
    	'downvotes' => $entity->getPrivateSetting('downvotes'),
	]);
?>