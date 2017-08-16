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
<div class="eventwrapper">
<?php the_title( '<h2 class="eventdetailtitle">', '</h2>' ); ?>
<?php
$today = date("d M Y");
$expire = tribe_get_start_date( $post->ID, false, 'j M Y' ); 

$today_time = strtotime($today);
$expire_time = strtotime($expire);

if($today_time <= $expire_time) {

?>

	<div class="detail-img">
	<p class="event-day">
      <span><?php echo tribe_get_start_date( $post->ID, false, 'M' ); ?></span>
      <span><?php echo tribe_get_start_date( $post->ID, false, 'd' ); ?></span>
    </p>
		<img src=" <?php echo get_the_post_thumbnail_url(); ?>">
	</div>
	<div class="event-date-time cf">
	  
    <div class="event-time">
	
      <span class="eventtimespan"><img src="<?php echo esc_url( home_url( '/wp-content/uploads/time.png') ); ?>" class="singleeventico"><?php echo tribe_get_start_date( $post->ID, false, 'j a' ); ?> - <?php echo tribe_get_end_date( $post->ID, false, 'j a' ); ?></span>
    </div>
    <address>
	<img src="<?php echo esc_url( home_url( '/wp-content/uploads/location.png') ); ?>" class="singleeventico">
      <?php echo tribe_get_full_address ($post->ID, false); ?>
    </address>
	</div>
  <div class="single-event-content cf">
	  <div class="event-left">
	  	<?php the_content(); ?>
	  	<script type="text/javascript">
		 (function () {
            if (window.addtocalendar)if(typeof window.addtocalendar.start == "function")return;
            if (window.ifaddtocalendar == undefined) { window.ifaddtocalendar = 1;
                var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                s.type = 'text/javascript';s.charset = 'UTF-8';s.async = true;
                s.src = ('https:' == window.location.protocol ? 'https' : 'http')+'://addtocalendar.com/atc/1.5/atc.min.js';
                var h = d[g]('body')[0];h.appendChild(s); }})();
    </script>

    <!-- 3. Place event data -->
    <span class="addtocalendar atc-style-blue">
        <var class="atc_event">
            <var class="atc_date_start">2015-05-04 12:00:00</var>
            <var class="atc_date_end">2015-05-04 18:00:00</var>
            <var class="atc_timezone">Europe/London</var>
            <var class="atc_title">Star Wars Day Party</var>
            <var class="atc_description">May the force be with you</var>
            <var class="atc_location">Tatooine</var>
            <var class="atc_organizer">Luke Skywalker</var>
            <var class="atc_organizer_email">luke@starwars.com</var>
        </var>
    </span>
	  </div>
	  <div class="event-form">
     <?php echo do_shortcode('[contact-form-7 id="386" title="Event Registration"]'); ?>
	  </div>
  </div>	
  <?php } else { ?>
	<div class="detail-img">
	<p class="event-day">
      <span><?php echo tribe_get_start_date( $post->ID, false, 'M' ); ?></span>
      <span><?php echo tribe_get_start_date( $post->ID, false, 'd' ); ?></span>
    </p>
		<img src=" <?php echo get_the_post_thumbnail_url(); ?>">
	</div>
	<div class="event-date-time cf">
	  
    <div class="event-time">
	
      <span class="eventtimespan"><img src="<?php echo esc_url( home_url( '/wp-content/uploads/time.png') ); ?>" class="singleeventico"><?php echo tribe_get_start_date( $post->ID, false, 'j a' ); ?> - <?php echo tribe_get_end_date( $post->ID, false, 'j a' ); ?></span>
    </div>
    <address>
	<img src="<?php echo esc_url( home_url( '/wp-content/uploads/location.png') ); ?>" class="singleeventico">
      <?php echo tribe_get_full_address ($post->ID, false); ?>
    </address>
	</div>
  <div class="single-event-content">
	  <div class="pastevent-left">
	  	<?php the_content(); ?>
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
	  <div class="share">
       <span>Share</span>
       <?php echo do_shortcode('[addtoany]'); ?>
       </div>
  <?php	}?>
</div>	


	<?php 


	 ?>
<?php endwhile; ?>


	

