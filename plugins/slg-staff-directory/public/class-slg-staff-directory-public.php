<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       sgoodrich12763.sb.cis
 * @since      1.0.0
 *
 * @package    Slg_Staff_Directory
 * @subpackage Slg_Staff_Directory/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Slg_Staff_Directory
 * @subpackage Slg_Staff_Directory/public
 * @author     Sharon Goodrich <sgoodrich1@cnm.edu>
 */
class Slg_Staff_Directory_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Slg_Staff_Directory_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Slg_Staff_Directory_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/slg-staff-directory-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Slg_Staff_Directory_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Slg_Staff_Directory_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/slg-staff-directory-public.js', array( 'jquery' ), $this->version, false );

	}
/**************added in class 04/10/18****************/

	//add_filter( 'template_include', 'staff_directory_template_chooser');
	function staff_directory_template_chooser( $template ) {
	 
		//die('staff_directory_template_chooser');
		// Post ID
		$post_id = get_the_ID();
		//die(get_post_type( $post_id ));
	 
		// For all other CPT
		if ( get_post_type( $post_id ) != 'staff_directory' ) {
			return $template;
		}
	 
		// Else use custom template
		if ( is_single() ) {
			return $this->staff_directory_get_template_hierarchy( 'single' );
		}	 
				// Else use custom template
		if ( is_archive() ) {
			return $this->staff_directory_get_template_hierarchy( 'archive' );
		}	
	}

	//
	function staff_directory_get_template_hierarchy( $template ) {
	 
		//die('staff_directory_get_template_hierarchy');
		//die($template);
		//return;
		// Get the template slug
		$template_slug = rtrim( $template, '.php' );
		$template = $template_slug . '.php';
	 
		// Check if a custom template exists in the theme folder, if not, load the plugin template file
		if ( $theme_file = locate_template( array( 'slg-staff_directory/' . $template ) ) ) {
			$file = $theme_file;
		}
		else {
			$file = plugin_dir_path( __FILE__ ) . 'templates/' . $template;
		}
	 
		return apply_filters( 'staff_directory_template_' . $template, $file );
	}	



}

