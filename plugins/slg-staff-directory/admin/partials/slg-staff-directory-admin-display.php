<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       sgoodrich12763.sb.cis
 * @since      1.0.0
 *
 * @package    Slg_Staff_Directory
 * @subpackage Slg_Staff_Directory/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php
	global $post;
	$custom = get_post_custom($post->ID);
	$staff_directory_first_name = $custom["staff_directory_first_name"][0];
	$staff_directory_last_name = $custom["staff_directory_last_name"][0];

	$staff_directory_email = $custom["staff_directory_email"][0];
	$staff_directory_phone_number = $custom["staff_directory_phone_number"][0];
	$staff_directory_job_title = $custom["staff_directory_job_title"][0];
	$staff_directory_sort_order = $custom["staff_directory_sort_order"][0];
	$staff_directory_short_bio = $custom["staff_directory_short_bio"][0];
		
?>
<fieldset class = "outer">
<legend class="title">Staff Directory Fields</legend>
	<label class="staff-directory-label">First Name:</label>
	<input class="staff-directory-input"  name="staff_directory_first_name" type="text" value="<?php echo $staff_directory_first_name; ?>"  required /><br>
	
	<label class="staff-directory-label">Last Name:</label>
	<input class="staff-directory-input"  name="staff_directory_last_name" type="text" value="<?php echo $staff_directory_last_name; ?>"  required /><br>
	
	<label class="staff-directory-label">Email:</label>
	<input class="staff-directory-input"  name="staff_directory_email" type="text" value="<?php echo $staff_directory_email; ?>"  required /><br>
	
	<label class="staff-directory-label">Phone Number:</label>
	<input class="staff-directory-input"  name="staff_directory_phone_number" type="text" value="<?php echo $staff_directory_phone_number; ?>"  required /><br>

	<label class="staff-directory-label">Job Title:</label>
	<input class="staff-directory-input"  name="staff_directory_job_title" type="text" value="<?php echo $staff_directory_job_title; ?>"  required /><br>

	<label class="staff-directory-label">Sort Order:</label>
	<input class="staff-directory-input"  name="staff_directory_sort_order" type="text" value="<?php echo $staff_directory_sort_order; ?>"  required /><br>
	
	<label class="staff-directory-label">Short Bio:</label>
	<input class="staff-directory-input"  name="staff_directory_short_bio" type="text" value="<?php echo $staff_directory_short_bio; ?>"  required /><br>
	
	
	</fieldset>