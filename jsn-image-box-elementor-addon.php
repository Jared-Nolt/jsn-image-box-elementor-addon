<?php
/**
 * Plugin Name: JSN Image Box Elementor Addon
 * Description: Simple hello world widgets for Elementor.
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: jsn-elementor-addon
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.25.0
 */

function register_jsn_image_box( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/jsn-image-box.php' );

	$widgets_manager->register( new \Elementor_Jsn_Image_Box() );

}
add_action( 'elementor/widgets/register', callback: 'register_jsn_image_box' );