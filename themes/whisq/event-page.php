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
<div class="upcoming">
<h3>Upcoming events</h3>
<?php
		global $post;
$get_posts = tribe_get_events(array('posts_per_page'=>2, 'eventDisplay'=>'upcoming') );
foreach($get_posts as $post) { setup_postdata($post);
        ?>
        
    <?php if ( has_post_thumbnail() ) { ?>
    
      <div class="thumbList">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('thumbnail', array('class' => 'scale-with-grid attachment-thumbnail')); ?></a>
        <h6 class="event-day">
          <span><?php echo tribe_get_start_date( $post->ID, false, 'M' ); ?></span>
      	  <span><?php echo tribe_get_start_date( $post->ID, false, 'Y' ); ?></span>
        </h6>
      </div>
      <div class="content-event">
      	<h3><?php the_title(); ?></h3>
      	<div class="event-time">
      	  <span><?php echo tribe_get_start_date( $post->ID, false, 'j a' ); ?></span>
      	  <span><?php echo tribe_get_end_date( $post->ID, false, 'j a' ); ?></span>
      	</div>
      	<address>
       		<?php echo tribe_get_full_address ($post->ID, false); ?>
       </address>
       <div class="buttons">
         <a href="<?php the_permalink(); ?>" class="btn">know more</a>
         <a href="<?php the_permalink(); ?>" class="btn">add to calendar</a>
       </div>
       <div class="share">
       <span>Share</span>
       <?php echo do_shortcode('[addtoany]'); ?>
       </div>
      </div>
    <?php } } //endforeach 
     ?>
    <?php wp_reset_query(); 
    ?>
</div>

<div class="past">
<h3>past events</h3>
<?php
global $post;
$get_posts = tribe_get_events(array('posts_per_page'=>3, 'eventDisplay'=>'past') );
foreach($get_posts as $post) { setup_postdata($post);
        ?>        
    <?php if ( has_post_thumbnail() ) { ?>
    
      <div class="thumbList">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('thumbnail', array('class' => 'scale-with-grid attachment-thumbnail')); ?></a>
      </div>
      <h6 class="event-day">
      	<span><?php echo tribe_get_start_date( $post->ID, false, 'M' ); ?></span>
      	<span><?php echo tribe_get_start_date( $post->ID, false, 'Y' ); ?></span>
      </h6>
      <div class="event-excerpt">
        <?php the_title(); ?>  
        <?php the_excerpt(); ?>
      </div>
      <address>
       	<?php echo tribe_get_full_address ($post->ID, false); ?>
       </address>    
    <?php }
} //endforeach 
  ?>
    <?php wp_reset_query(); 
    ?>
</div>
<?php		
get_footer();
?>