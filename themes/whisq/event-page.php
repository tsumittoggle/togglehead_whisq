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
<div class="upcoming cf">
<div class="cf"><img src="<?php echo esc_url( home_url( '/wp-content/uploads/events.png') ); ?>" class="eventheadico"><h3 class="eventheading">Upcoming events</h3></div>
<?php
		global $post;
$get_posts = tribe_get_events(array('posts_per_page'=>2, 'eventDisplay'=>'upcoming') );
foreach($get_posts as $post) { setup_postdata($post);
        ?>
		<div class="eventrow cf">
<div class="events">
<p class="event-date2">
          <span><?php echo tribe_get_start_date( $post->ID, false, 'M' ); ?></span>
      	  <span><?php echo tribe_get_start_date( $post->ID, false, 'd' ); ?></span>
        </p>

        
    <?php if ( has_post_thumbnail() ) { ?>
    
      <div class="thumbList">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>        
      </div>
      
</div>
<div class="content-event">
      	 <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h3 class="eventcontenttitle"><?php the_title(); ?></h3></a>
      	<div class="event-time">
		  <img src="<?php echo esc_url( home_url( '/wp-content/uploads/time.png') ); ?>" class="eventtimeico">
      	  <span><?php echo tribe_get_start_date( $post->ID, false, 'g a' ); ?> - <?php echo tribe_get_end_date( $post->ID, false, 'g a' ); ?></span>
      	</div>
      	<address>
		<img src="<?php echo esc_url( home_url( '/wp-content/uploads/location.png') ); ?>" class="eventlocico">
       		<?php echo tribe_get_full_address ($post->ID, false); ?>
       </address>
       <div class="buttons">
         <a href="<?php the_permalink(); ?>" class="know-btn">know more</a>
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
       </div>
       <div class="share">
       <span>Share</span>
       <?php echo do_shortcode('[addtoany]'); ?>
       </div>
      </div>
	  </div>
    <?php } } //endforeach 
     ?>
    <?php wp_reset_query(); 
    ?>
</div>

<div class="past cf">
<div class="cf"><img src="<?php echo esc_url( home_url( '/wp-content/uploads/events.png') ); ?>" class="eventheadico"><h3 class="eventheading">past events</h3>
<div class="eventsort-by">
	  <h4>Year</h4>
      <ul name="orderby" class="event-cat">
      <li value="2016">2016</li>
      <li value="2017">2017</li>      
      </ul>
</div>
      <?php
      $selected_event = $_COOKIE['event_cat'];
	  if($selected_event == '') {
        $selected_event = date('Y');
      }
      ?>
</div>
<?php
global $post;
$get_posts = tribe_get_events(array('posts_per_page'=>3, 'eventDisplay'=>'past') );
foreach($get_posts as $post) { setup_postdata($post);
        ?>        
    <?php if ( has_post_thumbnail() ) { 
	   $year = tribe_get_start_date( $post->ID, false, 'Y' );
     if($year == $selected_event) {
	?>
    
      <div class="thumbList">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
		<div class="thumbContent">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h3><?php the_title(); ?></h3></a>
      <p class="pastevent-day">
          <span><?php echo tribe_get_start_date( $post->ID, false, 'M' ); ?></span>
      	  <span><?php echo tribe_get_start_date( $post->ID, false, 'd' ); ?></span>
      </p>
      <div class="event-excerpt">  
        <?php the_excerpt(); ?>
      </div>
      <address>
	  <img src="<?php echo esc_url( home_url( '/wp-content/uploads/location.png') ); ?>" class="pasteventlocico">
       	<span><?php echo tribe_get_full_address ($post->ID, false); ?></span>
       </address>   
	  </div>
	 </div>
       
    <?php }
	}
} //endforeach 
  ?>
    <?php wp_reset_query(); 
    ?>
</div>
<?php		
get_footer();
?>