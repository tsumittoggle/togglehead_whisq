<?php
/* Template Name:  Faq Page*/

get_header();

?>	
		<div class="whisqtitle">
			<h2><?php the_title(); ?></h2>
			<p class="wrapper breadcrumb-url"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Home</a> > <span><?php the_title(); ?></span></p>
		</div>
<div class="faq-cont">
<div class="container">
	<div class="row">
		<div class="col-md-12 main">
<?php
$taxonomy = 'faq_categories';
$terms = get_terms($taxonomy); // Get all terms of a taxonomy
 $num = 0;
?>
      <?php foreach ( $terms as $term ) { 
          $faq_cat = $term->name;
      	?>
      	<div class="section-faq">
        <h3><?php echo $faq_cat; ?></h3>
          <?php
          $count = 0;
          $num = $num + 1;
		$recipe = array( 'post_type' => 'faq', 'posts_per_page' => 10,'faq_categories' => $faq_cat);
		$recipe_list = new WP_Query( $recipe );
		while ( $recipe_list->have_posts() ) : $recipe_list->the_post();
		?>
			<div class="qa-body <?php if($num == 1 && $count == 0) {echo "active";} ?>">
				<div class="question">
				  <?php $count = $count + 1; ?>
					<span><?php echo $count; ?></span>
					<p><?php echo the_title(); ?></p>
				</div>
				<div class="answer">
				<?php echo the_content(); ?>
				</div>	  	
			 </div>
   <?php
		endwhile;
		wp_reset_query(); 
  ?>
</div>
      <?php } ?>
</div>
</div>
</div>
<div class="bg-grey-faq"></div>
</div>
<?php
get_footer();
?>