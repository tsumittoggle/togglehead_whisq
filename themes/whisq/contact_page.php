<?php 
/*
* Template Name: Contact Page
*/
get_header();
 ?>
<div class="container contact-page">
	<div class="col-md-6 left">
	   				<?php if(get_field('content') ) : ?>
       	           <?php the_field('content'); ?>
                <?php endif; ?>
	</div>
	<div class="col-md-6 right">
       <?php if(get_field('form_code') ) : ?>
       	 <?php the_field('form_code'); ?>
       <?php endif; ?>
	</div>
</div>

<section class="below-section">
	<div class="container">
	<div class="col-md-6">
		<div class="wrapper">
			<div class="img-part">
				<img src="http://via.placeholder.com/30x30">
			</div>
			<div class="para-part">
				<?php if(get_field('email') ) : ?>
       	           <?php the_field('email'); ?>
                <?php endif; ?>
			</div>
		</div>
		<div class="wrapper">
			<div class="img-part">
				<img src="http://via.placeholder.com/30x30">
			</div>
			<div class="para-part">
		       <?php if(get_field('address') ) : ?>
		       	 <?php the_field('address'); ?>
		       <?php endif; ?>
			</div>
		</div>
	</div>		
	</div>
</section>
<?php
get_footer();
?>