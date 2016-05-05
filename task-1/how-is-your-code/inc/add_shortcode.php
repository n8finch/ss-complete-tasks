<?php

function bottom_line_shortcode( $atts, $content = "" ) {

	$output = '';

	$output .= '<div class="bottom-line-box">';
	$output .= '<i><h4>The Bottom Line:</h4></i>';
	$output .= '<p>'.$content.'</p>';
	$output .= '</div>';

	return $output;
}

add_shortcode( 'bottom-line', 'bottom_line_shortcode' );