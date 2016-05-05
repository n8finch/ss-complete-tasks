<?php

/**
 * Register meta box(es).
 */
function n8f_register_meta_boxes() {

	$screens = array( 'post' );
	foreach ( $screens as $screen ) {

		add_meta_box( 'meta-box-id',
			__( 'Current Mood', 'textdomain' ),
			'n8f_my_display_callback',
			$screen,
			'side',
			'high'
		);

	}
}

add_action( 'add_meta_boxes', 'n8f_register_meta_boxes' );


/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function n8f_my_display_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'current_mood_save_meta_box_data', 'current_mood_meta_box_nonce' );
	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, '_current_mood', true );

	echo '<label for="current_mood_field">';
	_e( 'Hey sport! How ya feelin\' right now?', 'fun-stuff' );
	echo '</label> ';
	echo '<input type="text" id="current_mood_field" name="current_mood_field" value="' . esc_attr( $value ) . '" size="32" /><br/>';


}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function current_mood_save_meta_box_data( $post_id ) {
	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['current_mood_meta_box_nonce'] ) ) {
		return;
	}
	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['current_mood_meta_box_nonce'], 'current_mood_save_meta_box_data' ) ) {
		return;
	}
	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}
	/* OK, it's safe for us to save the data now. */
	// Make sure that it is set.
	if ( ! isset( $_POST['current_mood_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$current_mood_data = sanitize_text_field( $_POST['current_mood_field'] );
	// Update the meta field in the database.
	update_post_meta( $post_id, '_current_mood', $current_mood_data );
}

add_action( 'save_post', 'current_mood_save_meta_box_data' );
/*
 * End Custom Meta Box
 -------------------------------------------*/


add_action( 'dynamic_sidebar_before', 'add_the_current_mood_to_posts' );

function add_the_current_mood_to_posts() {

	if ( is_single() ) {
		$id           = get_the_ID();
		$current_mood = get_post_meta( $id, '_current_mood', true );
		echo '<div class="current-mood-box">' .
		     '<h3>This Post\'s cuurent mood: </h3>' .
		     $current_mood .
		     '</div>';
	}
}