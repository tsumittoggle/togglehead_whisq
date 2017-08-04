<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version  4.3
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<?php while ( have_posts() ) :  the_post(); ?>
<div class="wapper">
<?php
$today = date("d M Y");
$expire = tribe_get_start_date( $post->ID, false, 'j M Y' ); 

$today_time = strtotime($today);
$expire_time = strtotime($expire);
echo $today_time;
echo ' and ';
echo $expire_time;

if($today_time <= $expire_time) {

?>

	<div class="detail-img">
		<img src=" <?php echo get_the_post_thumbnail_url(); ?>">
	</div>
	<div class="event-date-time">
	  <div class="event-day">
      <span><?php echo tribe_get_start_date( $post->ID, false, 'M' ); ?></span>
      <span><?php echo tribe_get_start_date( $post->ID, false, 'Y' ); ?></span>
    </div>
    <div class="event-time">
      <span><?php echo tribe_get_start_date( $post->ID, false, 'j a' ); ?></span>
      <span><?php echo tribe_get_end_date( $post->ID, false, 'j a' ); ?></span>
    </div>
    <address>
      <?php echo tribe_get_full_address ($post->ID, false); ?>
    </address>
	</div>
  <div class="single-event-content">
	  <div class="event-left">
	  	<?php the_title( '<h2>', '</h2>' ); ?>
	  	<?php the_content(); ?>
	  	<a href="<?php the_permalink(); ?>" class="btn">add to calendar</a>
	  </div>
	  <div class="event-form">
     <?php echo do_shortcode('[contact-form-7 id="386" title="Event Registration"]'); ?>
	  </div>
  </div>	
  <?php } else { ?>
	<div class="detail-img">
		<img src=" <?php echo get_the_post_thumbnail_url(); ?>">
	</div>
	<div class="event-date-time">
	  <div class="event-day">
      <span><?php echo tribe_get_start_date( $post->ID, false, 'M' ); ?></span>
      <span><?php echo tribe_get_start_date( $post->ID, false, 'Y' ); ?></span>
    </div>
    <div class="event-time">
      <span><?php echo tribe_get_start_date( $post->ID, false, 'j a' ); ?></span>
      <span><?php echo tribe_get_end_date( $post->ID, false, 'j a' ); ?></span>
    </div>
    <address>
      <?php echo tribe_get_full_address ($post->ID, false); ?>
    </address>
	</div>
  <div class="single-event-content">
	  <div class="event-left">
	  	<?php the_title( '<h2>', '</h2>' ); ?>
	  	<?php the_content(); ?>
	  	<a href="<?php the_permalink(); ?>" class="btn">add to calendar</a>
	  </div>
	  <div class="event-form">
	  <?php
			$images = get_field('image_gallery');

			if( $images ): ?>
			    <ul>
			        <?php foreach( $images as $image ): ?>
			            <li>
			                <a href="<?php echo $image['url']; ?>">
			                     <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
			                </a>
			                <p><?php echo $image['caption']; ?></p>
			            </li>
			        <?php endforeach; ?>
			    </ul>
			<?php endif; ?>
	  </div>
  <?php	}?>
</div>	


	<?php 


	 ?>
<?php endwhile; ?>


	

