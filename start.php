<?php

include_once(dirname(__FILE__) . "/lib/functions.php");
include_once(dirname(__FILE__) . "/lib/hooks.php");

elgg_register_event_handler('init', 'system', 'rijkshuisstijl_init');

// Limit search results to these subtypes
$CONFIG->search_subtypes = array(
	'question',
	'answer',
	'videos',
	'news'
);

function rijkshuisstijl_init() {
    elgg_register_plugin_hook_handler('action', 'plugins/settings/save', 'rijkshuisstijl_plugins_settings_save');
	elgg_register_plugin_hook_handler("register", "menu:site", "rijkshuisstijl_menu_handler");

	elgg_register_plugin_hook_handler("route", "news", "rijkshuisstijl_route_news_hook", 100);
    elgg_register_plugin_hook_handler("route", "pinboard", "rijkshuisstijl_route_pinboard_hook", 100);
    elgg_register_plugin_hook_handler("route", "questions", "rijkshuisstijl_route_questions_hook", 100);
    elgg_register_plugin_hook_handler("route", "pages", "rijkshuisstijl_route_pages_hook", 100);
    elgg_register_plugin_hook_handler("route", "profile", "rijkshuisstijl_route_profile_hook", 100);

    elgg_register_css('rijkshuisstijl', '/mod/rijkshuisstijl/assets/rijkshuisstijl.css');
	elgg_register_js('rijkshuisstijl', '/mod/rijkshuisstijl/assets/rijkshuisstijl.js', "footer");

    elgg_register_css('splash', '/mod/rijkshuisstijl/assets/splash.css');
	elgg_register_js('splash', '/mod/rijkshuisstijl/assets/splash.js', "footer");

    if (elgg_in_context("register") | elgg_in_context("login") | elgg_in_context("forgotpassword") | elgg_in_context("resetpassword")) {
    	elgg_load_css('splash');
    	elgg_load_js('splash');
    } else {
    	elgg_load_css('rijkshuisstijl');
    	elgg_load_js('rijkshuisstijl');
    }

    // revert hacks of older Elgg modules
    elgg_unextend_view('page/elements/head', 'subsite_manager/topbar_fix');

	elgg_register_plugin_hook_handler("index", "system", "rijkshuisstijl_custom_index", 40); // must be very early

	elgg_register_page_handler("login", "rijkshuisstijl_pages_login_handler");
	elgg_register_page_handler("forgotpassword", "rijkshuisstijl_pages_forgotpassword_handler");
	elgg_register_page_handler("register", "rijkshuisstijl_pages_register_handler");
	elgg_register_page_handler("resetpassword", "rijkshuisstijl_pages_resetpassword_handler");

    //elgg_register_page_handler("profile", "rijkshuisstijl_profile_page_handler");
    elgg_register_page_handler("forum", "rijkshuisstijl_forum_page_handler");
    elgg_register_page_handler("topics", "rijkshuisstijl_topics_page_handler");
	elgg_register_page_handler("search", "rijkshuisstijl_search_page_handler");

	elgg_unregister_action('user/requestnewpassword');
	elgg_register_action("user/requestnewpassword", dirname(__FILE__) . "/actions/user/requestnewpassword.php", "public");

	elgg_unregister_action('user/passwordreset');
	elgg_register_action("user/passwordreset", dirname(__FILE__) . "/actions/user/passwordreset.php", "public");

	elgg_unregister_action('logout');
	elgg_register_action("logout", dirname(__FILE__) . "/actions/logout.php");

	elgg_register_action("rijkshuisstijl/profile/setprofileparameter", dirname(__FILE__) . "/actions/profile/setprofileparameter.php");
	elgg_register_action("rijkshuisstijl/profile/changepassword", dirname(__FILE__) . "/actions/profile/changepassword.php");
	elgg_register_action("rijkshuisstijl/profile/setprofilefield", dirname(__FILE__) . "/actions/profile/setprofilefield.php");
	elgg_register_action("rijkshuisstijl/search", dirname(__FILE__) . "/actions/search.php");
	elgg_register_action("rijkshuisstijl/questions/vote", dirname(__FILE__) . "/actions/questions/vote.php");
}

/**
 * Profile page handler
 *
 * @param array $page Array of URL segments passed by the page handling mechanism
 * @return bool
 */
function rijkshuisstijl_profile_page_handler($page) {
	if (isset($page[0])) {
		$username = $page[0];
		$user = get_user_by_username($username);
		elgg_set_page_owner_guid($user->guid);
	} elseif (elgg_is_logged_in()) {
		forward(elgg_get_logged_in_user_entity()->getURL());
	}

	// short circuit if invalid or banned username
	if (!$user || ($user->isBanned() && !elgg_is_admin_logged_in())) {
		register_error(elgg_echo("profile:notfound"));
		forward();
	}

	$action = NULL;
	if (isset($page[1])) {
		$action = $page[1];
	}

	if ($action == "edit") {
		// use the core profile edit page
		require dirname(__FILE__) . "/pages/profile/edit.php";
		return true;
	}
	else if ($action == "interests")
	{
		require dirname(__FILE__) . "/pages/profile/interests.php";
		return true;
	}
	else if ($action == "settings")
	{
		require dirname(__FILE__) . "/pages/profile/settings.php";
		return true;
	}
	else
	{
		require dirname(__FILE__) . "/pages/profile/index.php";
		return true;
	}

	// main profile page
	$content = elgg_view("profile/wrapper");

	$body = elgg_view_layout("one_column", array("content" => $content));
	echo elgg_view_page($user->name, $body);
	return true;
}

/**
 * Forum page handler
 *
 * @param array $page Array of URL segments passed by the page handling mechanism
 * @return bool
 */
function rijkshuisstijl_forum_page_handler($page) {
	$action = NULL;
	if (isset($page[0])) {
		$action = $page[0];
	}

	if ($action == "category")
	{
		if (isset($page[1]))
			$category = $page[1];
		else
			$category = '';

		if (isset($page[2]))
			$page = $page[2];
		else
			$page = 1;

		require dirname(__FILE__) . "/pages/forum/category.php";
		return true;
	}
	else
	{
		require dirname(__FILE__) . "/pages/forum/index.php";
		return true;
	}

	return true;
}

function rijkshuisstijl_topics_page_handler($page) {
	if ($page[0]) {
		set_input("guid", $page[0]);
	}

	require dirname(__FILE__) . "/pages/topics.php";
	return true;
}

function rijkshuisstijl_search_page_handler($page) {
	require dirname(__FILE__) . "/pages/search.php";
	return true;
}

function rijkshuisstijl_pages_page_handler($page) {
	require dirname(__FILE__) . "/pages/pages.php";
	return true;
}

function rijkshuisstijl_pages_login_handler($page) {
	require dirname(__FILE__) . "/pages/account/login.php";
	return true;
}

function rijkshuisstijl_pages_forgotpassword_handler($page) {
	require dirname(__FILE__) . "/pages/account/forgot_password.php";
	return true;
}

function rijkshuisstijl_pages_register_handler($page) {
	require dirname(__FILE__) . "/pages/account/register.php";
	return true;
}

function rijkshuisstijl_pages_resetpassword_handler($page) {
	require dirname(__FILE__) . "/pages/account/reset_password.php";
	return true;
}

function rijkshuisstijl_route_news_hook($hook_name, $entity_type, $return_value, $params) {
	$page = elgg_extract("segments", $return_value);
	switch ($page[0]) {
		case null:
			include(dirname(__FILE__) . "/pages/news/all.php");
			return true;
			break;
	}
}

function rijkshuisstijl_route_pinboard_hook($hook_name, $entity_type, $return_value, $params) {
	$page = elgg_extract("segments", $return_value);
	switch ($page[0]) {
		case null:
			include(dirname(__FILE__) . "/pages/pinboard/all.php");
			return true;
			break;
	}
}

function rijkshuisstijl_route_questions_hook($hook_name, $entity_type, $return_value, $params) {
	$page = elgg_extract("segments", $return_value);
	switch ($page[0]) 
	{
		case "view":
			if (isset($page[1])) 
			{
				set_input("guid", $page[1]);
			}

			include(dirname(__FILE__) . "/pages/questions/view.php");
			return true;
			break;
	}
}

function rijkshuisstijl_route_pages_hook($hook_name, $entity_type, $return_value, $params) {
	$page = elgg_extract("segments", $return_value);
	switch ($page[0]) {
		case "view":
			if (isset($page[1])) {
				set_input("guid", $page[1]);
			}

			include(dirname(__FILE__) . "/pages/pages/view.php");
			return true;
			break;
	}
}

function rijkshuisstijl_route_profile_hook($hook_name, $entity_type, $return_value, $params) {
	$page = elgg_extract("segments", $return_value);

	if (isset($page[0])) {
		$username = $page[0];
		$user = get_user_by_username($username);
		elgg_set_page_owner_guid($user->guid);
	} elseif (elgg_is_logged_in()) {
		forward(elgg_get_logged_in_user_entity()->getURL());
	}

	// short circuit if invalid or banned username
	if (!$user || ($user->isBanned() && !elgg_is_admin_logged_in())) {
		register_error(elgg_echo("profile:notfound"));
		forward();
	}

	switch ($page[1]) {
		case "edit":
			include(dirname(__FILE__) . "/pages/profile/edit.php");
			return true;
			break;
		case "interests":
			include(dirname(__FILE__) . "/pages/profile/interests.php");
			return true;
			break;
		case "settings":
			include(dirname(__FILE__) . "/pages/profile/settings.php");
			return true;
			break;
		default:
			include(dirname(__FILE__) . "/pages/profile/index.php");
			return true;
			break;
	}
}