<?php
/**
 * Main file for this plugin
 */

define("THEME_GRAPHICS", elgg_get_site_url() . "mod/theme_rdm/_graphics/"); 

define("THEME_COLOR_1", "00774D"); // Donkergroen
define("THEME_COLOR_2", "CCE4DB"); // Lichtgroen
define("THEME_COLOR_3", "F5F1E9"); // Beige


define("THEME_COLOR_4", "d3e0bb"); // Groen meest licht: # d3e0bb (achtergrond menu’s rechts)
define("THEME_COLOR_5", "CCE4DB"); // Groen huisstijlkleur: # b5cb8d (kaders kop widget)
define("THEME_COLOR_6", "00774D"); // Groen meest donker: # a0b67c (voor linkjes en buttons)
define("THEME_COLOR_7", "00A5E4"); // Blauw: # 333590 (widgets)

require_once(dirname(__FILE__) . "/lib/functions.php");
require_once(dirname(__FILE__) . "/lib/hooks.php");
require_once(dirname(__FILE__) . "/lib/page_handlers.php");

elgg_register_event_handler("init", "system", "theme_rdm_init");
elgg_register_event_handler("init", "system", "theme_rdm_translations", 99999999999);

/**
 * Initialize the theme
 * 
 * @return void
 */
function theme_rdm_init() {
	
	elgg_register_css('font-awesome', 'mod/theme_rdm/vendors/font-awesome-4.0.3/css/font-awesome.min.css');
	elgg_load_css('font-awesome');
		
	elgg_extend_view("js/elgg", "js/theme_rdm");
	elgg_extend_view("css/elgg", "css/theme_rdm");
	elgg_extend_view("css/elgg", "css/theme_rdm_images");
	elgg_extend_view("page/layouts/widgets", "theme_rdm/widgets_fix");
	
	elgg_register_js('jquery.flexslider', 'mod/theme_rdm/vendors/jquery.flexslider/jquery.flexslider-min.js');
	elgg_load_js('jquery.flexslider');

	elgg_unextend_view("page/elements/header", "search/header");
	elgg_unextend_view("page/elements/owner_block/extend", "group_tools/owner_block");
	
	// page handlers
	elgg_register_page_handler("theme_rdm", "theme_rdm_page_handler");
	elgg_register_page_handler("profile", "theme_rdm_profile_page_handler");
	
	elgg_register_widget_type("profile_owner_block", elgg_echo("theme_rdm:widgets:profile_owner_block:title"), elgg_echo("theme_rdm:widgets:profile_owner_block:description"), "profile");
	
	elgg_register_plugin_hook_handler("register", "menu:topbar", "theme_rdm_register_topbar_menu_handler");
	elgg_register_plugin_hook_handler("prepare", "menu:owner_block", "theme_rdm_prepare_owner_block_menu_handler");
	
	elgg_register_admin_menu_item("configure", "theme_rdm", "appearance");
	
	elgg_register_action("theme_rdm/slider_upload", dirname(__FILE__) . "/actions/slider_upload.php", "admin");
	elgg_register_action("theme_rdm/links", dirname(__FILE__) . "/actions/links.php", "admin");
}

/**
 * Custom translations for this theme
 * 
 * @return void
 */
function theme_rdm_translations() {
	$nl = array(
		"profile:website" => "Website"
	);
	
	add_translation("nl", $nl);
}
