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

<div class="container-home">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner owl-carousel owl-theme" id="carousel02">
  <?php
		$banner = array( 'post_type' => 'slider', 'posts_per_page' => 3 );
		$banner_list = new WP_Query( $banner );
		while ( $banner_list->have_posts() ) : $banner_list->the_post();
		?>
		<div class="item">
      <div class="desktop-banner">
			  <?php the_post_thumbnail(); ?>
      </div>
      <?php if( get_field('mobile-banner-image') ): ?>
        <div class="banner-mobile">
          <img src="<?php the_field('mobile-banner-image'); ?>" alt="<?php the_field('mobile-banner-name'); ?>">
        </div>
      <?php endif; ?>
    <div class="slider-content">
      <?php if( get_field('title') ): ?>
        <h4 class="heading"><?php the_field('title'); ?></h4>
      <?php endif; ?>
      <?php if( get_field('content') ): ?>
        <?php the_field('content'); ?>
      <?php endif; ?>
      <?php if( get_field('button_text') && get_field('button_url') ): ?>
        <a class="btn bannerbtn" href="<?php the_field('button_url'); ?>" title="<?php the_field('button_text'); ?>"><?php the_field('button_text'); ?></a>
      <?php endif; ?>
    </div>
    </div>
		<?php
		endwhile;
		wp_reset_query(); 
  ?>
  </div>
  </div>
  </div>