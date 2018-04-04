<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       sg
 * @since      1.0.0
 *
 * @package    Sharongstaff_Directory
 * @subpackage Sharongstaff_Directory/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Sharongstaff_Directory
 * @subpackage Sharongstaff_Directory/includes
 * @author     Sharon Goodrich <sgoodrich1@cnm.edu>
 */
class Sharongstaff_Directory_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'sharongstaff-directory',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
