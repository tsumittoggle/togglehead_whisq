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
	<div class="whisqtitle">
		<h2>recipes</h2>
		<p class="wrapper breadcrumb-url"><a class="backlink" onclick="history.go(-1);">Back</a><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Home</a> > <a href="<?php echo esc_url( home_url( '/recipes/' ) ); ?>" rel="home">Recipes</a> > <span><?php the_title(); ?></span></p>
	</div>
<div class="header-post">
<?php the_post_thumbnail(); ?>
</div>	
<div class="wrapper">
	<h2 class="post-title"><?php the_title(); ?></h2>
	<div class="list">
		<?php if(get_field('servings')) : ?>
		<span><img src="<?php echo esc_url( home_url( '/wp-content/uploads/restaurant.png') ); ?>" class="fa ffa-shopping-cart">
			Servings - <?php the_field('servings'); ?></span>
		<?php endif; ?>
		<?php if(get_field('preparation')) : ?>
		<span><img src="<?php echo esc_url( home_url( '/wp-content/uploads/clock.png') ); ?>" class="fa ffa-shopping-cart">
			Preparation - <?php the_field('preparation'); ?></span>
		<?php endif; ?>
		<?php if(get_field('baking')) : ?>
		<span><img src="<?php echo esc_url( home_url( '/wp-content/uploads/baking.png') ); ?>" class="fa ffa-shopping-cart">
			Baking - <?php the_field('baking'); ?></span>
		<?php endif; ?>
		<?php if(get_field('email_recipes')) : ?>
		<span><img src="<?php echo esc_url( home_url( '/wp-content/uploads/email.png') ); ?>" class="fa ffa-shopping-cart">
			 <a target='_blank' href="http://www.addtoany.com/add_to/google_gmail?linkurl=http%3A%2F%2Fwww.togglehead.net%2Fwhisq%2Frecipes%2Fdemo%2F&linkname=Baked%20Cheesecake&linknote="><?php the_field('email_recipes'); ?></span></a>
		<?php endif; ?>
	</div>
	<div class="recipepara">
	<p><?php the_excerpt(); ?></p>
	</div>
	<div class="recipe-detail cf">
	  <?php if(get_field('integedien')) : ?>	  
		<div class="ingrediean">
			<img src="<?php echo esc_url( home_url( '/wp-content/uploads/bowl.png') ); ?>" class="rcimg"><h4>Ingredients</h4>
			<div class="ingrediean-content">
				<?php the_field('integedien'); ?>
			</div>
		</div>
	<?php endif; ?>
	<?php if(get_field('method')) : ?>
		<div class="method">
			<img src="<?php echo esc_url( home_url( '/wp-content/uploads/cook.png') ); ?>" class="rcimg"><h4>method</h4>
			<div class="method-content">
			  <?php the_field('method'); ?>
			</div>
		</div>
	<?php endif; ?>
	</div>
  <div class="share-rec">
				  <span><i class="fa fa-share-alt-square" aria-hidden="true"></i><i>share</i></span>
				   <div class="share-icon"><?php echo do_shortcode('[addtoany]'); ?><a href="#" target="_blank"><img src="" alt="insta"></a></div>
				  </div>
  <div class="tag">
  	<?php if(get_field('tags')) : ?>
			<p><img src="<?php echo esc_url( home_url( '/wp-content/uploads/price-tag.png') ); ?>" class="rcimg">tags</p><?php the_field('tags'); ?>
		<?php endif; ?>
  </div>
  <div class="post-change">
	  <span><?php previous_post_link('%link','<span class="prev">Previous</span>'); ?></span>
	  <span><?php next_post_link('%link','<span class="next">Next</span>'); ?></span>     
  </div>
</div>
<div class="extra-wrapper">
  <ul class="select-extra cf">
  	<li class="youmaylike active"><p>Similar Recipes</p></li>
  	<li class="accessoriesused"><p>Products in use</p></li>
  </ul>
	<div class="recipe cf">
  <?php
		$recipe = array( 'post_type' => 'recipes', 'posts_per_page' => 3, 'orderby' => 'rand' );
		$recipe_list = new WP_Query( $recipe );
		while ( $recipe_list->have_posts() ) : $recipe_list->the_post();
		?>
			<div class="recipes-page-list">
			  <div class="recipe-page-img">
			  	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			  		<?php the_post_thumbnail(); ?>
			  	</a>
			  </div>
			  <div class="recipes-page-content">
			  <h3>
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				    <?php the_title(); ?>
				  </a>
				</h3>
				<p><?php the_excerpt(); ?></p>
				<a class="recipe-more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
			  <div class="share-rec">
				  <span class="shareact"><img src="http://www.togglehead.net/whisq/wp-content/uploads/allshare.png"><i class="sharehide">share</i></span>
				   <div class="share-icon"><?php echo do_shortcode('[addtoany]'); ?></div>
				  </div>
       </div>
	   </div>
			
		<?php
		endwhile;
		wp_reset_query(); 
  ?>
  </div>
  </div>
  <div class="related-accesories cf recipelisthide">
  			<?php
		  
			$bandproduct_args = array(
				'post_type'           => 'product',
				'product_cat'         =>  '',
				'post_status'         => 'publish',
				'posts_per_page'      => '3',
				'orderby'             =>  'rand',
				'order'               => 'ASC',
			);
			$loop = new WP_Query( $bandproduct_args );
			    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
			    
			       <div class="product-list">  
			          <div class="img-box">  
			          	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			            <?php 
			                if ( has_post_thumbnail( $loop->post->ID ) )
			                    echo get_the_post_thumbnail( $loop->post->ID, 'shop_catalog' ); 
			                else 
			                    echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" />'; 
			            ?>
			            </a>
			            </div>
			            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			            	<h3 class="product-title"><?php the_title(); ?></h3>
			            </a>

			            <?php 
			                echo $product->get_price_html(); 
			                woocommerce_template_loop_add_to_cart( $loop->post, $product );
			            ?>    
			        </div>

			<?php 
			    endwhile;
			    wp_reset_query(); 
			?>
  </div>
</div>
	    