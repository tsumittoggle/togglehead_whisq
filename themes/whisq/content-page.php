<?php 
/*
* Template Name: Content Template
*/
get_header();
?>
<div class="whisqtitle">
    <h2><?php the_title(); ?></h2>
    <p class="wrapper breadcrumb-url"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Home</a> > <span><?php the_title(); ?></span></p>
</div>
<?php
	wp_reset_query(); 
 ?>
<div class="container">
	<div class="wrap-content">
    	<?php echo the_content(); ?>
    </div>
</div>
<?php
get_footer();
?>

