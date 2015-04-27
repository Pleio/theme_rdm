<?php
?>
#theme-rdm-images-logo,
#theme-rdm-images-plant,
#theme-rdm-images-potlood-inloggen,
#theme-rdm-images-potlood-weten,
#theme-rdm-images-potlood,
#theme-rdm-images-textbook {
	position: absolute;
}


#theme-rdm-images-logo-container {
	width: 208px;
	margin: 0 auto;
}

#theme-rdm-images-logo {
	background: url('<?php echo THEME_GRAPHICS; ?>logo.png') no-repeat;
	height: 128px;
    width: 208px;
    top: 20px;
}

#theme-rdm-images-plant {
	background: transparent url('<?php echo THEME_GRAPHICS; ?>plant.png') no-repeat scroll 780px 0px;
	width: 100%;
	height: 528px;
	top: 0px;    
}

#theme-rdm-images-textbook {
	background: url('<?php echo THEME_GRAPHICS; ?>textbook.png') no-repeat scroll 0px 0px;
	
    top: 170px;
    width: 1495px;
	height: 771px;
	display: none;
}

#theme-rdm-images-potlood-container {
	width: 407px;
	margin: 0 auto;
	position: relative;
}

#theme-rdm-images-potlood-inloggen {
	background: url('<?php echo THEME_GRAPHICS; ?>potlood_inloggen.png') no-repeat scroll 0px 0px;
	top: 0px;
    width: 407px;
	height: 247px;
}

#theme-rdm-images-potlood-weten {
	background: url('<?php echo THEME_GRAPHICS; ?>potlood_weten.png') no-repeat scroll 0px 0px;
	height: 247px;
    left: -90px;
    top: 58px;
    width: 570px;
}

#theme-rdm-images-potlood {
	background: url('<?php echo THEME_GRAPHICS; ?>potlood.png') no-repeat scroll 0px 0px;
	height: 247px;
    right: -73px;
    top: 58px;
    width: 114px;
}

@media (min-width: 1495px) {

	#theme-rdm-images-plant {
		right: 0px;
		background-position: top right;
	}

	#theme-rdm-images-textbook {
		display: block;	
	}
}
