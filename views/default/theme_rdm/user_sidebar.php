<?php

$user = elgg_get_logged_in_user_entity();
if (!$user) {
	return;
}

$links = elgg_get_plugin_setting("links", "theme_rdm");
$links = json_decode($links, true);

if ($links) {

	$title = "Ga snel naar";
	
	$body = "<ul>";
	foreach ($links as $link) {
		if (empty($link["href"]) || empty($link["name"])) {
			continue;
		}
		$body .= "<li><i class='fa fa-bookmark mrm'></i>" . elgg_view("output/url", array("text" => $link["name"], "href" => $link["href"])) . "</li>";
	}
	$body .= "</ul>";
	
	echo elgg_view_module("theme-rdm-sidebar", $title, $body);
}

$title = "Mijn Groepen";
$body = "";

$options = array(
	'type' => 'group',
	'relationship' => 'member',
	'relationship_guid' => $user->guid,
	'limit' => 5
);
$groups = elgg_get_entities_from_relationship($options);

if ($groups) {
	$body .= "<table>";
	foreach ($groups as $group) {
		
		$body .= "<tr><td>" . elgg_view_entity_icon($group, 'tiny', array("link_class" => "mrm")) . "</td><td>" . elgg_view("output/url", array("text" => $group->name, "href" => $group->getURL())) . "</td></tr>";
	}
	$body .= "</table>";
}

$body .= "<i class='fa fa-plus mrm'></i>" . elgg_view("output/url", array("text" => elgg_echo("groups:add"), "href" => "groups/add")) . "<br />";
$body .= elgg_view("output/url", array("text" => elgg_echo("groups:all"), "href" => "groups/all"));
echo elgg_view_module("theme-rdm-sidebar", $title, $body);

$title = "Mijn contacten";
$body = "";

$options = array(
	'type' => 'user',
	'relationship' => 'friend_of',
	'relationship_guid' => $user->guid,
	'limit' => 5
);
$friends = elgg_get_entities_from_relationship($options);

if ($friends) {
	$body .= "<table>";
	foreach ($friends as $friend) {
		
		$body .= "<tr><td>" . elgg_view_entity_icon($friend, 'tiny', array("link_class" => "mrm")) . "</td><td>" . elgg_view("output/url", array("text" => $friend->name, "href" => $friend->getURL())) . "</td></tr>";
	}
	$body .= "</table>";
}

$body .= elgg_view("output/url", array("text" => elgg_echo("members"), "href" => "members/all"));
echo elgg_view_module("theme-rdm-sidebar", $title, $body);

$title = "Mijn bestanden";
$body = "";

$options = array(
	'type' => 'object',
	'subtype' => 'file',
	'owner_guid' => $user->guid,
	'limit' => 5
);
$files = elgg_get_entities_from_relationship($options);

if ($files) {
	$body .= "<ul>";
	foreach ($files as $file) {
		
		$body .= "<li>" . elgg_view("output/url", array("text" => $file->title, "href" => $file->getURL())) . "</li>";
	}
	$body .= "</ul>";
}

$body .= elgg_view("output/url", array("text" => elgg_echo("file:all"), "href" => "file/all"));
echo elgg_view_module("theme-rdm-sidebar", $title, $body);



