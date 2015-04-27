<?php
/**
 * Elgg sidebar contents
 *
 * @uses $vars['sidebar'] Optional content that is displayed at the bottom of sidebar
 */

// echo elgg_view_menu('extras', array(
// 	'sort_by' => 'priority',
// 	'class' => 'elgg-menu-hz',
// ));
$body = "";
if (!elgg_in_context("profile")) {
	$body .= elgg_view('page/elements/owner_block', $vars);
}

$body .= elgg_view_menu('page', array('sort_by' => 'name'));

// optional 'sidebar' parameter
if (isset($vars['sidebar'])) {
	$body .= $vars['sidebar'];
}

// @todo deprecated so remove in Elgg 2.0
// optional second parameter of elgg_view_layout
if (isset($vars['area2'])) {
	$body .= $vars['area2'];
}

// @todo deprecated so remove in Elgg 2.0
// optional third parameter of elgg_view_layout
if (isset($vars['area3'])) {
	$body .= $vars['area3'];
}

if (!empty($body)) {
	echo elgg_view("output/img", array("src" => THEME_GRAPHICS . "tape.png", "class" => "theme-rdm-tape"));
}

echo $body;