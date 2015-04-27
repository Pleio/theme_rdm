<?php

$links = elgg_get_plugin_setting("links", "theme_rdm");

$links = json_decode($links, true);

for ($i = 1; $i <= 10; $i++) {
	echo "<div>";	
	echo elgg_view("input/text", array("placeholder" => "Link text", "name" => "links[$i][name]",  "value" => $links[$i]["name"])) . "<br />";
	echo elgg_view("input/text", array("placeholder" => "Link url", "name" => "links[$i][href]",  "value" => $links[$i]["href"]));
	echo "</div>";
}

echo "<div>";
echo elgg_view("input/submit", array("value" => elgg_echo("save")));
echo "</div>";