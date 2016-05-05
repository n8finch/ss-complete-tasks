<?php
/*
Plugin Name: Some More Styles Please!
Plugin URI:  http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Well, what about my theming?!?!?!
Version:     1.5
Author:      Nate Finch
Author URI:  http://URI_Of_The_Plugin_Author
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: some-more-styles-please
*/

namespace some_more_styles_please;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\add_these_plugin_styles_and_scripts' );

function add_these_plugin_styles_and_scripts() {

	wp_enqueue_style( 'included-styles', plugin_dir_url( __FILE__ ) . 'css/included_styles.css' );

}



