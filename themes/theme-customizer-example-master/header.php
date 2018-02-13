<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="UTF-8">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<title><?php wp_title( '' ); ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<div id="header">
			<h1>
				<?php bloginfo( 'title' ); ?>
			</h1>
			<h2>
				<?php bloginfo( 'description' ); ?>
			</h2>
		</div><!-- /#header -->