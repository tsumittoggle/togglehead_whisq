=== PBO Move to Wishlist for YITH WooCommerce Wishlist ===

Contributors: Piotr Boguslawski
Donate link:
Tags: wishlist, woocommerce, products, e-commerce, shop, ecommerce wishlist, woocommerce wishlist, woocommerce 2.3 ready, shop wishlist, cart, wish list, favorites, YITH WooCommerce Wishlist
Requires at least: 4.0
Tested up to: 4.3.1
Stable tag: 1.0.2
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

PBO Move to Wishlist for YITH WooCommerce Wishlist is a simple solution for adding functionality called 'Move to Wishlist' to Shopping Cart.

== Description ==

PBO Move to Wishlist for YITH WooCommerce Wishlist is a simple solution for adding functionality called 'Move to Wishlist' to Shopping Cart. Needs WooCommerce and YITH WooCommerce Wishlist to work.

There are no configuration options. Simply activate this plugin and a special link will appear next to any product in Shopping Cart.

The appearance of 'Move to Wishlist' link can be changed by using style.

Example:
`
.pbo_move_to_wishlist a {
  font-size: 0.8em;
  font-weight: 400;
}
`

There is a possibility to modify plugin texts using filters:

pbo_mtw_message ( $message, $rc, $cart_item, $cart_item_key )
pbo_mtw_label ( $label, $cart_item, $cart_item_key )
pbo_mtw_link_html ( $html, $cart_item, $cart_item_key )

Example:
`
function chg_label($label) {
  return "Transfer to Wishlist";
}
add_filter('pbo_mtw_label', 'chg_to_add');

function chd_message($message, $rc, $cart_item, $cart_item_key) {
  $product = wc_get_product( $cart_item['product_id'] );
  return $product->get_title() . ' transfered to Wishlist.';
}
add_filter('pbo_mtw_message', 'chg_message', 10, 4);
`

== Installation ==

1. Unzip the downloaded zip file.
2. Upload the plugin folder into the `wp-content/plugins/` directory of your WordPress site.
3. Activate `PBO Move to Wishlist for YITH WooCommerce Wishlist` from Plugins page.

And that's it. There are no configuration options.

== Frequently Asked Questions ==

== Screenshots ==

1. Shopping Cart with "Move to Wishlist" buttons
2. Product sucessfully moved to Wishlist
3. Wishlist page with moved product

== Changelog ==

= TODO =

* AJAX
* full cooperation with YITH WooCommerce Wishlist premium version (more than one Wishlist)

= 1.0.2 =

* Added link to full Wishlit page at the bottom of the Shopping cart (template: link-to-wishlist-page.php)
* Code reformating in order to fit Wordpress coding standards

= 1.0.1 =

* Code refactoring
* Added filters and conditions
* Better security with wp_verify_nonce (and wp_nonce_url)

= 1.0.0 =

* Initial version

== Translators ==

* Piotr Boguslawski

= Available Languages =

* English (Default)
* Polish
