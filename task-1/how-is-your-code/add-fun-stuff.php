<?php
/*
Plugin Name: How's Your Code?
Plugin URI:  http://URI_Of_Page_Describing_Plugin_and_Updates
Description: This describes my plugin in a short sentence
Version:     1.5
Author:      Nate Finch
Author URI:  http://URI_Of_The_Plugin_Author
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: how-is-your-code
*/

require_once plugin_dir_path ( __FILE__ ) . 'inc/add_user_number.php';

require_once plugin_dir_path ( __FILE__ ) . 'inc/current_mood_meta_box.php';

require_once plugin_dir_path ( __FILE__ ) . 'inc/add_shortcode.php';

add_action( 'wp_enqueue_scripts', 'add_these_plugin_styles_and_scripts');

function add_these_plugin_styles_and_scripts() {

	wp_enqueue_style( 'included-styles', plugin_dir_url( __FILE__ ) . 'css/included_styles.css' );

	wp_enqueue_script( 'included-js', plugin_dir_url( __FILE__ ) . 'js/included_js.js', array( 'jquery' ), false, false );


}



