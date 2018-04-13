<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       sgoodrich12763.sb.cis
 * @since      1.0.0
 *
 * @package    Sharong_Staff_Directory
 * @subpackage Sharong_Staff_Directory/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php
	query_posts( "post_type=sharong_staff_directory".$query_string."&meta_key=sharong_staff_directory_sort_order&orderby=meta_value_num&order=ASC" );

	
?>
<fieldset class = "outer">
<legend>Staff Directory Sort Order</legend>

 <?php 
 if ( have_posts() ) : while ( have_posts() ) : the_post(); 
 $custom = get_post_custom($post->ID);
 echo '<label class="sharong-staff-directory-label">';
 echo $custom["sharong_staff_directory_first_name"][0].' ';
 echo $custom["sharong_staff_directory_last_name"][0].' ';
 echo '</label>';
 echo '<input class="sharong_staff-directory-input" type = "text" value = "'.$custom["staff_directory_sort_order"][0].'"><br>';
 endwhile; else : 
	echo '<p> '._e( 'Sorry, no staff directory posts to sort.' ); 
endif; 
?>
</fieldset>