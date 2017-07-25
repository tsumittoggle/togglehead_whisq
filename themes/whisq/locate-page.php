<?php
/* Template Name:  Loacte Page*/

get_header();

//feature product section start here
?>
			<div class="page-content">
				<?php the_content(); ?>
			</div>
   		<div class="locate-list" id="all">
        <div class="lcate-store-img">
          All
        </div>
			</div>
			<?php
			$store = array( 'post_type' => 'store', 'posts_per_page' => 3, 'order' => 'ASC' );
			$store_list = new WP_Query( $store );
			while ( $store_list->have_posts() ) : $store_list->the_post();
			?>
				<div class="locate-list" id="<?php the_title(); ?>">
            <div class="lcate-store-img">
          	  <?php the_post_thumbnail(); ?>
            </div>
				</div>
			<?php
			endwhile;
			wp_reset_query(); 
			?>

		  <?php
    	global $wpdb;
			$tags = get_terms('post_tag');
			?>
			  <div class="select-section">
			  <form action="#" name="cityselect" class="cityform" method="post">
    	    <select name="select-city" id="cities" class="cities" >
    	        <option name"city" value="city">State</option>
    	    		<option name"city" value="city">all</option>
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
		<div class="all">
		<?php	
			foreach ($tags as $tag){
				?> 
				  <?php
						$store = array( 
							'post_type' => 'address', 
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
		</div>
    <div class="FoodHall-address addwrap">
			<?php get_template_part( 'template-parts/locate-us/foodhall', 'address' ); ?>
		</div>

		<div class="Bigbazar-address addwrap">
			<?php get_template_part( 'template-parts/locate-us/bigbazar', 'address' ); ?>
		</div>

		<div class="Hometown-address addwrap">
			<?php get_template_part( 'template-parts/locate-us/hometown', 'address' ); ?>
		</div>
		<div class="or">or</div>
		<div class="button-link">
			<a href="#" title="buy our products online">buy our product online</a>
		</div>

<?php
get_footer();
?>