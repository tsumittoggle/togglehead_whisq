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

		<div class="products-page">
			<?php get_template_part( 'template-parts/products/product', 'items' ); ?>

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