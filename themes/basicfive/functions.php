<?php
add_action( 'wp_enqueue_scripts', 'cis_add_hello_script' );
function cis_add_hello_script() {
    wp_enqueue_script(
        'hello-script', // name the script so that you can attach other scripts and de-register, etc.
        get_template_directory_uri() . 'assets/js/hello.js', // this is the location of the script file
        array('jquery') // this array lists the scripts upon which your script depends
    );
}