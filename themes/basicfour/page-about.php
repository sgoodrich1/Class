 <?php /* Template Name: About Template */ ?>
 <?php get_header(); ?>
 <main>
 <b>about template</b><br>
 <b>Start WordPress Loop</b><br>
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 <b>Post Title:</b><?php the_title(); ?><br>
<b>Post Content:</b><?php  the_content(); ?><br>
<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<b>End WordPress Loop</b>
 </main>
<?php get_footer(); ?>