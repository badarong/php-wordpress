<?php 
/*
 * Hide frontend admin bar from loggedin users except for administrator
 *
*/
add_filter( 'show_admin_bar', 'remove_admin_bar' );
function remove_admin_bar() {
    if ( current_user_can('administrator') ) {
        return TRUE;
    }else{
        return FALSE;
    }
}
