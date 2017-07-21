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
    	global $wpdb;
			$tags = get_terms('post_tag');
			?>
			  <div class="select-section">
			  <form action="#" name="cityselect" method="post">
    	    <select name="select-city" id="cities" class="cities" onchange="this.form.submit()">
    	    		<option name"city" value="city">city</option>
							<?php
							foreach ($tags as $tag){
							?>
								<option name="<?php echo $tag->name; ?>" value="<?php echo $tag->name; ?>"><?php echo $tag->name; ?></option>
							<?php
							}
              ?>
          </select>
          </form>
        </div>     
				<?php
				  $selected_val = 'city';
				  if(isset($_POST['select-city'])){
						$selected_val = $_POST['select-city'];  
						echo "You have selected city:" .$selected_val;  
				  }
				?>
    <?php
      if($selected_val == "city" || $selected_val == " ") { ?>
      	<div class="cities-wrapper">
      <?php	
			foreach ($tags as $tag){
				?>
				 <div class="city-name"><?php echo $tag->name; ?></div> 
				  <?php
						$store = array( 
							'post_type' => 'address',
							'category_name' => 'hometown', 
							'posts_per_page' => -1,
							'tag' => $tag->name
							);
						$store_list = new WP_Query( $store );
						while ( $store_list->have_posts() ) : $store_list->the_post();
						?>
							<div class="city-address">
			          <h4 class="store-title"><?php the_title(); ?></h4>
			          <?php the_content(); ?>
			         </div>
						<?php
						endwhile;
						wp_reset_query(); 
					}
					?></div>
					<?php
				}
				else {
				?>
				<div class="cities-wrapper">
				 <div class="city-name"><?php echo $selected_val; ?></div> 
				  <?php
						$store = array( 
							'post_type' => 'address',
							'category_name' => 'foodhall', 
							'posts_per_page' => -1,
							'tag' => $selected_val
							);
						$store_list = new WP_Query( $store );
						while ( $store_list->have_posts() ) : $store_list->the_post();
						?><div class="city-address">
			          <h4 class="store-title"><?php the_title(); ?></h4>
			          <?php the_content(); ?>
			          </div>
						<?php
						endwhile;
						wp_reset_query(); 					
				}
	 ?>    
	    </div>