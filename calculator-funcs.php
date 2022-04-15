<?php

/*

Plugin Name: Dental Insurance Premium Calculator

Description: This plugin provides calculation based on age group 

Version:     1.0.0

Author:      Imran Javed

Author URI:  http://www.techscale.io/

License:     GPLv2 or later

License URI: https://www.gnu.org/licenses/gpl-2.0.html

Text Domain: dental-insurance-Premium-calculation

*/

// Exit if accessed directly

if ( !defined( 'ABSPATH' ) ) exit;


// Global Variables 

//define( 'DENTALINSURANCE__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

define( 'DENTALINSURANCE__PLUGIN_DIR', ABSPATH  .'wp-content/plugins/premium-calculator/' );
define( 'DENTALINSURANCE__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'DENTALINSURANCE__CHILD_THEME_DIR', get_stylesheet_directory() );
//echo DENTALINSURANCE__PLUGIN_DIR;
// print_r(get_page_templates());
/**
 * Hook in admin function file
 * 
 */

 require_once(  DENTALINSURANCE__PLUGIN_DIR. 'admin/admin-function.php' );
 require_once(  DENTALINSURANCE__PLUGIN_DIR. 'admin/pages/dental-premium-leads.php' );
 require_once(  DENTALINSURANCE__PLUGIN_DIR. 'admin/pages/create-pages.php' );
 require_once(  DENTALINSURANCE__PLUGIN_DIR. 'includes/ajax_calls.php' );
 include( DENTALINSURANCE__PLUGIN_DIR . 'includes/ij-install.php' );
 include( DENTALINSURANCE__PLUGIN_DIR . 'includes/styles-and-js-include.php' );
 include( DENTALINSURANCE__PLUGIN_DIR . 'includes/emailsending.php' );
 
 
 
 
 /*
*   Add page slug as class in body tag
*/


function ij_func_body_class($classes) {
	
	global $post; 
    // $page = get_page_by_path( 'lf-beregner' );
   //$page_slug =  isset($post->post_name) ? $post->post_name : 'imran-javed';
	
    //$classes[] = $page_slug; 
   $classes[] =  'calculate-premium-tooth-insurance' ;
	
    return $classes;
}

add_filter('body_class', 'ij_func_body_class');
?>