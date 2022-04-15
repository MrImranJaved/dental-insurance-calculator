<?php

/**
 * Include custom js and ajax localized
 * 
 */
function calculator_script_enqueue() {


   global $post;
    $post_slug = $post->post_name;
	 	
    wp_enqueue_script( 'calculator-ajax-script', DENTALINSURANCE__PLUGIN_URL . 'js/calculator-ajax-call.js', array('jquery') , 22 );

    wp_localize_script( 'calculator-ajax-script', 'premium_dental_calculator_ajax_object',
    array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );




 }
add_action( 'wp_footer', 'calculator_script_enqueue'  );



/*
*   include calculator css
*/ 
function calculator_style_enqueue() {

wp_enqueue_style( 'calculator-styles', DENTALINSURANCE__PLUGIN_URL . 'css/calculator-css.css' );

}
add_action( 'wp_enqueue_scripts', 'calculator_style_enqueue' );