<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Whisq
 * @since 1.0
 * @version 1.0
 */

?>
	<h2>Foodhall</h2>
   <?php
			$store = array( 
				'post_type' => 'address',
				'category_name' => 'foodhall', 
				'posts_per_page' => -1 );
			$store_list = new WP_Query( $store );
			while ( $store_list->have_posts() ) : $store_list->the_post();
			?>
          <h4 class="store-title"><?php the_title(); ?></h4>
          <?php the_content(); ?>
			<?php
			endwhile;
			wp_reset_query(); 
	 ?>