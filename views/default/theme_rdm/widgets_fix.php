<?php 
?>
<style>
	.elgg-main {
		background: none;
		box-shadow: none;
	}
	
	.elgg-layout-one-column .elgg-main {
		padding-left: 0;
		padding-right: 0;
	}
	<?php if (elgg_in_context("group_profile") || elgg_in_context("profile")) { ?>
			
	.elgg-widget-add-control,
	.elgg-module-widget {
		margin-left: 0;
		margin-right: 0;
		padding-left: 0;
		padding-right: 0;
	}
	
	#elgg-widget-col-2 {
		float: left;
	}
	
	#elgg-widget-col-1,
	#elgg-widget-col-2 {
		width: 48%  !important; 
	}
		
	<?php } elseif (current_page_url() === elgg_get_site_url()) { ?>
	#elgg-widget-col-1,
	#elgg-widget-col-2 {
		width: 48%  !important; 
	}
	
	#elgg-widget-col-2 {
		margin-right: 2%  !important; 
	}
	<?php } ?>
</style>