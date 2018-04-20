<?php get_header(); ?>

<div id = "wrapper" class = "clearfix">
<main>
<div class="headerlines"></div>
<br><br>
<div class="pictures"><br><br>
This is the plugin archive template ...
<br><br><br>
<?php
//Array for sorting the archive files
$args = array(
            'post_status' => 'publish',
            'post_type' => 'staff_directory',
            'meta_key' => 'staff_directory_sort_order',
            'orderby' => 'meta_value_num',
            'order' => 'ASC'
        );

$query = new WP_Query($args);

if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
$custom = get_post_custom($post->ID);?>
<ul> <!--displaying the posts in sort order -->
	<a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
		<li><?php echo get_the_post_thumbnail(null,array(100, 100));?>
		</li>
	</a><br>Short Bio: <br>
		<li><?php echo $custom["staff_directory_short_bio"][0].'<br><br><br>';?>
		</li>
		
</ul>

<?php

endwhile; else :
echo '<p> '._e( 'Sorry, no staff directory posts to sort.' );
endif;
?>
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