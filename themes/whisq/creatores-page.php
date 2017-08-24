<?php
/*
* Template Name: Creatore Page
*/
get_header();
?>

		<div class="whisqtitle">
			<h2><?php the_title(); ?></h2>
			<p class="wrapper breadcrumb-url"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Home</a> > <span><?php the_title(); ?></span></p>
		</div>
<div class="container creator-container">
		<div class="creator-para">
			<?php the_field('creator_top_content'); ?>
		</div>
		<div class="row">
			<div class="col-sm-5 creator-img-block">
				<img src="<?php the_field('first_creator_image'); ?>" alt="" class="img-responsive">
				<div class="bg-image-left"></div>
			</div>
			<div class="col-sm-offset-1 col-sm-6 creator-content-block">
				<?php the_field('first_creator_text'); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-push-6 col-sm-offset-1 col-sm-5 creator-img-block">
				<img src="<?php the_field('second_creator_image'); ?>" alt="" class="img-responsive">
				<div class="bg-image-right"></div>
			</div>
			<div class="col-sm-pull-6 col-sm-6 creator-content-block">
				<?php the_field('second_creator_text'); ?>
			</div>
		</div>
		<div class="creator-para"><?php the_field('bottom_content'); ?>
		</div>
		<div class="text-center"><a href="<?php echo esc_url( home_url( '/product-shop/' ) ); ?>" rel="nofollow" class="feature-btn">BUY OUR PRODUCTS</a></div>
	</div>

<?php get_footer(); ?>