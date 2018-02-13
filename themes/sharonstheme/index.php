<?php
/**
 * The main template file
 *
 * This is Sharon's Version of the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 **/
 ?>
 <!DOCTYPE html>
<html>
	<?php get_header(); ?>
	 <div id = "wrapper" class = "clearfix">
	<head>
		<meta name="viewport" content="width=device-width">
	</head>

	<body>
		<main>
			<b>Start WordPress Loop</b><br>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<b>Post Title:</b><?php the_title(); ?><br>
				<b>Post Content:</b><?php the_content(); ?><br>
				<b>Thumbnail:</b><?php the_post_thumbnail();?><br>
				<?php endwhile; else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
			<b>End WordPress Loop</b>
		</main>
		
		<div id = "sidebar">
			<div id="sidebar-primary" class="sidebar">
				<?php //dynamic_sidebar( 'sidebar-1' ); ?>
			</div>
			<div id="sidebar-primary" class="sidebar">
				<?php //dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
			<?php  //get_sidebar(); ?><br>
			<?php  get_sidebar('sidebar-1'); ?><br>
			<?php  get_sidebar('sidebar-2'); ?>
		</div> <!-- sidebar -->
		
	</body>
	 </div><!-- wrapper -->
	<?php get_footer(); ?>
</html>