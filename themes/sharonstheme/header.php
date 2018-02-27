<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<!--
	<link rel="stylesheet" href="<?php //bloginfo('stylesheet_url'); ?>">
	-->
	<link href="https://fonts.googleapis.com/css?family=Oregano|Rock+Salt" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>
	<div class="headerlines"></div>
	<header>
		<div id="headerStyle">Sharon's Favorite Things</div>
		<?php //wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
		<?php
		wp_nav_menu(
		array(
		'theme_location' => 'header-menu',
		'container_class' => 'my_header_menu_class',
		'container' => 'nav',
		)
		);
		?>
	</header>
	<div class="headerlines"></div>
