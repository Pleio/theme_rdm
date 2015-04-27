<?php

$links = get_input("links");

$links = json_encode($links);

elgg_set_plugin_setting("links", $links, "theme_rdm");

forward(REFERER);
