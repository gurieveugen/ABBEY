<?php

define('TMP_DIR', plugin_dir_path(__FILE__));
/**
 * Fucking PHP 5.2.9 :(
 */
function __autoload($class_name) 
{
	$path     = sprintf('%s%s.php', TMP_DIR, $class_name);	
	$includes = sprintf('%sincludes\%s.php', TMP_DIR, $class_name);
	$controls = sprintf('%sincludes\Controls\%s.php', TMP_DIR, $class_name);	
	$admin    = sprintf('%sincludes\Admin\%s.php', TMP_DIR, $class_name);	
	$path     = str_replace('\\', '/', $path);	
	$includes = str_replace('\\', '/', $includes);	
	$controls = str_replace('\\', '/', $controls);	
	$admin    = str_replace('\\', '/', $admin);	

	if (file_exists($path))
	{
		require_once $path;
    }	
    else if(file_exists($includes))
    {
    	require_once $includes;	
    }
    else if(file_exists($controls))
    {
    	require_once $controls;	
    }
    else if(file_exists($admin))
    {
    	require_once $admin;	
    }
}

/**
 * Sets up the content width value based on the theme's design.
 * @see twentythirteen_content_width() for template-specific adjustments.
 */
if ( ! isset( $content_width ) )
	$content_width = 604;

/**
 * Adds support for a custom header image.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Twenty Thirteen only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) )
	require get_template_directory() . '/inc/back-compat.php';

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Thirteen supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_setup() {
	/*
	 * Makes Twenty Thirteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'twentythirteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentythirteen', get_template_directory() . '/languages' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */


	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Switches default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'twentythirteen' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'twentythirteen_setup' );

/**
 * Returns the Google font stylesheet URL, if available.
 *
 * The use of Source Sans Pro and Bitter by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentythirteen_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'twentythirteen' );

	/* Translators: If there are characters in your language that are not
	 * supported by Bitter, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$bitter = _x( 'on', 'Bitter font: on or off', 'twentythirteen' );

	if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {
		$font_families = array();

		if ( 'off' !== $source_sans_pro )
			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';

		if ( 'off' !== $bitter )
			$font_families[] = 'Bitter:400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Enqueues scripts and styles for front end.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_scripts_styles() {
	// Adds JavaScript to pages with the comment form to support sites with
	// threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds Masonry to handle vertical alignment of footer widgets.
	if ( is_active_sidebar( 'sidebar-1' ) )
		wp_enqueue_script( 'jquery-masonry' );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfourteen-style', get_stylesheet_uri(), array( 'genericons' ) );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style', 'genericons' ), '20131205' );

	// Loads JavaScript file with functionality specific to Twenty Thirteen.
	wp_enqueue_script( 'twentythirteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2013-07-18', true );

	// Add Open Sans and Bitter fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentythirteen-fonts', twentythirteen_fonts_url(), array(), null );

	// Loads our main stylesheet.
	wp_enqueue_style( 'twentythirteen-style', get_stylesheet_uri(), array(), '2013-07-18' );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentythirteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentythirteen-style' ), '2013-07-18' );
	wp_style_add_data( 'twentythirteen-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentythirteen_scripts_styles' );

/**
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentythirteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentythirteen_wp_title', 10, 2 );

if ( ! function_exists( 'twentythirteen_paging_nav' ) ) :
/**
 * Displays navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'twentythirteen' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'twentythirteen_post_nav' ) ) :
/**
 * Displays navigation to next/previous post when applicable.
*
* @since Twenty Thirteen 1.0
*
* @return void
*/
function twentythirteen_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentythirteen' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'twentythirteen' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'twentythirteen' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'twentythirteen_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentythirteen_entry_meta() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'twentythirteen' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		twentythirteen_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;

if ( ! function_exists( 'twentythirteen_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own twentythirteen_entry_date() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param boolean $echo Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function twentythirteen_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'twentythirteen' );
	else
		$format_prefix = '%2$s';

	$date = sprintf('');

	if ( $echo )
		echo $date;

	return $date;
}
endif;

if ( ! function_exists( 'twentythirteen_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'twentythirteen_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Returns the URL from the post.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string The Link format URL.
 */
function twentythirteen_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Extends the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentythirteen_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'body_class', 'twentythirteen_body_class' );

/**
 * Adjusts content_width value for video post formats and attachment templates.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_content_width() {
	global $content_width;

	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'twentythirteen_content_width' );

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @return void
 */
function twentythirteen_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentythirteen_customize_register' );

/**
 * Binds JavaScript handlers to make Customizer preview reload changes
 * asynchronously.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_customize_preview_js() {
	wp_enqueue_script( 'twentythirteen-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130226', true );
}
add_action( 'customize_preview_init', 'twentythirteen_customize_preview_js' );

//     __  ___                        __   
//    /  |/  /_  __   _________  ____/ /__ 
//   / /|_/ / / / /  / ___/ __ \/ __  / _ \
//  / /  / / /_/ /  / /__/ /_/ / /_/ /  __/
// /_/  /_/\__, /   \___/\____/\__,_/\___/ 
//        /____/                       

// ==============================================================
// Constats
// ==============================================================
define('TDU', get_bloginfo('template_url'));
// ==============================================================
// Requre
// ==============================================================    
require_once 'includes/__.php';
/**
 * 
 */
require_once 'includes/Controls/ControlsCollection.php';

require_once 'includes/widget_promotion_box.php';
require_once 'includes/widget_video_box.php';
require_once 'includes/widget_client_testimonials.php';
require_once 'includes/widget_product_categories.php';


// ==============================================================
// Actions & Filters
// ==============================================================
add_action('wp_enqueue_scripts', 'customScriptsAndStyles');
add_action('widgets_init', 'widgetsInit');
// ==============================================================
// Image sizes
// ==============================================================
add_image_size('product-widget', 325, 108, true);
add_image_size('product-thumbnail', 135, 119, true);
add_image_size('product', 135, 133, true);
add_image_size('slider', 1020, 328, true);
add_image_size('logo', 90, 30, true);
add_image_size('page-thumbnail', 876, 199, true);

//    ____________   __________  ___    __  __________       ______  ____  __ __
//   / ____/ ____/  / ____/ __ \/   |  /  |/  / ____/ |     / / __ \/ __ \/ //_/
//  / / __/ /      / /_  / /_/ / /| | / /|_/ / __/  | | /| / / / / / /_/ / ,<   
// / /_/ / /___   / __/ / _, _/ ___ |/ /  / / /___  | |/ |/ / /_/ / _, _/ /| |  
// \____/\____/  /_/   /_/ |_/_/  |_/_/  /_/_____/  |__/|__/\____/_/ |_/_/ |_|  
                                                                             

// ==============================================================
// Controls collections
// ==============================================================
$ccollection_global_settings = new ControlsCollection(
	array(		
		new Text(
			'Pinterest URL', 
			array('default-value' => 'http://www.pinterest.com/'), 
			array('placeholder' => 'Enter your pinterest URL')
		),
		new Text(
			'Facebook URL', 
			array('default-value' => 'http://www.facebook.com/whitehouse'), 
			array('placeholder' => 'Enter your facebook page URL')
		),
		new Textarea(
			'Address', 
			array('default-value' => 'PO Box 355, Osborne Park, Western Australia 6917'),
			array('placeholder' => 'Enter your address')
		),
		new Textarea(
			'Phone text',
			array('default-value' => 'Phone 08 9443 1300 or 0413 778 141'),
			array('placeholder' => 'Enter you phone text')
		)
	)
);

$ccollection_main_slider = new ControlsCollection(
	array(
		new Text(
			'Slider delay', 
			array(
				'default-value' => '5',
				'description'   => 'Delay in seconds'
			), 
			array('placeholder' => 'Delay')
		),
		new Text(
			'Count slides', 
			array('default-value' => '5'), 
			array('placeholder' => 'Count')
		)
	)
);

$ccollection_testimonial = new ControlsCollection(
	array(
		new Text(
			'Rating',
			array(
				'default-value' => '0',
				'description' => 'Testimonial rating ( [min] 1 - 5 [max] )'
			),
			array('placeholder' => 'Testimonial rating')			
		)
	)
);

$ccolection_page = new ControlsCollection(
	array(
		new Textarea(
			'Subtitle'
		)
	)
);

$ccolection_product_cat = new ControlsCollection(
	array(
		new Media(
			'Background image'
		),
		new Media(
			'Logo'
		),
		new Checkbox(
			'Show logos box'
		)
	)
);

$ccolection_logo = new ControlsCollection(
	array(
		new Text(
			'External link',
			array(),
			array('placeholder' => 'URL')
		)
	)
);

$ccolection_product = new ControlsCollection(
	array(
		new Media(
			'First logo'
		),
		new Media(
			'Second logo'
		),
		new Checkbox('Show title')
	)
);

// ==============================================================
// Sections
// ==============================================================
$section_global_settings = new Section(
	'Global settings', 
	array(
		'prefix'   => 'gs_',
		'tab_icon' => 'fa-cog'
	), 
	$ccollection_global_settings
);
$section_main_slider = new Section(
	'Main slider options', 
	array(
		'prefix' => 'mso_',
		'tab_icon' => 'fa-picture-o'
	), 
	$ccollection_main_slider
);

// ==============================================================
// Pages & Post types
// ==============================================================
$theme_settings = new Page(
	'Theme settings', 
	array('parent_page' => 'themes.php'), 
	array(
		$section_global_settings,
		$section_main_slider
	)
);

$post_type_slider = new PostType(
	'Slider', 
	array(
		'icon_code' => 'f03e', 
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
	)
);

$post_type_testimonial = new PostType(
	'Testimonial',
	array(
		'icon_code' => 'f086', 
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt')	
	)
);

$post_type_product = new PostType(
	'Product',
	array(
		'icon_code'  => 'f07a', 
		'supports'   => array('title', 'editor', 'thumbnail', 'excerpt'),
		'taxonomies' => array('product_cat') 	
	)
);

$post_type_logo = new PostType(
	'Logo',
	array(
		'icon_code'  => 'f201', 
		'supports'   => array('title', 'thumbnail')
	)
);

// ==============================================================
// Custom Metaboxes
// ==============================================================
$meta_box_testimonial = new MetaBox(
	'Additional testimonial options', 
	array(
		'post_type' => 'testimonial', 
		'prefix' => 'ato_'
	), 
	$ccollection_testimonial
);

$meta_box_additional = new MetaBox(
	'Additional page options', 
	array(
		'post_type' => 'page', 
		'prefix' => 'apo_'
	), 
	$ccolection_page
);

$meta_box_logo = new MetaBox(
	'Additional logo options', 
	array(
		'post_type' => 'logo', 
		'prefix' => 'alo_'
	), 
	$ccolection_logo
);

$meta_box_product = new MetaBox(
	'Logos', 
	array(
		'post_type' => 'product', 
		'prefix' => 'pl_'
	), 
	$ccolection_product
);
// ==============================================================
// Custom Taxonomies
// ==============================================================
$taxonomy_product_cat = new Taxonomy(
	'Product category',
	array(
		'post_type' => 'product',
		'plural'    => 'Product categories',
		'name'      => 'product_cat'
	),
	$ccolection_product_cat
);

// ==============================================================
// Other code
// ==============================================================
$testimonial        = new Testimonials();
$logos              = new Logos();
$products           = new Products();
$products_comercial = new ProductsComercial();


/**
 * Custom scipts and styles
 */
function customScriptsAndStyles()
{
	wp_enqueue_script('css_browser_selector', TDU.'/js/css_browser_selector.js');
	wp_enqueue_script('jquery-min', TDU.'/js/jquery.min.js');
	wp_enqueue_script('formstyler', TDU.'/js/jquery.formstyler.js', array('jquery'));
	wp_enqueue_script('main', TDU.'/js/main.js', array('jquery'));
	wp_enqueue_script('slider', TDU.'/js/jquery.flexslider.js', array('jquery'));

	wp_localize_script(
		'slider', 
		'l10n_slider',  
		__::getOptions(array('mso_slider_delay'))
	);
}

/**
 * Register custom sidebar
 */
function widgetsInit()
{
	register_sidebar(array(
			'name'          => __('Front page Sidebar', 'ABBEY'),
			'id'            => 'front-page-sidebar',
			'description'   => __('Sidebar for front page', 'ABBEY'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) 
	);

	register_sidebar(array(
			'name'          => __('Contact page Sidebar', 'ABBEY'),
			'id'            => 'contact-page-sidebar',
			'description'   => __('Sidebar for contact page', 'ABBEY'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) 
	);

	register_sidebar(array(
			'name'          => __('Products Sidebar', 'ABBEY'),
			'id'            => 'products-sidebar',
			'description'   => __('Sidebar for products category', 'ABBEY'),
			'before_widget' => '<nav id="%1$s" class="widget %2$s">',
			'after_widget'  => '</nav>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) 
	);

	register_sidebar(array(
			'name'          => __('Internal page Sidebar', 'ABBEY'),
			'id'            => 'internal-page-sidebar',
			'description'   => __('Sidebar for internal page', 'ABBEY'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) 
	);

	register_widget('PromotionBox');
	register_widget('VideoBox');
	register_widget('ClientTestimonials');
	register_widget('ProductCategories');
}

function getLogoProductFromCat($cat)
{
	$field_logo = Taxonomy::getOptionName($cat->term_id, 'product_cat_logo');
	$logo = (string) get_option($field_logo);
	if(strlen($logo))
	{
		return sprintf('<div class="logo-product"><img src="%s" alt="Logo"></div>', $logo);
	}
	return '';
}

function deleteEmptyLevel4($arr)
{      
   $empty_elements = array_keys($arr, '');      
   foreach ($empty_elements as &$e) unset($arr[$e]);

   return $arr;
}