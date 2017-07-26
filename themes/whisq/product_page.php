<?php
/* Template Name:  Product Page*/

get_header();

?>	
		<div class="whisqtitle">
			<h2><?php the_title(); ?></h2>
			<p class="wrapper breadcrumb-url"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Home</a> > <span><?php the_title(); ?></span></p>
		</div>
      <?php
		  $store_list = new WP_Query( $store );
		  wp_reset_query(); 
	    ?>
		<div class="wrapper locatecontent page-content" style="background-image: url(<?php the_field('product_banner'); ?>);">
			<?php the_content(); ?>
		</div>
		<div class="filter short-by">
		<form action="#" method="post" name="form">
	<select name="orderby" class="orderby" onchange="this.form.submit()">
					<option value="menu_order">Default sorting</option>
					<option value="popularity">Sort by popularity</option>
					<option value="title" selected="selected">Sort by title</option>
					<option value="rating">Sort by average rating</option>
					<option value="date">Sort by newness</option>
					<option value="price">Sort by price: low to high</option>
					<option value="price-desc">Sort by price: high to low</option>
			</select>
			</form>
		<?php
 				  if(isset($_POST['orderby'])){
 						$selected_val = $_POST['orderby'];  
 						echo "You have selected city:" .$selected_val;  
 				  }
 				?>
	</div>
        <div class="left-side-bar">
		<?php
			$args = array(
			    'number'     => $number,
			    'orderby'    => $orderby,
			    'order'      => $order,
			    'hide_empty' => $hide_empty,
			    'include'    => $ids
			);
			$product_categories = get_terms( 'product_cat', $args );
			?>
			<h4>category</h4>
			<ul id="product_cats">
			<li>all</li>
			<?php
			$count = count($product_categories);
			if ( $count > 0 ){
			    foreach ( $product_categories as $product_category ) {
			        echo '<li>' . $product_category->name . '</li>';
			    }
			}
			?> 
			</ul>
			</div>
			<div class="main-content">
			<?php
		    $category = $_COOKIE['cat_name'];
		    if($category == 'all') {
		    	$category = str_replace($category ,'','');
		    	echo $category;
		    }
		  
			$bandproduct_args = array(
				'post_type'           => 'product',
				'product_cat'         =>  $category,
				'post_status'         => 'publish',
				'posts_per_page'      => '10',
				'orderby'             =>  $selected_val,
				'order'               => 'ASC',
			);
			$loop = new WP_Query( $bandproduct_args );
			    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
			    
			       <div class="product-list">  
			          <div class="img-box">  
			            <?php 
			                if ( has_post_thumbnail( $loop->post->ID ) )
			                    echo get_the_post_thumbnail( $loop->post->ID, 'shop_catalog' ); 
			                else 
			                    echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" />'; 
			            ?>
			            </div>
			            <h3 class="product-title"><?php the_title(); ?></h3>

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

			<div class="bottom-wrapper" style="background: url(<?php the_field('bottom_banner'); ?>)">
			 <div class="bottom-content">
					<?php if(get_field('bottom_text')): ?>
						<?php the_field('bottom_text'); ?>
					<?php endif; ?>
			 </div>
			</div>
<?php
get_footer();
?>