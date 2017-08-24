<?php
/*
* Template Name: Beginner Page
*/
get_header();
?>
<div class="beginner-body">
		<div class="whisqtitle">
			<h2><?php the_title(); ?></h2>
			<p class="wrapper breadcrumb-url"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Home</a> > <span><?php the_title(); ?></span></p>
		</div>
<div class="container">
		<div class="row">
			<div class="col-sm-12 col-lg-9 beginner-content">
				<div class="beginner-wrapper">
					<?php the_field('top_content'); ?>
				</div>
<!-- 				<div class="beginner-wrapper">
					<?php the_field(''); ?>
				</div> -->
			</div>
			<div class="col-sm-0 col-lg-3 fixed-before">
				<img src="<?php the_field('top_side_image'); ?>" class="img-responsive">
			</div>
			<div class="col-sm-12">
				<div><a href="<?php echo esc_url( home_url( '/the-creators-2/') ); ?>" rel="nofollow" class="feature-btn">MEET OUR TEAM</a></div>
			</div>
		</div>
	</div>
	<section class="what-we-do">
		<div class="container">
			<div class="col-sm-12">
				<?php the_field('what_title'); ?>
			</div>
		</div>
	</section>
	<div class="container begin-1">
		<div class="row">
			<div class="col-sm-push-4 col-sm-offset-1 col-sm-6">
				<img src="<?php the_field('second_image'); ?>" alt="" class="img-responsive">
				<div class="bg-patch"></div>
			</div>
			<div class="col-sm-pull-7 col-sm-4">
				<?php the_field('second_content'); ?>
			</div>
		</div>
	</div>
	<div class="container begin-2">
		<div class="row">
			<div class="col-sm-6 col-lg-4 left">
			<img src="<?php the_field('third_image'); ?>" alt="" class="img-responsive">
				<?php the_field('third_content'); ?>
			</div>
			<div class="col-sm-6 col-lg-4 right">
				<img src="<?php the_field('fourth_image'); ?>" alt="" class="img-responsive">
				<div class="bg-patch-grey">
					<?php the_field('fourth_content'); ?>
				</div>
			</div>
			<div class="col-sm-12 begining-last">
				<div class="para"><?php the_field('bottom_content'); ?>
				</div>
				<div class="text-center"><a rel="nofollow" href="<?php echo esc_url( home_url( '/product-shop/' ) ); ?>" class="feature-btn">BUY OUR PRODUCTS</a></div>
			</div>
		</div>
	</div>
	</div>
<?php get_footer(); ?>