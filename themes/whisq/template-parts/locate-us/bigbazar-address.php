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
  <h2>Bigbazar</h2>
   <?php
			$store = array( 
				'post_type' => 'address',
				'category_name' => 'bigbazar', 
				'posts_per_page' => -1,
				'tag' => 'mumbai, delhi' 
				);
			$store_list = new WP_Query( $store );
			while ( $store_list->have_posts() ) : $store_list->the_post();
			?>
          <h4 class="store-title"><?php the_title(); ?></h4>
          <?php the_content(); ?>
			<?php
			endwhile;
			wp_reset_query(); 
	 ?>

<?php

// $the_query = new WP_Query( 'tag='.$post_tag );

// if ( $the_query->have_posts() ) {
//     echo '<ul>';
//     while ( $the_query->have_posts() ) {
//         $the_query->the_post();
//         echo '<li>' . get_the_title() . '</li>';
//     }
//     echo '</ul>';
// } else {
//     // no posts found
// }
// /* Restore original Post Data */
// wp_reset_postdata();
// ?>