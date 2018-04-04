<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              sg
 * @since             1.0.0
 * @package           Sharongstaff_Directory
 *
 * @wordpress-plugin
 * Plugin Name:       SharonGStaff Directory
 * Plugin URI:        example.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Sharon Goodrich
 * Author URI:        sg
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sharongstaff-directory
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sharongstaff-directory-activator.php
 */
function activate_sharongstaff_directory() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sharongstaff-directory-activator.php';
	Sharongstaff_Directory_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sharongstaff-directory-deactivator.php
 */
function deactivate_sharongstaff_directory() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sharongstaff-directory-deactivator.php';
	Sharongstaff_Directory_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sharongstaff_directory' );
register_deactivation_hook( __FILE__, 'deactivate_sharongstaff_directory' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sharongstaff-directory.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sharongstaff_directory() {

	$plugin = new Sharongstaff_Directory();
	$plugin->run();

}
run_sharongstaff_directory();
