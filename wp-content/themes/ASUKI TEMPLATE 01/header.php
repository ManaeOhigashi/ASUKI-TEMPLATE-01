<!doctype html>
<html class="no-js" lang="ja">
    <head>
	<meta name="google-site-verification" content="C6SZnjYzHc8hXULfcrE67dalc12jNgDaSvh8l95tu2I" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="format-detection" content="telephone=no">
        <title><?php echo $site_title; ?></title>
	<link rel="shortcut icon" href="<?php echo get_the_favicon_image_url(); ?>">
    <!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <!--　BASE CSS,JS -->
        <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
    <?php wp_head(); ?>
    </head>
<body id="container" class="drawer drawer-top drawer-navbar <?php echo get_post($wp_query->post->ID)->post_name; ?>">
    <header class="mainColorBG">
	<div class="headerIntro">
	    <?php if ( get_the_logo_image_url() ) : ?>
	    <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home' class="headLogo">
		<h1><img src='<?php echo get_the_logo_image_url(); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></h1>
	    </a>
	    <?php else : ?>
	    <a href="<?php echo home_url(); ?>/" class="headLogo">
		<h1><?php bloginfo('name');?></h1>
	    </a>
	    <?php endif; ?>
        <div class="clear"></div>
    </div>
  <div class="drawer-header">
    <a href="<?php echo get_option('googleMapURL'); ?>" target="_blank"><img src="<?php echo get_the_headmap_image_url(); ?>" class="PCnone mapIconSP"></a>
    <button type="button" class="drawer-toggle drawer-hamburger">
      <span class="sr-only">MENU</span>
      <span class="drawer-hamburger-icon"></span>
    </button>
  </div>
  <!-- /.drawer-MENU -->
  <div class="drawer-main drawer-navbar-default headerNav mainColorBG">
    <ul  id="left-to-right" class="headNav dropmenu fontEN">
	<?php if ( get_the_logo_image_url() ) : ?>
	    <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home' class="PCnone">
		<h1><img src='<?php echo get_the_logo_image_url(); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></h1>
	    </a>
	    <?php else : ?>
	    <a href="<?php echo home_url(); ?>/" class="headLogo">
		<h1><?php bloginfo('name');?></h1>
	    </a>
	<?php endif; ?>
	  <li><a href="<?php echo home_url(); ?>/">HOME</a></li>
	  <li><a href="<?php echo home_url(); ?>/concept">CONCEPT</a></li>
	  <li><a href="<?php echo home_url(); ?>/menu">MENU</a></li>
	  <li><a href="<?php echo home_url(); ?>/shopinfo">SHOP INFO.</a></li>
	  <li><a href="<?php echo home_url(); ?>/news">NEWS</a></li>
	  <li><a href="<?php echo get_option('facebookPage'); ?>" target="_blank">FACEBOOK</a></li>
    </ul>
  </div>
  <!-- /.drawer-MENU -->
</header>
 