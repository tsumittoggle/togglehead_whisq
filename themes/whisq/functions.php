<?php 
/**
 * Whisq functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Whisq only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function whisq_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/whisq
	 * If you're building a theme based on Whisq, use a find and replace
	 * to change 'whisq' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'whisq' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'whisq-featured-image', 2000, 1200, true );

	add_image_size( 'whisq-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'whisq' ),
		'social' => __( 'Social Links Menu', 'whisq' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', whisq_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'whisq' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'whisq' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'whisq' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'whisq' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'whisq' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Whisq array of starter content.
	 *
	 * @since Whisq 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'whisq_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'whisq_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function whisq_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( whisq_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Whisq content width of the theme.
	 *
	 * @since Whisq 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'whisq_content_width', $content_width );
}
add_action( 'template_redirect', 'whisq_content_width', 0 );

/**
 * Register custom fonts.
 */
function whisq_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'whisq' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Whisq 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function whisq_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'whisq-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'whisq_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function whisq_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'whisq' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'whisq' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'whisq' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'whisq' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'whisq' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'whisq' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'whisq_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Whisq 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function whisq_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'whisq' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'whisq_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Whisq 1.0
 */
function whisq_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'whisq_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function whisq_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'whisq_pingback_header' );

/**
 * Display custom color CSS.
 */
function whisq_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>
		<?php echo whisq_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'whisq_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function whisq_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'whisq-fonts', whisq_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'whisq-style', get_stylesheet_uri() );

	// Load the dark colorscheme.
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		wp_enqueue_style( 'whisq-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'whisq-style' ), '1.0' );
	}

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'whisq-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'whisq-style' ), '1.0' );
		wp_style_add_data( 'whisq-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'whisq-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'whisq-style' ), '1.0' );

	wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.min.css' ), array( 'whisq-style' ), '1.0' );

	wp_enqueue_style( 'owl-css', get_theme_file_uri( '/assets/css/owl.carousel.min.css' ), array( 'whisq-style' ), '1.0' );

	wp_enqueue_style( 'owl-theme', get_theme_file_uri( '/assets/css/owl.theme.default.min.css' ), array( 'whisq-style' ), '1.0' );

	wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/assets/css/font-awesome.min.css' ), array( 'whisq-style' ), '1.0' );

	wp_style_add_data( 'whisq-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'whisq-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$whisq_l10n = array(
		'quote'          => whisq_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'whisq-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$whisq_l10n['expand']         = __( 'Expand child menu', 'whisq' );
		$whisq_l10n['collapse']       = __( 'Collapse child menu', 'whisq' );
		$whisq_l10n['icon']           = whisq_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}

	wp_enqueue_script( 'whisq-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array( 'jquery' ) );

    wp_enqueue_script( 'jquery-js', get_theme_file_uri( '/assets/js/jquery.min.js' ), array( 'jquery' ) );

    wp_enqueue_script( 'mobile-js', get_theme_file_uri( '/assets/js/swipe.js' ), array( 'jquery' ) );

    wp_enqueue_script( 'script', get_theme_file_uri( '/assets/js/script.js' ), array( 'jquery' ), true );

     wp_enqueue_script( 'owl-script', get_theme_file_uri( '/assets/js/owl.carousel.min.js' ), array( 'jquery' ), true );

	wp_localize_script( 'whisq-skip-link-focus-fix', 'whisqScreenReaderText', $whisq_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'whisq_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Whisq 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function whisq_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'whisq_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Whisq 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function whisq_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'whisq_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Whisq 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function whisq_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'whisq_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Whisq 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function whisq_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'whisq_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
*Recipes ,tips and store Custom post
**/
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'tips',
    array(
      'labels' => array(
        'name' => __( 'Tips' ),
        'singular_name' => __( 'Tips' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'editor', 'author'), 
    )
  );
   register_post_type( 'store',
    array(
      'labels' => array(
        'name' => __( 'Store' ),
        'singular_name' => __( 'Store' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'thumbnail'), 
    )
  );
   register_post_type( 'slider',
    array(
      'labels' => array(
        'name' => __( 'Sliders' ),
        'singular_name' => __( 'Sliders' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'thumbnail'), 
    )
  );
  register_post_type( 'address',
    array(
      'labels' => array(
        'name' => __( 'Locate Us Address' ),
        'singular_name' => __( 'Locate Us Address' )
      ),
      'public' => true,
      'has_archive' => true,
      'taxonomies'  => array( 'category', 'post_tag' ),
      'supports' => array( 'title', 'editor', 'thumbnail'), 
    )
  );
}

/**
*Custom menu
**/
function register_my_menus() {
register_nav_menus(
array(
'header-menu' => __( 'Header Menu' ),
'footer-menu-first' => __( 'Footer Menu Section First' ),
'footer-menu-second' => __( 'Footer Menu Section Second' ),
'footer-menu-third' => __( 'Footer Menu Section Third' ),
'footer-menu-fourth' => __( 'Footer Menu Section Fourth' )
)
);
}
add_action( 'init', 'register_my_menus' );

/**
*Custom logo
**/
function theme_prefix_setup() {
	
	add_theme_support( 'custom-logo', array(
		'height' => 100,
		'width' => 400,
		'flex-width' => true,
	) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );

function theme_prefix_the_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

}


add_filter('wspsc_cart_icon_image_src', 'override_cart_image_icon');
function override_cart_image_icon($cart_img_src)
{
    //Specify the URL of your custom cart image
    $cart_img_src = 'http://www.example.com/uploads/my-custom-cart-image-icon.jpg';
    return $cart_img_src;
}

function custom_pre_get_posts_query( $q ) {

    $tax_query = (array) $q->get( 'tax_query' );

    $tax_query[] = array(
           'taxonomy' => 'product_cat',
           'field' => 'slug',
           'terms' => array( 'pans' ), 
           'operator' => 'NOT IN'
    );


    $q->set( 'tax_query', $tax_query );

}
add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' );

//removing default breadcumb
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

//adding custom breadcumb and page title
add_action('woocommerce_before_main_content', 'woocommerce_breadcrumb_custom');

function woocommerce_breadcrumb_custom() {
     ?>
     <div class="whisqtitle">
     <?php
    $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

    if ( $product_cats && ! is_wp_error ( $product_cats ) ){

        $single_cat = array_shift( $product_cats ); 
        
        $cat = $single_cat->name;
		
        ?>
        
        <h2 itemprop="name" class="product_category_title"><span><?php echo $single_cat->name; ?></span></h2>
<?php }
?>

<p> <a title="Whisq" href="<?php echo esc_url( home_url( '/product-shop/') ); ?>" >Home</a> > <a href="<?php echo esc_url( home_url( '/product-shop/'.$cat.'/') ); ?>"><?php echo $cat;?></a> > <?php the_title();?> </p>
</div>
<?php
}

//adding next and previous
add_action('woocommerce_before_main_content', 'next_previous_product');

function next_previous_product() {
  
    $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

    if ( $product_cats && ! is_wp_error ( $product_cats ) ){

        $single_cat = array_shift( $product_cats ); 
		
        ?>
        <div class="poduct-select cf">
        <div class="prev">
        	<?php previous_post_link('%link','Previous'); ?>
        </div>
        <div class="next">
        	<?php next_post_link('%link','Next'); ?>
        </div>
        </div>

<?php }
}

//adding add to cart
add_action('woocommerce_after_add_to_cart_button', 'add_cart_btn');

function add_cart_btn() {
	?>
  <a rel="nofollow" href="/whisq/product-shop/?add-to-cart=354" data-quantity="1" data-product_id="354" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart feature-btn">Add to cart</a>
  <?php
}

//removing meta tag
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

//adding social share link
add_action( 'woocommerce_share', 'social_share' );

function social_share(){
	?>
	<span class="share">share</span>
	<?php
}


//removing sell otion
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

// Remove Sidebar on all the Single Product Pages
 add_action( 'wp', 'bbloomer_remove_sidebar_product_pages' );
 
function bbloomer_remove_sidebar_product_pages() {
if (is_product()) {
remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);
}
}

//customizing tab for product detail page
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	if($tabs['description']['title']) {
	$tabs['description']['title'] = __( 'uses & features' );	
	$tabs['description']['priority'] = 15;	
	}	

	if($tabs['additional_information']['title']) {
	$tabs['additional_information']['title'] = __( 'product details' );	
	$tabs['additional_information']['priority'] = 10;	
}

	unset( $tabs['reviews'] ); 

	return $tabs;

}

//removing related product
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);


//adding content at last of page
add_action( 'woocommerce_after_single_product', 'add_content_after_product', 15 );

function add_content_after_product() {?>

	<div class="wrapper cf">	
	<h2 class="heading">featured recipes</h2>
	<div class="recipe cf">
  <?php
		$recipe = array( 'post_type' => 'recipes', 'posts_per_page' => 3, 'orderby' => 'rand' );
		$recipe_list = new WP_Query( $recipe );
		while ( $recipe_list->have_posts() ) : $recipe_list->the_post();
		?>
			<div class="feature-recipes-list">
			  <div class="feature-recipes-img">
			    <a href="<?php the_permalink(); ?>">
			  	<?php the_post_thumbnail(); ?>
			  	</a>
			  </div>
			  <div class="feature-recipe-content">
				  <h3><?php the_title(); ?></h3>
				  <p><?php the_excerpt(); ?></p>
				  <a class="recipe-more" href="<?php get_post_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
			      <div class="share-rec">
				  <span class="shareact"><img src="http://www.togglehead.net/whisq/wp-content/uploads/allshare.png"><i class="sharehide">share</i></span>
				   <div class="share-icon"><?php echo do_shortcode('[addtoany]'); ?></div>
				  </div>
				</div>
			</div>
		<?php
		endwhile;
		wp_reset_query(); 
  ?>
	</div>
</div>
<?php
}


add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 20 );

remove_action( 'woocommerce_after_single_product', 'woocommerce_show_product_sale_flash', 20
 );

//adding description last of product detail page
add_action('woocommerce_after_single_product', 'product_detail_last_description', 25);

function product_detail_last_description() {
  
    $terms_cat = get_the_terms( $post->ID, 'product_cat' );
    foreach ( $terms_cat as $term ){
        $category_name = $term->name;
        $category_thumbnail = get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true);
        $image = wp_get_attachment_url($category_thumbnail);
        ?>
        <div class="bottom-wrapper cat-description" style="background-image: url(<?php echo $image ?>);">
			     <div class="bottombancont">
				 <p> <?php echo $term->description; ?></p>
				 </div>
        </div>
        <?php
    }
}

function recipes_register() {
    $labels = array(
        'name' => _x('recipes', 'post type general name'),
        'singular_name' => _x('recipes Item', 'post type singular name'),
        'add_new' => _x('Add New', 'recipes item'),
        'add_new_item' => __('Add New recipes Item'),
        'edit_item' => __('Edit recipes Item'),
        'new_item' => __('New recipes Item'),
        'view_item' => __('View recipes Item'),
        'search_items' => __('Search recipes Items'),
        'not_found' =>  __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 8,
        'supports' => array('title','editor','thumbnail', 'excerpt')
    ); 
    register_post_type( 'recipes' , $args );
}
add_action('init', 'recipes_register');

function create_recipes_taxonomies() {
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );

    $args = array(
        'hierarchical'      => true, 
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'categories' ),
    );

    register_taxonomy( 'recipes_categories', array( 'recipes' ), $args );
}
add_action( 'init', 'create_recipes_taxonomies', 0 );


// Filters
add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args' );
add_filter( 'woocommerce_default_catalog_orderby_options', 'custom_woocommerce_catalog_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby' );
 
 // Apply custom args to main query
function custom_woocommerce_get_catalog_ordering_args( $args ) {
	$orderby_value = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
 
	if ( 'oldest_to_recent' == $orderby_value ) {
		$args['orderby'] = 'date';
		$args['order'] = 'ASC';
	}
 
	return $args;
}
 
// Create new sorting method
function custom_woocommerce_catalog_orderby( $sortby ) {
	
	$sortby['oldest_to_recent'] = __( 'Oldest to most recent', 'woocommerce' );
	
	return $sortby;
}

//product added light box
add_theme_support( 'wc-product-gallery-lightbox' );

//==================================================================
//cart page detail
//==================================================================
// add_action('woocommerce_before_cart', 'displays_cart_products_feature_image');
// function displays_cart_products_feature_image() {
//     foreach ( WC()->cart->get_cart() as $cart_item ) {
//         $item = $cart_item['data'];
//         if(!empty($item)){
//             $product = new WC_product($item->id);
//             // $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->ID ), 'single-post-thumbnail' );
//             echo $product->name;
//             echo $product->price;
//             echo $product->quantity;
//             echo $product->get_image();
//             $quantity = $cart_item['quantity'];
//             echo $quantity;
//             $pice_total = $cart_item['data']->get_price();

//             $total =  $pice_total * $quantity;
//             echo $total;
//             
//             // to display only the first product image uncomment the line bellow
//             // break;
//         }
//     }
// }

//==================================================================
//checkout page detail
//==================================================================

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

add_action( 'woocommerce_before_checkout_form', 'login_form', 15 );

function login_form() {
	?>
	<div class="login-already">
		<p>Already a member? click here to <a href="#" title="Login">login</a></p>
	</div>
	<?php
}

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );

add_action( 'woocommerce_checkout_order_review', 'order_detail', 15 );

function order_detail() {
	if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<div class="cart-content">
			
			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<div class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

						<div class="thumbnail-item" class="product-thumbnail">
							<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

								if ( ! $product_permalink ) {
									echo $thumbnail;
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
								}
							?>
						</div>
            
            <div class="item-detail">
						<h2 class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
							<?php
								if ( ! $product_permalink ) {
									echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
								} else {
									echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
								}

								// Meta data
								echo WC()->cart->get_item_data( $cart_item );

								// Backorder notification
								if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
									echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
								}
							?>
						</h2>
						</div>

					<div class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
							<?php
							  $total = apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
							?>
						</div> 
						</div>
					</div>
					<?php
				}
			}
			?>

<div class="cart-collaterals">
	<?php
		/**
		 * woocommerce_cart_collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
	 	do_action( 'woocommerce_cart_collaterals' );
	?>
</div>
</div>
<?php do_action( 'woocommerce_after_cart' ); 

if( WC()->cart->get_cart_contents_count() > 0){ ?>
<?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> <span>items</span> 
  <?php } 
 if( WC()->cart->total > 0){ ?>
<?php $total_price = sprintf ( _n( '%d', '%d', WC()->cart->total ), WC()->cart->total ); ?> 
<div class="total-card">
<p><span>Order Total</span><span><?php echo $total_price; ?></span></p>
<p><span>Delivery</span><span>_</span></p>
<p class="final-total"><span>Total Payable</span><span><?php echo $total_price; ?></span></p>
</div>
  <?php } 
}


function faq_register() {
    $labels = array(
        'name' => _x('faq', 'post type general name'),
        'singular_name' => _x('faq Item', 'post type singular name'),
        'add_new' => _x('Add New', 'faq item'),
        'add_new_item' => __('Add New faq Item'),
        'edit_item' => __('Edit faq Item'),
        'new_item' => __('New faq Item'),
        'view_item' => __('View faq Item'),
        'search_items' => __('Search faq Items'),
        'not_found' =>  __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 8,
        'supports' => array('title','editor','thumbnail', 'excerpt')
    ); 
    register_post_type( 'faq' , $args );
}
add_action('init', 'faq_register');

function create_faq_taxonomies() {
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );

    $args = array(
        'hierarchical'      => true, 
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'categories' ),
    );

    register_taxonomy( 'faq_categories', array( 'faq' ), $args );
}
add_action( 'init', 'create_faq_taxonomies', 0 );

add_action( 'yith_wcwl_before_wishlist_title', 'before_wishlist' );

function before_wishlist() { ?>
		<div class="whisqtitle">
			<h2><?php the_title(); ?></h2>
			<p class="wrapper breadcrumb-url"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Home</a> > <span><?php the_title(); ?></span></p>
		</div>
<?php }

add_action( 'yith_wcwl_before_wishlist_share', 'no_product_wishlist' );

function no_product_wishlist() {
?>
<!-- <div class="no-wishlist">
	<p class="no-wish-head">wishlist empty</p>
	<p>Save your pieces of clothing in one place Add now, <span>buy latter</span></p>
	<img src="" alt="no_wishlist" />
	<div>
	<a href="" class="feature-btn button" title="Continue Shopping">continue shopping</a>
	</div>
</div> -->
<?php
}
