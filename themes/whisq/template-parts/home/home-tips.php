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

<h4>genius tips</h4>
<div class="container tip-content">
  <div id="myCarousel1" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner owl-carousel owl-theme" id="carousel03">
  <?php
		$recipe = array( 'post_type' => 'tips', 'posts_per_page' => 3 );
		$recipe_list = new WP_Query( $recipe );
		while ( $recipe_list->have_posts() ) : $recipe_list->the_post();
		?>
		<div class="item">
      <div class="tip">
			<?php the_content(); ?>
      </div>
    </div>
		<?php
		endwhile;
		wp_reset_query(); 
  ?>
  </div>
  </div>
  </div>


