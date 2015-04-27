<?php
if (!elgg_is_logged_in()) {
?>
<div id='theme-rdm-images-logo-container'>
	<div id='theme-rdm-images-logo'></div>
</div>
<?php } ?>

<div id='theme-rdm-images-potlood-container'>
	<?php if (!elgg_is_logged_in()) {?>
	<div id='theme-rdm-images-potlood-inloggen'></div>
	<?php } elseif (elgg_get_site_url() == current_page_url()) { ?>
	<div id='theme-rdm-images-potlood-weten'></div>
	<?php } else { ?>
	<div id='theme-rdm-images-potlood'></div>
	<?php } ?>
</div>

<div id='theme-rdm-images-plant'></div>

<div id='theme-rdm-images-textbook'></div>