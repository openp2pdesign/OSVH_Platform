<?php
/**
 * Add Notifications & Messages Nav Menu Counts.
 */
function yzc_notifications_and_messages_nav_menu_count( $items ) {


    // Set up Array's.

    foreach( $items as $key => $item ) {
        
        // if user logged-in change the Login Page title to Logout.
        if ( strcasecmp( $item->title, 'notifications' ) == 0 ) {
            // Get user Notifications
            $notifications_count = bp_notifications_get_unread_notification_count();

            if ( $notifications_count <= 0 ) {
                continue;
            }

            $item->title .= '<span class="yz-nav-count" style="margin-left: 8px; min-width: 30px; height: 30px; display: inline-block; color: #fff; text-align: center; line-height: 30px; background-color: #FFC107; border-radius: 100%;">'. $notifications_count . '</span>'; 
   
        } elseif( strcasecmp( $item->title, 'messages' ) == 0 ) {
            
            $msgs_count = bp_get_total_unread_messages_count();
            
            if ( $msgs_count <= 0 ) {
                continue;
            }

            $item->title .= '<span class="yz-nav-count" style="margin-left: 8px; min-width: 30px; height: 30px; display: inline-block; color: #fff; text-align: center; line-height: 30px; background-color: #f95e3c; border-radius: 100%;">'. $msgs_count . '</span>';
        }

    }

    return $items;
}

add_filter( 'wp_nav_menu_objects', 'yzc_notifications_and_messages_nav_menu_count', 10 );