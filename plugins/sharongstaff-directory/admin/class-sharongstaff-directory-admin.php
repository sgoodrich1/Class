<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       sg
 * @since      1.0.0
 *
 * @package    Sharongstaff_Directory
 * @subpackage Sharongstaff_Directory/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sharongstaff_Directory
 * @subpackage Sharongstaff_Directory/admin
 * @author     Sharon Goodrich <sgoodrich1@cnm.edu>
 */
class Sharongstaff_Directory_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sharongstaff_Directory_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sharongstaff_Directory_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sharongstaff-directory-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sharongstaff_Directory_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sharongstaff_Directory_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sharongstaff-directory-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	public function register_sharongstaff_directory_post_type() {
		register_post_type( 'sharongstaff_directory',
			array(
				'labels' => array(
				'name' => __( 'SharonGStaff Directory' ),
				'singular_name' => __( 'SharonGStaff Directory' )
				),
			'public' => true,
			'has_archive' => true,
			)
		);	
	}
	public function display_sharongstaff_directory_meta_fields() {
		//https://developer.wordpress.org/reference/functions/add_meta_box/
		//add_meta_box(id,title,callback,screen,context,priority,callback_args)
		add_meta_box("sharongstaff_directory_meta", "SharonGStaff Directory Details", array($this,"render_sharongstaff_directory_meta_options"), "sharongstaff_directory", "normal", "default");
	}
	public function render_sharongstaff_directory_meta_options() {
		require_once plugin_dir_path( __FILE__ ) . 'partials/sharongstaff-directory-admin-display.php';
	}
	
	
	
	public function save_sharongstaff_directory_meta_fields() {
		global $post;
		$sharongstaff_directory_first_name = sanitize_text_field( $_POST['sharongstaff_directory_first_name'] );
		update_post_meta($post->ID, "sharongstaff_directory_first_name", $sharongstaff_directory_first_name);
		$sharongstaff_directory_last_name = sanitize_text_field( $_POST['sharongstaff_directory_last_name'] );
		update_post_meta($post->ID, "sharongstaff_directory_last_name", $sharongstaff_directory_last_name);

	}	
	
	
	

}
