<?php
/**
 * Plugin Name:       PBO Move to Wishlist for YITH WooCommerce Wishlist
 * Plugin URI:        https://wordpress.org/plugins/pbo-move-to-wishlist-for-yith-woocommerce-wishlist/
 * Description:       PBO Move to Wishlist for YITH WooCommerce Wishlist is a simple solution for adding functionality called 'Move to Wishlist' to Shopping Cart. Needs WooCommerce and YITH WooCommerce Wishlist to work.
 * Version:           1.0.2
 * Author:            Piotr Boguslawski
 * Author URI:        https://wordpress.org/support/profile/piotr-boguslawski
 * Requires at least: 4.0.0
 * Tested up to:      4.3.1
 *
 * Text Domain: pbo-move-to-wishlist
 * Domain Path: /languages/
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

define( 'PBO_MTW_NAME', 'PBO Move to Wishlist for YITH WooCommerce Wishlist' );

/*
 * Installation and initialization
 */

if ( ! function_exists( 'pbo_mtw_not_effective_admin_notice' ) ) {
	function pbo_mtw_not_effective_admin_notice() { ?>
		<div class="error">
			<p><?php echo esc_html( sprintf( __( '%s is enabled but not effective. It requires WooCommerce and YITH WooCommerce Wishlist in order to work.', 'pbo-move-to-wishlist' ), PBO_MTW_NAME ) ); ?></p>
		</div>
		<?php
	}
}


if ( ! function_exists( 'pbo_mtw_install' ) ) {
	function pbo_mtw_install() {
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		if ( ! function_exists( 'WC' ) || ! is_plugin_active( 'yith-woocommerce-wishlist/init.php' ) || get_option( 'yith_wcwl_enabled' ) != 'yes' ) {
			add_action( 'admin_notices', 'pbo_mtw_not_effective_admin_notice' );
		} else {
			do_action( 'pbo_mtw_init' );
		}
	}
}

add_action( 'plugins_loaded', 'pbo_mtw_install', 50 );


if ( ! function_exists( 'pbo_mtw_init' ) ) {
	function pbo_mtw_init() {
		load_plugin_textdomain( 'pbo-move-to-wishlist', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

		if ( is_admin() ) {
			//disabled for now... add_action('admin_menu', 'pbo_mtw_create_settings_menu');
			add_action( 'admin_init', 'pbo_mtw_register_settings' );
		}

		add_action( 'wp_loaded', 'pbo_mtw_action', 50 );

		add_filter( get_option( 'pbo_mtw_hook_for_link', 'woocommerce_cart_item_name' ), 'pbo_mtw_print_link', 15, 3 );
		add_filter( get_option( 'pbo_mtw_hook_for_link_to_wishlist_page', 'woocommerce_cart_contents' ), 'pbo_mtw_print_link_to_wishlist_page', 999 );
	}
}

add_action( 'pbo_mtw_init', 'pbo_mtw_init', 50 );


/*
 * Settings
 */

/* disabled for now...

function pbo_mtw_create_settings_menu() {
  add_submenu_page(
    'yit_plugin_panel',
    __('Move to Wishlist', 'pbo-move-to-wishlist'),
    __('Move to Wishlist', 'pbo-move-to-wishlist'),
    'manage_options',
    'pbo_mtw_settings_page',
    'pbo_mtw_print_settings_page'
  );
}

function pbo_mtw_print_settings_page() { ?>
  <h2><?php echo PBO_MTW_NAME; ?></h2>
  <p>There are no options ;)</p>
<?php
}

*/

function pbo_mtw_register_settings() {
	register_setting(
		'pbo_mtw_options',   // settings section
		'pbo_mtw_label'      // setting name
	);
}


/*
 * Action
 */

if ( ! function_exists( 'pbo_mtw_action_impl' ) ) {
	function pbo_mtw_action_impl( $cart_item_key, $wishlist_id = null, $wishlist_name = null ) {
		$cart_item = WC()->cart->get_cart_item( $cart_item_key );
		if ( $cart_item ) {
			/* Add product to the wishlist. */
			$rc = 'success';
			if ( apply_filters( 'pbo_mtw_add_to_wishlist', true, $cart_item, $cart_item_key, $wishlist_id, $wishlist_name ) ) {
				YITH_WCWL()->details['add_to_wishlist'] = $cart_item['product_id'];
				YITH_WCWL()->details['wishlist_id']     = $wishlist_id;
				YITH_WCWL()->details['wishlist_name']   = $wishlist_name;
				YITH_WCWL()->details['quantity']        = $cart_item['quantity'];
				YITH_WCWL()->details['user_id']         = get_current_user_id();
				$rc                                     = YITH_WCWL()->add();
			}

			if ( $rc != "error" ) {
				/* Remove item from the cart. */
				$product       = wc_get_product( $cart_item['product_id'] );
				$product_title = $product ? $product->get_title() : __( 'Item', 'woocommerce' );
				if ( apply_filters( 'pbo_mtw_remove_from_cart', true, $cart_item, $cart_item_key ) ) {
					WC()->cart->remove_cart_item( $cart_item_key );
					$product_title = apply_filters( 'woocommerce_cart_item_removed_title', $product_title, $cart_item );
				}
				$message = sprintf( get_option( 'pbo_mtw_successfully_moved_message', __( '%s successfully moved to Wishlist.', 'pbo-move-to-wishlist' ) ), $product_title );
			} else {
				$message = YITH_WCWL()->get_errors();
			}
		} else {
			$message = sprintf( __( 'Internal error: %s.', 'pbo-move-to-wishlist' ), "1" );
			$rc      = 'error';
		}

		/* Print message */
		$message = sprintf( '<a href="%s" class="button wc-forward">%s</a>%s', YITH_WCWL()->get_wishlist_url(), esc_html__( 'View Wishlist', 'pbo-move-to-wishlist' ), esc_html( $message ) );
		wc_add_notice( apply_filters( 'pbo_mtw_message', $message, $rc, $cart_item, $cart_item_key ), $rc != 'error' ? 'success' : $rc );
	}
}


if ( ! function_exists( 'pbo_mtw_action' ) ) {
	function pbo_mtw_action() {
		/* If everything is OK with parameters then run implementation... */
		if ( isset( $_GET['move_to_wishlist'] ) && isset( $_GET['_wpnonce'] ) && wp_verify_nonce( $_GET['_wpnonce'], 'pbo-move-to-wishlist' ) ) {
			pbo_mtw_action_impl( sanitize_text_field( $_GET['move_to_wishlist'] ) );

			/* ...ending with pretty URL ;) */
			$referer = wp_get_referer() ? remove_query_arg( array( 'move_to_wishlist' ), wp_get_referer() ) : WC()->cart->get_cart_url();
			wp_safe_redirect( $referer );
			exit;
		}
	}
}


if ( ! function_exists( 'pbo_mtw_print_link' ) ) {
	function pbo_mtw_print_link( $product_name, $cart_item, $cart_item_key ) {
		$url   = esc_url( wp_nonce_url( add_query_arg( 'move_to_wishlist', $cart_item_key, WC()->cart->get_cart_url() ), 'pbo-move-to-wishlist' ) );
		$label = apply_filters( 'pbo_mtw_label', esc_html( get_option( 'pbo_mtw_label', __( 'Move to Wishlist', 'pbo-move-to-wishlist' ) ) ), $cart_item, $cart_item_key );
		$html  = '<div class="pbo_move_to_wishlist"><a href="' . $url . '" rel="nofollow" title="' . $label . '" data-cart_item_key="' . $cart_item_key . '">' . $label . '</a></div>';

		return $product_name . apply_filters( 'pbo_mtw_link_html', $html, $cart_item, $cart_item_key );
	}
}

if ( ! function_exists( 'pbo_mtw_print_link_to_wishlist_page' ) ) {
	function pbo_mtw_print_link_to_wishlist_page() {
		$tmpl_fn_base = 'link-to-wishlist-page.php';
		$tmpl_fn      = locate_template( 'pbo-move-to-wishlist/' . $tmpl_fn_base );
		if ( empty( $tmpl_fn ) ) {
			$tmpl_fn = untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/templates/' . $tmpl_fn_base;
		}

		$wishlist_url       = YITH_WCWL()->get_wishlist_url();
		$wishlist_url_label = esc_html( get_option( 'pbo_mtw_view_wishlist_label', __( 'View Wishlist', 'pbo-move-to-wishlist' ) ) );
		include_once( $tmpl_fn );
	}
}

?>
