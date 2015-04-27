<?php

/**
 * Plugins hooks are bundled here
 */

/**
 * Return the site menu
 * 
 * @param string $hook        name of the hook
 * @param string $entity_type type of the hook
 * @param array  $returnvalue current return value
 * @param array  $params      extra params
 */
function theme_rdm_register_topbar_menu_handler($hook, $entity_type, $returnvalue, $params) {
	// we will make our own menu
	$menu_items = array();
	$user = elgg_get_logged_in_user_entity();
	if (!$user) {
		return;
	}
	$groups_count = "";
	$invitation_count = (int) groups_get_invited_groups($user->getGUID(), false, array('count' => true));
	if ($invitation_count) {
		$groups_count = "<span title='" . elgg_echo('groups:invitations:pending', array($invitation_count)) . "' class='theme-rdm-topbar-status-new'>$invitation_count</span>";
	}

	// get unread messages
	$message_count = "";
	$num_messages = (int) messages_count_unread();
	if ($num_messages) {
		$message_count = "<span title='" . elgg_echo('messages:unreadcount', array($num_messages)) . "' class='theme-rdm-topbar-status-new'>$num_messages</span>";
	}
	
	// main menu
	
	$wiki_group = get_entity("30879832");
	
	$menu_items[] = ElggMenuItem::factory(array("name" => "home", "title" => elgg_echo("theme_rdm:menu:home"), "href" => elgg_get_site_url(), "text" => "<i class='fa fa-home'></i>"));
	$menu_items[] = ElggMenuItem::factory(array("name" => "groups", "title" => elgg_echo("theme_rdm:menu:groups:all"), "href" => "groups/all", "text" => "<i class='fa fa-group'></i>"));
	if ($wiki_group) {
		$menu_items[] = ElggMenuItem::factory(array("name" => "wiki", "title" => $wiki_group->name, "href" => $wiki_group->getURL(), "text" => "<i class='fa fa-stack-overflow'></i>"));
	}
	$menu_items[] = ElggMenuItem::factory(array("name" => "members", "title" => elgg_echo("members"), "href" => "members/all", "text" => "<i class='fa fa-user'></i>"));
	
	$menu_items[] = ElggMenuItem::factory(array("name" => "add", "title" => elgg_echo("theme_rdm:menu:add"), "href" => "/add", "text" => "<i class='fa fa-plus'></i>", "section" => "alt"));
	$menu_items[] = ElggMenuItem::factory(array("name" => "my-groups", "title" => elgg_echo("theme_rdm:menu:groups:mine"), "href" => "groups/member/" . $user->username, "text" => $groups_count . "<i class='fa fa-group'></i>", "section" => "alt"));
	$menu_items[] = ElggMenuItem::factory(array("name" => "messages", "title" => elgg_echo("messages"), "href" => "messages/inbox/" . $user->username, "text" => $message_count . "<i class='fa fa-envelope'></i>", "section" => "alt"));
	$menu_items[] = ElggMenuItem::factory(array("name" => "settings", "title" => elgg_echo("settings"), "href" => "settings", "text" => "<i class='fa fa-cog'></i>", "section" => "alt"));
	if (elgg_is_admin_logged_in()) {
		$menu_items[] = ElggMenuItem::factory(array("name" => "admin", "title" => elgg_echo("admin"), "href" => "admin", "text" => "<i class='fa fa-gears'></i>", "section" => "alt"));
	}
	$menu_items[] = ElggMenuItem::factory(array("name" => "profile", "title" => elgg_echo("profile"), "href" => $user->getURL(), "text" => elgg_view("output/img", array("src" => $user->getIconURL('tiny'))), "section" => "alt"));

	return $menu_items;
}

/**
 * Add some icons before some menu items
 * 
 * @param string         $hook        name of the hook
 * @param string         $entity_type type of the hook
 * @param ElggMenuItem[] $returnvalue current return value
 * @param array          $params      extra params
 * 
 * @return ElggMenuItem[]
 */
function theme_rdm_prepare_owner_block_menu_handler($hook, $entity_type, $returnvalue, $params) {
	
	if (empty($returnvalue) || !is_array($returnvalue)) {
		return $returnvalue;
	}
	
	foreach ($returnvalue as $section => $menu_items) {
		
		if (!empty($menu_items) && is_array($menu_items)) {
			foreach ($menu_items as $menu_item) {
				
				switch ($menu_item->getName()) {
					case "activity":
					case "thewire":
						$menu_item->setText("<i class='fa fa-stack-exchange mrs'></i>" . $menu_item->getText());
						break;
					case "blog":
						$menu_item->setText("<i class='fa fa-pencil-square mrs'></i>" . $menu_item->getText());
						break;
					case "bookmarks":
						$menu_item->setText("<i class='fa fa-star-o mrs'></i>" . $menu_item->getText());
						break;
					case "discussion":
						$menu_item->setText("<i class='fa fa-comments-o mrs'></i>" . $menu_item->getText());
						break;
					case "events":
						$menu_item->setText("<i class='fa fa-calendar mrs'></i>" . $menu_item->getText());
						break;
					case "file":
						$menu_item->setText("<i class='fa fa-folder-open mrs'></i>" . $menu_item->getText());
						break;
					case "pages":
						$menu_item->setText("<i class='fa fa-code-fork mrs'></i>" . $menu_item->getText());
						break;
					case "photos":
						$menu_item->setText("<i class='fa fa-film mrs'></i>" . $menu_item->getText());
						break;
					case "etherpad":
						$menu_item->setText("<i class='fa fa-globe mrs'></i>" . $menu_item->getText());
						break;
					case "polls":
						$menu_item->setText("<i class='fa fa-question mrs'></i>" . $menu_item->getText());
						break;
					case "videolist":
						$menu_item->setText("<i class='fa fa-video-camera mrs'></i>" . $menu_item->getText());
						break;
					case "related_groups":
						$menu_item->setText("<i class='fa fa-group mrs'></i>" . $menu_item->getText());
						break;
					case "birthdays":
						$menu_item->setText("<i class='fa fa-gift mrs'></i>" . $menu_item->getText());
						break;
				}
			}
		}
	}
}
