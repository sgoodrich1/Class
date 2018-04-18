<?php
get_header(); 
//Had to comment this out because 2017 Theme already shows the thumbnail, and then it's duplicated.slg
?>
<br><br>
<div class="pictures"><br><br>
This is the plugin archive template ...
<br><br>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<b>Thumbnail:</b><br><br>
	<?php the_post_thumbnail();?><br><br>
	<b>Short Bio:</b><br><br>
	<?php $custom = get_post_custom($post->ID);
	//echo '<label class="staff-directory-label">';
	echo $custom["staff_directory_short_bio"][0].'<br><br> ';
	//echo '</label>';
	//echo '<input class="staff-directory-input" type = "text" value = "'.$custom["staff_directory_short_bio"][0].'"><br>';
	endwhile; else : 
	echo '<p> '._e( 'Sorry, no staff directory posts to sort.' ); 
	endif; ?>
</div>
<?php
//get_footer();
?>