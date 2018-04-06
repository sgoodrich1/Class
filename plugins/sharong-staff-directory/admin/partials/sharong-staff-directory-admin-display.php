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
	global $post;
	$custom = get_post_custom($post->ID);
	$sharong_staff_directory_first_name = $custom["sharong_staff_directory_first_name"][0];
	$sharong_staff_directory_last_name = $custom["sharong_staff_directory_last_name"][0];
		
?>
<fieldset class = "outer">
<legend>Staff Directory Fields</legend>
	<label class="sharong-staff-directory-label">First Name:</label>
	<input class="sharong-staff-directory-input"  name="sharong_staff_directory_first_name" type="text" value="<?php echo $sharong_staff_directory_first_name; ?>"  required /><br>
	<label class="sharong-staff-directory-label">Last Name:</label>
	<input class="sharong-staff-directory-input"  name="sharong_staff_directory_last_name" type="text" value="<?php echo $sharong_staff_directory_last_name; ?>"  required /><br>
	<label class="sharong-staff-directory-label">Sort Order:</label>
	<input class="sharong-staff-directory-input"  name="sharong_staff_directory_sort_order" type="text" value="<?php echo $sharong_staff_directory_sort_order; ?>"  required /><br>

</fieldset>