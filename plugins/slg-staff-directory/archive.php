<?php
/**
* The archive template file
*http://wordpress/2018/01/
* This is Sharon's Version **/
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width">
	</head>
	<body>
		<?php get_header(); ?>
		<div id = "wrapper" class = "clearfix">
			<main>
				<div class="headerlines"></div>
				<b>tag archive template</b><br><br>
				<b>Start WordPress Loop</b><br>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<?php the_post_thumbnail(); ?><br>
				<b>Post Content:</b><?php the_content(); ?><br>
				<?php endwhile; else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
				<b>End WordPress Loop</b>
			</main>
			<div id = "sidebar">
				<div id="sidebar-primary" class="sidebar">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div>
				<div id="sidebar-primary" class="sidebar">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
				<?php //get_sidebar(); ?><br>
				<?php //get_sidebar('sidebar-1'); ?><br>
				<?php //get_sidebar('sidebar-2'); ?>
			</div> <!-- sidebar -->
		</div><!-- wrapper -->
		<?php get_footer(); ?>
	</body>
</html>