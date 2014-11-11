<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
  <?php // Load our CSS ?>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<div class="wrapper">
<header>
	<div class="header-fader header-fader-1"></div>
	<div class="header-fader header-fader-2"></div>
	<div class="header-container">
		<div class="h1-container">
			<h1>
		    	<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
		        <?php bloginfo( 'name' ); ?>
		      	</a>
		    </h1>
		    <h2>
		    	<?php echo get_bloginfo('description'); ?>
		    </h2>
		</div> <!-- /.header-container -->
    </div>	<!-- /.h1-container -->
  	<button class="menu-button">
		<p> <i class="fa fa-list-ul"></i> &nbsp; <span class="menu-title">Menu</span></p>
	</button>
    <div class="menu-container hidden">	
	    <?php wp_nav_menu( array(
	      'container' => false,
	      'theme_location' => 'primary'
	    )); ?>
	    <?php if ( is_page('56')) 
	    	{
	    		if (has_nav_menu('secondary'))
	    			{
	    				wp_nav_menu(array(
	    					'container' => false,
	    					'theme_location' => 'secondary'
	    					));
	    			}
	    	}
	    ?>
	    <button class="close-menu-button">Close</button>
  </div> <!-- /.menu-outer-container -->
</header><!--/.header-->

