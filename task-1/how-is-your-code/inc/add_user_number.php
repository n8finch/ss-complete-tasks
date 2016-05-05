<?php

/**
 * Add User Number
 */

function change_the_howdy( $translation, $text ) {

	$id = get_current_user_id();

	$rand = rand( 1, 999999 );

	if ( $text == 'Howdy, %1$s' ) {
		$translation = 'Hi there, User: ' . $rand . '-' . $id;
	}

	return $translation;
}

add_filter( 'gettext', 'change_the_howdy', 10, 3 );

