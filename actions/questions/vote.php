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
	$switched = false;

	if ($up)
	{
		if (elgg_annotation_exists($entity_guid, 'upvote')) 
		{
			system_message(elgg_echo("likes:alreadyliked"));
			forward(REFERER);
		}

		if (elgg_annotation_exists($entity_guid, 'downvote')) 
		{
			$switched = true;

			$annotations = elgg_get_annotations(array(
				'annotation_names' => array('downvote'),
				'guid' => $entity_guid,
				'owner_guid' => $user->guid,
				'access_id' => $entity->access_id
			));

			$annotations[0]->delete();
		}

		$entity = get_entity($entity_guid);
		if (!$entity) 
		{
			register_error(elgg_echo("likes:notfound"));
			forward(REFERER);
		}

		if (!$entity->canAnnotate(0, 'upvote')) 
		{
			forward(REFERER);
		}

		$annotation = create_annotation($entity->guid, 'upvote', "upvote", "", $user->guid, $entity->access_id);

		if (!$annotation) 
		{
			register_error(elgg_echo("likes:failure"));
			forward(REFERER);
		}
	}
	else
	{
		if (elgg_annotation_exists($entity_guid, 'downvote')) 
		{
			system_message(elgg_echo("likes:alreadyliked"));
			forward(REFERER);
		}

		if (elgg_annotation_exists($entity_guid, 'upvote')) 
		{
			$switched = true;

			$annotations = elgg_get_annotations(array(
				'annotation_names' => array('upvote'),
				'guid' => $entity_guid,
				'owner_guid' => $user->guid,
				'access_id' => $entity->access_id
			));

			$annotations[0]->delete();
		}

		$entity = get_entity($entity_guid);
		if (!$entity) 
		{
			register_error(elgg_echo("likes:notfound"));
			forward(REFERER);
		}

		if (!$entity->canAnnotate(0, 'downvote')) 
		{
			forward(REFERER);
		}

		$annotation = create_annotation($entity->guid, 'downvote', "downvote", "", $user->guid, $entity->access_id);

		if (!$annotation) 
		{
			register_error(elgg_echo("likes:failure"));
			forward(REFERER);
		}
	}

	echo json_encode([
    	'success' => true,
    	'switched' => $switched
	]);
?>