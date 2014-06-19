<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="no-js" lang="en" >
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
	<?php wp_title(' - ', true, 'right'); ?>
	<?php bloginfo('name'); ?>
	</title>
	<!-- build:css css/libraries.min.css -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bower_components/font-awesome/css/font-awesome.css">
    <!-- bower:css -->
    <!-- endbower -->
    <!-- endbuild -->
    <!-- build:css css/app.min.css -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/app.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/app_override.css">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<!--Uncomment this to use a favicon.ico in the theme directory: -->
	<!--<link rel="SHORTCUT ICON" href="<?php bloginfo('template_directory'); ?>/favicon.ico"/>-->
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<!-- endbuild -->
    <!-- build:js js/vendor/modernizr.min.js -->
    <script src="<?php bloginfo('template_url'); ?>/bower_components/modernizr/modernizr.js"></script>
    <!-- endbuild -->

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

	<div data-magellan-expedition="fixed">
      	<div class="nav_container">
        	<div class="row">
        		<div class="large-12 columns">

          			<nav class="top-bar" data-topbar>
			
			            <ul class="title-area">
            			    <li class="name"><h1><a href="#" alt="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1></li>
                			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
              			</ul>
 		                <section class="top-bar-section">
             			   <!-- Right Nav Section -->
                			<ul class="right">
                  				<?php wp_nav_menu(array('theme_location' => 'header_nav')); ?>
                			</ul>
		            <nav>
		        </div>
        	</div>
        </div>
    </div>