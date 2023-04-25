<?php

	function prd_enqueue_media_lib_uploader() {

    //Core media script
    wp_enqueue_media();

    // Your custom js file
    wp_register_script( 'prd-media-js', plugins_url( 'assets/js/prd-media.js' , __FILE__ ), array('jquery') );
    wp_enqueue_script( 'prd-media-js' );
	
	}
	add_action('admin_enqueue_scripts', 'prd_enqueue_media_lib_uploader');

function seonapsi_custom_login_enqueue_styles() {
    wp_register_style('seonapsi-custom-login-styles-css', plugins_url('assets/css/seonapsi-custom-login-styles.css', __FILE__));
    wp_enqueue_style('seonapsi-custom-login-styles-css');


}

// Aggancia la funzione al WordPress 'wp_enqueue_scripts' action hook
add_action('admin_enqueue_scripts', 'seonapsi_custom_login_enqueue_styles');
