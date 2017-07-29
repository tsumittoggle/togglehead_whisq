<?php
/* Template Name:  Recipes Page*/

get_header();

?>	
		<div class="whisqtitle">
			<h2><?php the_title(); ?></h2>
			<p class="wrapper breadcrumb-url"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Home</a> > <span><?php the_title(); ?></span></p>
		</div>

		<div class="recipes-page">
			<div class="recipes-content">
	<div class="recipe cf">
  <?php
		$recipe = array( 'post_type' => 'recipes', 'posts_per_page' => 9 );
		$recipe_list = new WP_Query( $recipe );
		while ( $recipe_list->have_posts() ) : $recipe_list->the_post();
		$count;
		$count++;
		?>
			<div class="recipes-page-list">
			  <div class="recipe-page-img">
			  	<?php the_post_thumbnail(); ?>
			  </div>
			  <div class="recipe-page-content">
				  <h3><?php the_title(); ?></h3>
				  <p><?php the_excerpt(); ?></p>
				  <a class="recipe-more" href="<?php get_post_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
			  </div>
			</div>
		<?php
		if($count == 3) {
			?>
   <div class="recipe-tip">
     <?php
		$tips = array( 'post_type' => 'tips', 'posts_per_page' => 1 );
		$tips_list = new WP_Query( $tips );
		while ( $tips_list->have_posts() ) : $tips_list->the_post();
		?>
		<div class="tip item">
			<?php the_content(); ?>
			<?php the_title(); ?>
    </div>
		<?php
		endwhile;
		wp_reset_query(); 
  ?>
   </div>
   <?php
		}
		endwhile;
		wp_reset_query(); 
  ?>
	</div>	
	</div>
<div class="recipe-sidebar">
<div class="category">
<?php
$taxonomy = 'recipes_categories';
$terms = get_terms($taxonomy); // Get all terms of a taxonomy
?>
   <h3>category</h3>
   <ul>
      <li class="all">All</li>
      <?php foreach ( $terms as $term ) { ?>
        <li class="<?php echo $term->name; ?>"><?php echo $term->name; ?></li>
      <?php } ?>
    </ul>
<?php ?>
</div>
<div class="feature-recipes">
<h3>featured recipes</h3>
<?php
		$recipe = array( 'post_type' => 'recipes', 'posts_per_page' => 2, 'orderby' => 'rand' );
		$recipe_list = new WP_Query( $recipe );
		while ( $recipe_list->have_posts() ) : $recipe_list->the_post();
		?>
			<div class="recipes-page-list">
			  <div class="recipe-page-img">
			  	<?php the_post_thumbnail(); ?>
			  </div>
			  <div class="recipe-page-content">
				  <h3><?php the_title(); ?></h3>

			  </div>
			</div>
		<?php
		endwhile;
		wp_reset_query(); 
  ?>
</div>
</div>
</div>
<?php
get_footer();
?>