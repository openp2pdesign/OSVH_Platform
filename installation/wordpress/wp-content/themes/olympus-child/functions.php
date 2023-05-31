<?php

/* Create Pilot Training User Role */
add_role(
    'pilot_training', //  System name of the role.
    __( 'Pilot Training'  ), // Display name of the role.
    array(
        'read'  => true,
        'delete_posts'  => false,
        'delete_published_posts' => false,
        'edit_posts'   => false,
        'publish_posts' => false,
        'edit_published_posts'   => false,
        'upload_files'  => true,
        'moderate_comments'=> false, // This user will be able to moderate the comments.
    )
);

 // Allow pilot training to see Private posts and pages
 $subRole = get_role( 'pilot_training' ); 
 $subRole->add_cap( 'read_private_pages' );
 $subRole->add_cap( 'read_private_posts' );

/* -------------------------------------------------------
 Enqueue CSS from child theme style.css
-------------------------------------------------------- */


function crum_child_css() {
	wp_enqueue_style( 'child-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'crum_child_css', 99 );


/* -------------------------------------------------------
 You can add your custom functions below
 -------------------------------------------------------- */

/* https://wordpress.stackexchange.com/questions/300621/using-jquery-on-only-one-page */

function no_login_on_register() {
    if(is_page( 923 )) {
      wp_enqueue_script('custom', get_stylesheet_directory_uri().'/custom.js');
    }
}
add_action('wp_enqueue_scripts', 'no_login_on_register');

function custom_loginlogo() {
echo '<style type="text/css">
h1 a {background-image: url(https://platform.villagehosts.eu/wp-content/themes/olympus-child/villagehosts_logo.png) !important; }</style>';
}
add_action('login_head', 'custom_loginlogo');

function bbp_enable_visual_editor( $args = array() ) {
    $args['tinymce'] = true;
    $args['teeny'] = false;
    return $args;
}
add_filter( 'bbp_after_get_the_content_parse_args', 'bbp_enable_visual_editor' );

/*
* Notification Icon with Counter Shortcode
*  use [noticon]
*/

function yzc_notification_sc(){
	$notifications_count = bp_notifications_get_unread_notification_count();
	$not_icon = '<i class="fa fa-bell"></i><span class="yz-notification-count-header" style="color: #fff; text-align: center; background-color: #4990ee; border-radius: 100%;">'. $notifications_count . '</span>';

	return $not_icon;
}

add_shortcode('noticon','yzc_notification_sc');

/*
* Message Icon with Counter Shortcode
*  use [mesicon]
*/

function yzc_message_sc(){
	$msgs_count = bp_get_total_unread_messages_count();
	$mes_icon = '<i class="fa fa-envelope"></i><span class="yz-message-count-header" style="color: #fff; text-align: center; background-color: #4990ee; border-radius: 100%;">'. $msgs_count . '</span>';

	return $mes_icon;

}

add_shortcode('mesicon','yzc_message_sc');

/* Allow span tags for user mention */
/* From: https://gist.github.com/tylerforret/d383b9af6b43e64293ad9d582ece475b
 * */

function myextensionTinyMCE($init) {
    // Command separated string of extended elements
    $ext = 'span[id|name|class|style]';

    // Add to extended_valid_elements if it alreay exists
    if ( isset( $init['extended_valid_elements'] ) ) {
        $init['extended_valid_elements'] .= ',' . $ext;
    } else {
        $init['extended_valid_elements'] = $ext;
    }

    // Super important: return $init!
    return $init;
}

add_filter('tiny_mce_before_init', 'myextensionTinyMCE' );


