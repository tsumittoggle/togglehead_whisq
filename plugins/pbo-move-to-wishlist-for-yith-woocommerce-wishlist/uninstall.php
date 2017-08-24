<?php
// If uninstall not called from WordPress exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Delete options from options table
delete_option( 'pbo_mtw_hook_for_link' );
delete_option( 'pbo_mtw_hook_for_link_to_wishlist_page' );
delete_option( 'pbo_mtw_label' );
delete_option( 'pbo_mtw_view_wishlist_label' );
delete_option( 'pbo_mtw_successfully_moved_message' );
?>