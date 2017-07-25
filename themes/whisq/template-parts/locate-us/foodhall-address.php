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
<!--<h2>foodhall</h2>-->
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
							'category_name' => 'foodhall', 
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
					  <div class="cityphone">
						+91 9768208409
						</div>
						<div class="citymap">
						Google Map
						</div>
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
	    