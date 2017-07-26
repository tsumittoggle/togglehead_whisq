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
   <?php if ( is_front_page() ) {?> 
   <a class="user-btn" title="User"><img src="wp-content/uploads/user-icon.png" class="fa ffa-user"/></a>
    <div class="user-profile">
   		<?php //echo do_shortcode('[woocommerce_my_account current_user]'); ?>
   </div>
   <a class="cart-customlocation shop-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><img src="wp-content/uploads/shopping-cart.png" class="fa ffa-shopping-cart"/><span class="count"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span></a>
   <?php } 
   else {?>
     <a class="user-btn" title="User"><img src="../wp-content/uploads/user-icon.png" class="fa ffa-user"/></a>
    <div class="user-profile">
   		<?php //echo do_shortcode('[woocommerce_my_account current_user]'); ?>
   </div>
   <a class="cart-customlocation shop-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><img src="../wp-content/uploads/shopping-cart.png" class="fa ffa-shopping-cart"/><span class="count"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span></a>
   <?php } ?>
</div><!-- .custom-header -->
