<?php
/**
 * Displays header header bottom
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="header-bottom cf">
 	<div class="wrapper cf">
		  <?php
			  $custom_logo_id = get_theme_mod( 'custom_logo' );
			  $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			  ?>
			  <h1>
			  	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="WhisQ"><img src="<?php echo $image[0]; ?>"/></a>
			  </h1>
	    <?php
				if ( has_nav_menu( 'header-menu' ) ) : ?>
					<nav class="header-section">
					<div class="hamburger">
						<span></span>
						<span></span>
						<span></span>
					</div>
					<div class="menu-main">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'header-menu', 
								'menu_class'     => 'header-links-menu',
							) );
						?>
						</div>
					</nav>
				<?php endif;
    ?>
    <div class="search">
    	<button class="search-btn" title="Secrh"><i class="fa fa-search" aria-hidden="true"></i><i class="fa fa-times close-serach" aria-hidden="true"></i></button>
    	<?php echo do_shortcode('[yith_woocommerce_ajax_search]');?>
    </div>
	</div><!-- .wrap -->
</div><!-- .site-branding -->
