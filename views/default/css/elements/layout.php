<?php
/**
 * Page Layout
 *
 * Contains CSS for the page shell and page layout
 *
 * Default layout: 990px wide, centered. Used in default page shell
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>

/* ***************************************
	PAGE LAYOUT
*************************************** */
/***** DEFAULT LAYOUT ******/
<?php // the width is on the page rather than topbar to handle small viewports ?>
.elgg-page-default {
	min-width: 998px;
	min-height: 830px;
	background: url('<?php echo THEME_GRAPHICS; ?>bg_logged_in.jpg') top center no-repeat;
}
.elgg-page-default .elgg-page-header > .elgg-inner {
	min-width: 990px;
	max-width: 1138px;
	margin: 0 auto;
	height: 210px;
}
.elgg-page-default .elgg-page-body > .elgg-inner {
	min-width: 990px;
	max-width: 1138px;
	margin: 0 auto;
}
.elgg-page-default .elgg-page-footer > .elgg-inner {
	min-width: 990px;
	max-width: 1138px;
	margin: 0 auto;
	padding: 20px 0;
}

/***** TOPBAR ******/
.elgg-page-topbar {
	background: #<?php echo THEME_COLOR_1; ?>;
	position: absolute !important;
	height: 30px;
	z-index: 9000;
}
.elgg-page-topbar > .elgg-inner {
	padding: 1px 10px 0;
	min-width: 990px;
	max-width: 1138px;
	width: inherit !important;
	margin: 0 auto;
}
.elgg-page-topbar-theme {
	background: #<?php echo THEME_COLOR_1; ?>;
	position: relative;
	height: 30px;
}
.elgg-page-topbar-theme > .elgg-inner {
	padding: 1px 10px 0;
	min-width: 990px;
	max-width: 1138px;
	width: inherit !important;
	margin: 0 auto;
}

/***** PAGE MESSAGES ******/
.elgg-system-messages {
	position: fixed;
	top: 24px;
	right: 20px;
	max-width: 500px;
	z-index: 2000;
}
.elgg-system-messages li {
	margin-top: 10px;
}
.elgg-system-messages li p {
	margin: 0;
}

/***** PAGE HEADER ******/
.elgg-page-header {
	position: relative;
}
.elgg-page-header > .elgg-inner {
	position: relative;
}

/***** PAGE BODY LAYOUT ******/
.elgg-layout {
	min-height: 360px;
}
.elgg-layout-one-sidebar {
	
}
.elgg-layout-two-sidebar {
	
}
.elgg-layout-error {
}
.elgg-sidebar {
	position: relative;
	float: right;
	width: 240px;
	margin: 0 0 0 10px;
	background: #<?php echo THEME_COLOR_1; ?>;
	color: white;
	box-shadow: 0 3px 3px rgba(0, 0, 0, 0.15);
}

.elgg-sidebar > div {
	padding-left: 20px;
	padding-right: 20px;
}
.elgg-sidebar-alt {
	position: relative;
	padding: 10px 0 0px;
	float: left;
	width: 240px;
	margin: 0 10px 0 0;
	background: none;
	border-top: 1px dashed #333;
}
.elgg-main {
	position: relative;
	min-height: 360px;
	padding: 10px;
	background: white;
	box-shadow: 0 3px 3px rgba(0, 0, 0, 0.45);
}
.elgg-main > .elgg-head {
	padding-bottom: 3px;
	margin-bottom: 10px;
}

/***** PAGE FOOTER ******/
.elgg-page-footer {
	position: relative;
}
.elgg-page-footer,
.elgg-page-footer a,
.elgg-page-footer a:hover,
.elgg-menu-footer > li > a {
	color: #999;
}
