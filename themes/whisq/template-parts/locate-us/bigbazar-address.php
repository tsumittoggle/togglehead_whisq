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
  global $wpdb;

$tags = get_terms('post_tag');
echo '<ul>';
foreach ($tags as $tag){
	  echo $tag->name;
			$store = array( 
				'post_type' => 'address',
				'category_name' => 'bigbazar', 
				'posts_per_page' => -1,
				'tag' => $tag->name
				);
			$store_list = new WP_Query( $store );
			while ( $store_list->have_posts() ) : $store_list->the_post();
			?>
          <h4 class="store-title"><?php the_title(); ?></h4>
          <?php the_content(); ?>
			<?php
			endwhile;
			wp_reset_query(); 
		}
	 ?>