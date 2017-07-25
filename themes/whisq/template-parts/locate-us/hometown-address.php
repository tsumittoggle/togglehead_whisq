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
<!--<h2>hometown</h2>-->
      <?php
    	global $wpdb;
			$tags = get_terms('post_tag');
			?> 
				<?php
				  $selected_val = 'city';
				  if(isset($_POST['select-city'])){
						$selected_val = $_POST['select-city'];  
						echo "You have selected city:" .$selected_val;  
				  }
				?>

      <?php	
			foreach ($tags as $tag){
				?> 
				  <?php
						$store = array( 
							'post_type' => 'address',
							'category_name' => 'hometown', 
							'posts_per_page' => -1,
							'tag' => $tag->name
							);
						$store_list = new WP_Query( $store );
						if ( $store_list->have_posts() ) {?>
						<div class="wrapper citywrap <?php echo $tag->name; ?>">
						<div class="city-name"><?php echo $tag->name; ?></div>
				 
				 <?php
						while ( $store_list->have_posts() ) : $store_list->the_post();
						?><div class="cities-wrapper">
						
							<div class="city-address">
			          <h4 class="store-title"><?php the_title(); ?></h4>
			          <?php the_content(); ?>
					  <div class="cityhoverwrap">
					  <?php if(get_field('contact_number')): ?>
					  <div class="cityphone">
						<a href="tel:<?php the_field('contact_number'); ?>"><i class="fa fa-phone phoneico" aria-hidden="true"></i> <?php the_field('contact_number'); ?></a>
						</div>
						<?php endif; ?>
						<?php if(get_field('city_map')): ?>
						<div class="citymap">
						<a href="<?php the_field('city_map_url'); ?>" title="<?php the_field('city_map'); ?>" target="_blank"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php the_field('city_map'); ?></a>
						</div>
						<?php endif; ?>
					</div>
			         </div>
					 </div>
						<?php
						endwhile; 
						?>
						</div>
						<?php 
					}
						wp_reset_query(); 
					
				}
	 ?> 