<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       paulc2763.sb.cis
 * @since      1.0.0
 *
 * @package    Staff_Directory
 * @subpackage Staff_Directory/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php
	query_posts( "post_type=staff_directory".$query_string."&meta_key=staff_directory_sort_order&orderby=meta_value_num&order=ASC" );

	
?>
<fieldset class = "outer">
<legend>Staff Directory Sort Order</legend>

 <?php 
 if ( have_posts() ) : while ( have_posts() ) : the_post(); 
 $custom = get_post_custom($post->ID);
 echo '<label class="staff-directory-label">';
 echo $custom["staff_directory_first_name"][0].' ';
 echo $custom["staff_directory_last_name"][0].' ';
 echo '</label>';
 echo '<input class="staff-directory-input" type = "text" value = "'.$custom["staff_directory_sort_order"][0].'"><br>';
 endwhile; else : 
	echo '<p> '._e( 'Sorry, no staff directory posts to sort.' ); 
endif; 
?>
</fieldset>