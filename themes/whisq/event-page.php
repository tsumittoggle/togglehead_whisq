<?php
/* Template Name:  Event Page*/

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
		<div class="wrapper locatecontent page-content">
			<?php the_content(); ?>
		</div>
		

<?php
get_footer();
?>