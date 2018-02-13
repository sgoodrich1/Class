<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<!--
	<link rel="stylesheet" href="<?php //bloginfo('stylesheet_url'); ?>">
	-->
	 <?php wp_head(); ?>
</head>

<body>
<header>
this is the header
 <?php //wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
 <?php
 wp_nav_menu(
  array(
    'theme_location' => 'header-menu',
    'container_class' => 'my_header_menu_class',
	'container'	=> 'nav',
  )
);
 ?>
</header>