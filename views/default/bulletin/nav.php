<?php
/**
 * Members navigation
 */

$tabs = array(
	'alpha' => array(
		'title' => elgg_echo('members:labels:alpha'),
		'url' => "members/alpha",
		'selected' => $vars['selected'] == 'alpha',
	),
	'newest' => array(
		'title' => elgg_echo('members:label:newest'),
		'url' => "members/newest",
		'selected' => $vars['selected'] == 'newest',
	),
	'popular' => array(
		'title' => elgg_echo('members:label:popular'),
		'url' => "members/popular",
		'selected' => $vars['selected'] == 'popular',
	),
	'online' => array(
		'title' => elgg_echo('members:label:online'),
		'url' => "members/online",
		'selected' => $vars['selected'] == 'online',
	),
);

echo elgg_view('navigation/tabs', array('tabs' => $tabs));
