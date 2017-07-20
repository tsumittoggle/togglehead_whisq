<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="header-top">
   <a class="user-btn" title="User"><i class="fa fa-user" aria-hidden="true"></i></a>
    <div class="user-profile">
   		<?php echo do_shortcode('[woocommerce_my_account current_user]'); ?>
   </div>
   <a class="cart-customlocation shop-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></a>
</div><!-- .custom-header -->
