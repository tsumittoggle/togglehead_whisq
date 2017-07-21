<?php
/* Template Name:  Page*/

get_header();

//feature product section start here
?>
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
    
    <div class="foodhal-address">
			<?php get_template_part( 'template-parts/locate-us/foodhall', 'address' ); ?>
		</div>

		<div class="bigbazar-address">
			<?php get_template_part( 'template-parts/locate-us/bigbazar', 'address' ); ?>
		</div>

		<div class="hometown-address">
			<?php get_template_part( 'template-parts/locate-us/hometown', 'address' ); ?>
		</div>
<?php
get_footer();
?>