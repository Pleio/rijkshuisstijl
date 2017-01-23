<?php
require_once(dirname(__FILE__) . "/../../vendor/autoload.php");
require_once(dirname(__FILE__) . "/lib/functions.php");
require_once(dirname(__FILE__) . "/lib/hooks.php");
require_once(dirname(__FILE__) . "/lib/events.php");

require_once(dirname(__FILE__) . "/../../vendor/autoload.php");
spl_autoload_register("rijkshuisstijl_autoloader");
function rijkshuisstijl_autoloader($class) {
    $filename = "classes/" . str_replace("\\", "/", $class) . ".php";
    if (file_exists(dirname(__FILE__) . "/" . $filename)) {
        include($filename);
    }
}

elgg_register_event_handler("init", "system", "rijkshuisstijl_init");

// Limit search results to these types
$CONFIG->search_types = array(
	array("object","question"),
	array("object","news"),
	array("object","videos"),
	array("object","cafe"),
	array("user")
);

define("RIJKSHUISSTIJL_LESS", dirname(__FILE__) . "/src/less/");

function rijkshuisstijl_init() {
	$lang = get_current_language();
	if ($lang == "nl") {
		setlocale(LC_TIME, "nl_NL");
	}

    elgg_register_plugin_hook_handler("action", "plugins/settings/save", "rijkshuisstijl_plugins_settings_save");

	$special = elgg_get_plugin_setting("special", "rijkshuisstijl");
    if (in_array($special, ["ffd", "ht", "cpf"])) {
		elgg_register_plugin_hook_handler("index", "system", "rijkshuisstijl_custom_index", 40); // must be very early

		elgg_register_plugin_hook_handler("route", "news", "rijkshuisstijl_route_news_hook", 100);
	    elgg_register_plugin_hook_handler("route", "pinboard", "rijkshuisstijl_route_pinboard_hook", 100);
	    elgg_register_plugin_hook_handler("route", "questions", "rijkshuisstijl_route_questions_hook", 100);
		elgg_register_plugin_hook_handler("route", "blog", "rijkshuisstijl_route_blog_hook", 100);
	    elgg_register_plugin_hook_handler("route", "pages", "rijkshuisstijl_route_pages_hook", 100);
		elgg_register_plugin_hook_handler("prepare", "menu:site", "rijkshuisstijl_site_menu_prepare");

		elgg_register_page_handler("topics", "rijkshuisstijl_topics_page_handler");

		elgg_register_page_handler("rijkshuisstijl", "rijkshuisstijl_page_handler");
		elgg_register_page_handler("rijkshuisstijl-admin", "rijkshuisstijl_admin_page_handler");

		elgg_register_action("rijkshuisstijl/admin/banner", dirname(__FILE__) . "/actions/admin/banner.php", "admin");
		elgg_register_action("rijkshuisstijl/validate_becon", dirname(__FILE__) . "/actions/validate_becon.php", "public");
    }

	elgg_register_plugin_hook_handler("route", "profile", "rijkshuisstijl_route_profile_hook", 100);
	elgg_register_plugin_hook_handler("route", "subsites", "rijkshuisstijl_route_subsites_hook", 100);
	elgg_register_plugin_hook_handler("allowed_styles", "htmlawed", "rijkshuisstijl_allowed_styles");

	global $CONFIG;
    elgg_register_css("rijkshuisstijl", "/css/rijkshuisstijl.css?v=" . $CONFIG->lastcache, 500);
    elgg_register_css("splash", "/css/splash.css?v=" . $CONFIG->lastcache);

	elgg_register_js("splash", "/mod/rijkshuisstijl/assets/splash.js?v=" . $CONFIG->lastcache , "footer");
	elgg_register_js("rijkshuisstijl", "/mod/rijkshuisstijl/assets/rijkshuisstijl.js?v=" . $CONFIG->lastcache, "footer");
	elgg_register_js("rijkshuisstijl-admin", "/mod/rijkshuisstijl/assets/rijkshuisstijlAdmin.js?v=" . $CONFIG->lastcache, "footer");

    if (elgg_in_context("register") | elgg_in_context("login") | elgg_in_context("forgotpassword") | elgg_in_context("resetpassword")) {
    	elgg_load_css("splash");
    	elgg_load_js("splash");
    } elseif (elgg_in_context("admin")) {
    	elgg_load_js("rijkshuisstijl-admin");
    } else {
    	elgg_load_css("rijkshuisstijl");
    	elgg_load_js("rijkshuisstijl");
    	elgg_load_js("elgg.embed");
    }

    // revert hacks of older Elgg modules
    elgg_unextend_view("page/elements/head", "subsite_manager/topbar_fix");

	elgg_register_page_handler("login", "rijkshuisstijl_pages_login_handler");
	elgg_register_page_handler("forgotpassword", "rijkshuisstijl_pages_forgotpassword_handler");
	elgg_register_page_handler("register", "rijkshuisstijl_pages_register_handler");
	elgg_register_page_handler("resetpassword", "rijkshuisstijl_pages_resetpassword_handler");
	elgg_register_page_handler("search", "rijkshuisstijl_search_page_handler");
	elgg_register_page_handler("graphql", "rijkshuisstijl_graphql_page_handler");

	// automatically subscribe users to question when they post a question
	elgg_register_event_handler("create", "object", "rijkshuisstijl_create_object_handler");

	elgg_unregister_menu_item("footer", "report_this");

	elgg_unregister_action("register");
	elgg_register_action("register", dirname(__FILE__) . "/actions/register.php", "public");

	elgg_unregister_action("user/requestnewpassword");
	elgg_register_action("user/requestnewpassword", dirname(__FILE__) . "/actions/user/requestnewpassword.php", "public");

	elgg_unregister_action("user/passwordreset");
	elgg_register_action("user/passwordreset", dirname(__FILE__) . "/actions/user/passwordreset.php", "public");

	elgg_unregister_action("logout");
	elgg_register_action("logout", dirname(__FILE__) . "/actions/logout.php");

	elgg_unregister_action("comment/save");
	elgg_register_action("comment/save", dirname(__FILE__) . "/actions/comment/save.php");

	elgg_unregister_action("comment/delete");
	elgg_register_action("comment/delete", dirname(__FILE__) . "/actions/comment/delete.php");

	elgg_register_action("rijkshuisstijl/profile/setprofileparameter", dirname(__FILE__) . "/actions/profile/setprofileparameter.php");
	elgg_register_action("rijkshuisstijl/profile/changepassword", dirname(__FILE__) . "/actions/profile/changepassword.php");
	elgg_register_action("rijkshuisstijl/profile/setprofilefield", dirname(__FILE__) . "/actions/profile/setprofilefield.php");
	elgg_register_action("rijkshuisstijl/search", dirname(__FILE__) . "/actions/search.php", "public");
	elgg_register_action("rijkshuisstijl/vote", dirname(__FILE__) . "/actions/vote.php");

    if (!isset($_COOKIE["CSRF_TOKEN"])) {
        $token = md5(openssl_random_pseudo_bytes(32));
        $domain = ini_get("session.cookie_domain");
        setcookie("CSRF_TOKEN", $token, 0, "/", $domain);
    }
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

function rijkshuisstijl_page_handler($page) {
	switch ($page[0]) {
		case "banner":
			require dirname(__FILE__) . "/pages/banner.php";
			return true;
		case "api":
			switch ($page[1]) {
				case "comments":
					require dirname(__FILE__) . "/api/comments.php";
					return true;
			}
	}
}

function rijkshuisstijl_admin_page_handler($page) {
	if (!elgg_is_admin_logged_in()) {
		forward("");
	}

	switch ($page[0]) {
		case "banner":
			require dirname(__FILE__) . "/pages/admin/banner.php";
			return true;
			break;
	}
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

function rijkshuisstijl_graphql_page_handler() {
    include("pages/graphql.php");
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

function rijkshuisstijl_route_subsites_hook($hook_name, $entity_type, $return_value, $params) {
	$page = elgg_extract("segments", $return_value);
	switch ($page[0]) {
		case "join":
			include(dirname(__FILE__) . "/pages/subsites/join.php");
			return false;
			break;
	}
}

function rijkshuisstijl_route_news_hook($hook_name, $entity_type, $return_value, $params) {
	$page = elgg_extract("segments", $return_value);
	switch ($page[0]) {
		case null:
			include(dirname(__FILE__) . "/pages/news/all.php");
			return false;
			break;
	}
}

function rijkshuisstijl_route_pinboard_hook($hook_name, $entity_type, $return_value, $params) {
	$page = elgg_extract("segments", $return_value);
	switch ($page[0]) {
		case "detail":
			if (isset($page[1])) {
				set_input("guid", $page[1]);
			}
			include(dirname(__FILE__) . "/pages/pinboard/detail.php");
			return false;
			break;
		case null:
			include(dirname(__FILE__) . "/pages/pinboard/all.php");
			return false;
			break;
	}
}

function rijkshuisstijl_route_questions_hook($hook_name, $entity_type, $return_value, $params) {
	$page = elgg_extract("segments", $return_value);
	switch ($page[0]) {
		case "group":
		case "all":
			if (isset($page[1]) && !get_input("topic")) {
				set_input("topic", $page[1]);
			}

			include(dirname(__FILE__) . "/pages/questions/all.php");
			return false;
			break;
		case "workflow":
			$workflow = true;
			break;
		case "view":
			if (isset($page[1])) {
				set_input("guid", $page[1]);
			}

			include(dirname(__FILE__) . "/pages/questions/view.php");
			return false;
			break;
		case "":
			include(dirname(__FILE__) . "/pages/questions/index.php");
			return false;
			break;
	}
}

function rijkshuisstijl_route_blog_hook($hook_name, $entity_type, $return_value, $params) {
	$page = elgg_extract("segments", $return_value);

	switch ($page[0]) {
		case "view":
			if (isset($page[1])) {
				set_input("guid", $page[1]);
			}

			include(dirname(__FILE__) . "/pages/blog/view.php");
			return false;
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
			return false;
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
			return false;
			break;
		case "interests":
			include(dirname(__FILE__) . "/pages/profile/interests.php");
			return false;
			break;
		case "settings":
			include(dirname(__FILE__) . "/pages/profile/settings.php");
			return false;
			break;
		default:
			include(dirname(__FILE__) . "/pages/profile/index.php");
			return false;
			break;
	}
}