<?php
function basiceight_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'basiceight_scripts' );
//add_action( 'wp_enqueue_scripts', 'cis_add_hello_script' );
function cis_add_hello_script() {
	//die('cis_add_hello_script');
	wp_register_script(
        'hello-script', // name the script so that you can attach other scripts and de-register, etc.
        get_template_directory_uri() . '/assets/js/hello.js', // this is the location of the script file
        array('jquery') // this array lists the scripts upon which your script depends
    );
	wp_enqueue_script('hello-script');
}
function themename_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'theme_name' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
 
    register_sidebar( array(
        'name'          => __( 'Secondary Sidebar', 'theme_name' ),
        'id'            => 'sidebar-2',
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'themename_widgets_init' );
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );
 //////////// Customizer ///////////////////////

