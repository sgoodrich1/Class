<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       sg
 * @since      1.0.0
 *
 * @package    Sharongstaff_Directory
 * @subpackage Sharongstaff_Directory/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php
	global $post;
	$custom = get_post_custom($post->ID);
	$sharongstaff_directory_first_name = $custom["sharongstaff_directory_first_name"][0];
	$sharongstaff_directory_last_name = $custom["sharongstaff_directory_last_name"][0];
		
?>
<fieldset class = "outer">
<legend>SharonGStaff Directory Fields</legend>
	<label class="sharongstaff-directory-label">First Name:</label>
	<input class="sharongstaff-directory-input"  name="sharongstaff_directory_first_name" type="text" value="<?php echo $sharongstaff_directory_first_name; ?>"  required /><br>
	<label class="sharongstaff-directory-label">Last Name:</label>
	<input class="sharongstaff-directory-input"  name="sharongstaff_directory_last_name" type="text" value="<?php echo $sharongstaff_directory_last_name; ?>"  required /><br>
</fieldset>