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
<div class="whisqtitle">
			<h2>Events</h2>
			<p class="wrapper breadcrumb-url"><a class="backlink" href="<?php echo esc_url( home_url( '/events/' ) ); ?>">Back</a><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Home</a> > <a href="<?php echo esc_url( home_url( '/events/' ) ); ?>" rel="home">Events</a> > <span><?php the_title(); ?></span></p>
		</div>
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
	
      <span class="eventtimespan"><img src="<?php echo esc_url( home_url( '/wp-content/uploads/time.png') ); ?>" class="singleeventico"><?php echo tribe_get_start_date( $post->ID, false, 'g a' ); ?> - <?php echo tribe_get_end_date( $post->ID, false, 'g a' ); ?></span>
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
            <var class="atc_date_start"><?php echo tribe_get_start_date( $post->ID, false, 'Y-m-j g:i' ); ?></var>
            <var class="atc_date_end"><?php echo tribe_get_start_date( $post->ID, false, 'Y-m-j g:i' ); ?></var>
            <var class="atc_timezone">Europe/London</var>
            <var class="atc_title"><?php echo the_title(); ?></var>
            <var class="atc_description"><?php echo the_excerpt(); ?></var>
            <var class="atc_location"><?php echo tribe_get_venue($post->ID, false); ?></var>
            <var class="atc_organizer"><?php echo tribe_get_organizer($post->ID, false); ?></var>
            <var class="atc_organizer_email"><?php echo tribe_get_organizer_email($post->ID, false); ?></var>
        </var>
    </span>
	  </div>
	  <div class="event-form">
     <?php echo do_shortcode('[contact-form-7 id="386" title="Event Registration" html_class="contact-form"]'); ?>
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
	  <div class="pastevent-form cf">
	  <?php
			$images = get_field('image_gallery');

			if( $images ): ?>
			    <ul>
			        <?php foreach( $images as $image ): ?>
			            <li>
			                <a href="<?php echo $image['url']; ?>">
			                     <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive"/>
			                </a>
			                <p><?php echo $image['caption']; ?></p>
			            </li>
			        <?php endforeach; ?>
			    </ul>
			<?php endif; ?>
	  </div>
	  <div class="event-video cf">
	    <iframe src="https://www.youtube.com/embed/-HGd1KRbc34" frameborder="0" allowfullscreen></iframe>
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


	

