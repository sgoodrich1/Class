<?php
//get_header();
?>
this is the plugin single template 

		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<b>Thumbnail:</b><?php the_post_thumbnail();?><br>-->

			<b>Full Bio:</b><?php the_content(); ?><br>
			
		<?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
		<b>End WordPress Loop</b>

