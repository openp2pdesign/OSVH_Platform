<?php
/*
Plugin Name: bbp Mentions Suggest
Plugin URI: http://www.rewweb.co.uk/mentions_suggest
Description: Adds the Buddypress mentions suggest as you type to bbpress topics and replies
Version: 1.3
Author: Robin Wilson
Author URI: http://www.rewweb.co.uk
License: GPL2
*/
/*  Copyright 2018  PLUGIN_AUTHOR_NAME  (email : wilsonrobine@btinternet.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

	*/
	

add_action( 'wp_enqueue_scripts', 'bms_enqueue_submit' );

function bms_enqueue_submit() {
	$path = plugins_url('bbp-mentions-suggest/js/forum.js') ;
	//loaded dependent on the buddypress bp-mentions being loaded
	wp_enqueue_script( 'bms_enqueue_submit',$path, array( 'bp-mentions' ));	
}
	
add_filter( 'bp_activity_maybe_load_mentions_scripts', 'bms_enable_mentions_in_group_forum_textareas' );
/**
 * Enable at-mention autocomplete on BuddyPress group forum textareas.
 */
function bms_enable_mentions_in_group_forum_textareas( $retval ) {
	$bbpress = false;

	// Group forum reply.
	if ( bp_is_group() && 'topic' === bp_action_variable() && bp_action_variable( 1 ) ) {
		$bbpress = true;
	}

	// Group forum topic.
	if ( bp_is_group() && bp_is_current_action( 'forum' ) ) {
		$bbpress = true;
	}

	// Do stuff when on a group forum page.
	if ( is_bbpress() ) {
		$retval = true;
		
	}
	
	return $retval;
}





