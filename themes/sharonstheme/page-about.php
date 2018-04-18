<?php
/**
* The about page template file
*
*
**/
?>
<?php get_header(); ?>
<main>
<div class="headerlines"></div>
about template yesh it is<br><br>
<b>Start WordPress Loop</b><br><br>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'template-parts/post/content', 'page-about' ); ?>
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

 