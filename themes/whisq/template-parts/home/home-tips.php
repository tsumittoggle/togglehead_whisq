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
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel1" data-slide-to="1"></li>
      <li data-target="#myCarousel1" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->

    <div class="carousel-inner">
  <?php
		$recipe = array( 'post_type' => 'tips', 'posts_per_page' => 3 );
		$recipe_list = new WP_Query( $recipe );
		while ( $recipe_list->have_posts() ) : $recipe_list->the_post();
		?>
		<div class="tip item">
			<?php the_content(); ?>
    </div>
		<?php
		endwhile;
		wp_reset_query(); 
  ?>
  </div>
  </div>
  </div>


