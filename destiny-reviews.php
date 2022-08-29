<?php

/**
 * Plugin Name:       Destiny Reviews
 * Plugin URI:        https://webdevartur.com/
 * Description:       The lightweight plugin to show reviews on your website which will help generate more leads and makre more conversions.
 * Version:           1.2.1
 * Requires at least: 5.7.2
 * Requires PHP:      7.3+
 * Author:            Artur Burkalo
 * Author URI:        https://webdevartur.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       destiny-reviews
 * Domain Path:       /languages
 */

if (!defined('WPINC'))
{
    die; // Abort if accessed directly
    
}

//add js to admin
function dr_enqueue_admin_script( $hook ) {
    wp_register_script( 'dr-admin-script', plugin_dir_url( __FILE__ ) . 'js/admin/script.js', array(), '1.0', true, 100 );
    wp_enqueue_script('dr-admin-script'); 
}
add_action( 'admin_enqueue_scripts', 'dr_enqueue_admin_script' );

//load php files from includes
foreach (glob(plugin_dir_path(__FILE__) . "includes/*.php") as $file)
{
    include_once $file;
}
