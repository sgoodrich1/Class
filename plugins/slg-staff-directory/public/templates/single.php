<?php
//get_header();  
//Had to comment this out to work with 2017 Theme.  It already shows the thumbnail, and then it's duplicated, but it works with my theme.slg
?>
<br><br>
<div class="pictures"><br><br>
This is the plugin single template ...
<br><br>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<b>Thumbnail:</b><br><br>
	<?php the_post_thumbnail();?><br><br>
	<b>Full Bio:</b><br><br><?php the_content(); ?>
	<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
</div>
<?php
//get_footer(); 
//Had to comment out - 2017 theme has its own footer.
?>