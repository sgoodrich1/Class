 
<?php get_header(); ?>
<div id = "wrapper" class = "clearfix">
<main>
	<div class="headerlines"></div>
	<br><br>
	<div class="pictures"><br><br>
		This is the plugin single template ...
	<br><br>
 
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<br><br>
	<?php the_post_thumbnail();?><br><br>
		<b>Full Bio:</b><br><br><?php the_content(); ?>
	<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
	</div> <!-- pictures -->
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

 

 

