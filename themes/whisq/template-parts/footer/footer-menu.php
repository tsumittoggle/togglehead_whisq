<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
  <nav class="footer-nav cf">
    <?php
				if ( has_nav_menu( 'footer-menu-first' ) ) : ?>
					<div class="footer-section">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu-first', 
								'menu_class'     => 'footer-links-menu',
							) );
						?>
					</div>
				<?php endif;
    ?>
    <?php
				if ( has_nav_menu( 'footer-menu-second' ) ) : ?>
					<div class="footer-section">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu-second', 
								'menu_class'     => 'footer-links-menu',
							) );
						?>
					</div>
				<?php endif;
    ?>
    <?php
				if ( has_nav_menu( 'footer-menu-third' ) ) : ?>
					<div class="footer-section">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu-third', 
								'menu_class'     => 'footer-links-menu',
							) );
						?>
					</div>
				<?php endif;
    ?>
    <?php
				if ( has_nav_menu( 'footer-menu-fourth' ) ) : ?>
					<div class="footer-section">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu-fourth', 
								'menu_class'     => 'footer-links-menu',
							) );
						?>
					</div>
				<?php endif;
    ?>
  </nav>
