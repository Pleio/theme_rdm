<?php

function theme_rdm_page_handler($page) {
	$result = false;
	$include_file = "";
	
	switch ($page[0]) {
		case "slider":
			if (isset($page[1]) && is_numeric($page[1])) {
				set_input("icon", $page[1]);
				
				$include_file = dirname(dirname(__FILE__)) . "/procedures/slider_image.php";
			}
			break;
	}
	
	if (!empty($include_file)) {
		$result = true;
		include($include_file);
	}
	
	return $result;
}

function theme_rdm_profile_page_handler($page) {
	$user = false;
	if (isset($page[0])) {
		$username = $page[0];
		$user = get_user_by_username($username);
	
		if (!empty($user)) {
			elgg_set_page_owner_guid($user->getGUID());
		}
	}
	
	if (empty($user) && elgg_is_logged_in()) {
		forward(elgg_get_logged_in_user_entity()->getURL());
	}
	
	// short circuit if invalid or banned username
	if (empty($user) || ($user->isBanned() && !elgg_is_admin_logged_in())) {
		register_error(elgg_echo("profile:notfound"));
		forward();
	}
	
	$action = false;
	if (isset($page[1])) {
		$action = $page[1];
	}
	
	if ($action == "edit") {
		// use the core profile edit page
		$base_dir = elgg_get_root_path();
		require $base_dir . "pages/profile/edit.php";
		return true;
	}
	
	// view profile
	$sidebar = "";
	$content = elgg_view("profile/details", array("entity" => $user));
	$title = $user->name;
	
	if (elgg_is_logged_in()) {
		$sidebar = elgg_view("profile/owner_block");
		$content .= elgg_view_layout('widgets', array('num_columns' => 2));
	}

	$body = elgg_view_layout("two_sidebar", array(
		"title" => $title,
		"content" => $content,
		"sidebar" => $sidebar,
		"filter" => false
	));
	echo elgg_view_page($user->name, $body);
	
	return true;
}