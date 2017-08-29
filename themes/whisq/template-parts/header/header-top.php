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
   <a class="user-btn" title="User"><img src="<?php echo esc_url( home_url( '/wp-content/uploads/user-icon.png') ); ?>" class="fa ffa-user"/></a>
    <div class="user-profile">
   		<?php //echo do_shortcode('[woocommerce_my_account current_user]'); 
       if(is_user_logged_in()){
       	?>
          <div class="user-logged user-header">
         	<div class="partition">
         	<?php
         		$current_user = wp_get_current_user();
         	?>
         	<p><?php echo $current_user->display_name; ?></p>
         	<p><?php echo $current_user->display_email; ?></p>
         	</div>
         	<div class="partition">
         		<p><a href="<?php echo esc_url( home_url( '/my-account/orders/') ); ?>" title="Order">orders</a></p>
         		<p><a href="<?php echo esc_url( home_url( '/wishlist/') ); ?>" title="Wishlist">wishlist</a></p>
         		<p><a href="<?php echo esc_url( home_url( '/my-account/edit-address/') ); ?>" title="Addresses">Saved Addresses</a></p>
         		<p><a href="<?php echo esc_url( home_url( '/order-track/') ); ?>" title="Track Your Orders">Track Your Orders</a></p>
         	</div>
         	<div class="partition">
         		<p><a href="<?php echo esc_url( home_url( '/my-account/edit-account/') ); ?>" title="Edit Profile">Edit Profile</a></p>
         		<p><a href="<?php echo esc_url( home_url( '/my-account/customer-logout/') ); ?>" title="Logout">Logout</a></p>
         	</div>
         </div>
         <?php
       } else{ ?>
		<div class="user-login user-header">
		    <p>Your Account</p>
		    <p>Access account and mangae orders</p>
         	<p><a href="<?php echo esc_url( home_url( '/login/') ); ?>" class="btn" title="Login">Login</a></p>
         	<p><a href="<?php echo esc_url( home_url( '/sign-up/') ); ?>" class="btn" title="Sign Up">Sign Up</a></p>
         </div>         
       <?php
       }
   		?>
   </div>
   <a class="cart-customlocation shop-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><img src="<?php echo esc_url( home_url( '/wp-content/uploads/shopping-cart.png') ); ?>" class="fa ffa-shopping-cart"/><span class="count"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span></a>
  
</div><!-- .custom-header -->
