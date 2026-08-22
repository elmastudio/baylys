<?php
/**
 * Baylys functions and definitions
 *
 * @package Baylys
 * @since Baylys 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Theme update feature setup
/*-----------------------------------------------------------------------------------*/

if ( ! class_exists( 'WC_AM_Client_25' ) ) {
	require_once( get_template_directory() . '/inc/wc-am-client.php' );
}

if ( class_exists( 'WC_AM_Client_25' ) ) {

	$wcam_lib = new WC_AM_Client_25( __FILE__, '', wp_get_theme( wp_get_theme()->Template )->Version, 'theme', 'https://www.elmastudio.de/', wp_get_theme( wp_get_theme()->Template )->Name, wp_get_theme( wp_get_theme()->Template )->get( 'TextDomain' ), '31029' );

}

/*-----------------------------------------------------------------------------------*/
/* Set the content width based on the theme's design and stylesheet.
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
	$content_width = 780; /* pixels */


/*-----------------------------------------------------------------------------------*/
/* Sets up theme defaults and registers support for various WordPress features.
/*-----------------------------------------------------------------------------------*/
/**
 * Tell WordPress to run baylys_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'baylys_setup' );

if ( ! function_exists( 'baylys_setup' ) ):
/**
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override baylys_setup() in a child theme, add your own baylys_setup to your child theme's
 * functions.php file.
 */
function baylys_setup() {

	// Make Baylys available for translation. Translations can be added to the /languages/ directory.
	load_theme_textdomain( 'baylys', get_template_directory() . '/languages' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support for editor font sizes.
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => __( 'small', 'baylys' ),
			'shortName' => __( 'S', 'baylys' ),
			'size' => 16,
			'slug' => 'small'
		),
		array(
			'name' => __( 'regular', 'baylys' ),
			'shortName' => __( 'M', 'baylys' ),
			'size' => 20,
			'slug' => 'regular'
		),
		array(
			'name' => __( 'large', 'baylys' ),
			'shortName' => __( 'L', 'baylys' ),
			'size' => 26,
			'slug' => 'large'
		),
		array(
			'name' => __( 'larger', 'baylys' ),
			'shortName' => __( 'XL', 'baylys' ),
			'size' => 30,
			'slug' => 'larger'
		)
	) );

	// Disable custom editor font sizes.
	add_theme_support('disable-custom-font-sizes');

	// Add editor color palette.
	add_theme_support( 'editor-color-palette', array(
		array(
			'name' => __( 'black', 'baylys' ),
			'slug' => 'black',
			'color' => '#000000',
		),
		array(
			'name' => __( 'white', 'baylys' ),
			'slug' => 'white',
			'color' => '#ffffff',
		),
		array(
			'name' => __( 'light grey', 'baylys' ),
			'slug' => 'light-grey',
			'color' => '#f6f6f6',
		),
		array(
			'name' => __( 'dark grey', 'baylys' ),
			'slug' => 'dark-grey',
			'color' => '#5f5c52',
		),
		array(
			'name' => __( 'grey', 'baylys' ),
			'slug' => 'grey',
			'color' => '#c2c2c2',
		),
	) );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style( array( 'editor-style.css' ) );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Load up the Baylys theme options page and related code.
	require( get_template_directory() . '/inc/theme-options.php' );

	// Add support for Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'status', 'link', 'quote', 'image', 'gallery', 'video', 'audio','chat' ) );

	// This theme uses wp_nav_menu().
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'baylys' ),
		'optional' => __( 'Footer Navigation (no sub menus supported)', 'baylys' )
	) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'baylys_custom_background_args', array(
		'default-color' => 'ffffff',
	) ) );

	// Add support for custom headers.
	$custom_header_support = array(
		'width' => apply_filters( 'baylys_header_image_width', 1400 ),
		'height' => apply_filters( 'baylys_image_height', 550 ),
		'flex-height' => true,
		'random-default' => true,
		'header-text' => false,
		'wp-head-callback' => '',
		'admin-head-callback' => 'baylys_admin_header_style',
		'admin-preview-callback' => 'baylys_admin_header_image',
	);

	add_theme_support( 'custom-header', $custom_header_support );

	if ( ! function_exists( 'get_custom_header' ) ) {
		// This is all for compatibility with versions of WordPress prior to 3.4.
		define( 'HEADER_IMAGE', '' );
		define( 'HEADER_IMAGE_WIDTH', $custom_header_support['width'] );
		define( 'HEADER_IMAGE_HEIGHT', $custom_header_support['height'] );
		add_custom_image_header( $custom_header_support['wp-head-callback'], $custom_header_support['admin-head-callback'], $custom_header_support['admin-preview-callback'] );
	}

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be the size of the header image that we just defined
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( $custom_header_support['width'], $custom_header_support['height'], true );

	// Add Baylys's custom image sizes.
	add_image_size( 'large-feature', $custom_header_support['width'], $custom_header_support['height'], true );

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'summer' => array(
			'url' => '%s/images/headers/summer.jpg',
			'thumbnail_url' => '%s/images/headers/summer-thumbnail.jpg',
			'description' => __( 'Summer', 'baylys' )
		),
		'boats' => array(
			'url' => '%s/images/headers/boats.jpg',
			'thumbnail_url' => '%s/images/headers/boats-thumbnail.jpg',
			'description' => __( 'Boats', 'baylys' )
		),
		'sand' => array(
			'url' => '%s/images/headers/sand.jpg',
			'thumbnail_url' => '%s/images/headers/sand-thumbnail.jpg',
			'description' => __( 'Sand', 'baylys' )
		),
		'cactus' => array(
			'url' => '%s/images/headers/cactus.jpg',
			'thumbnail_url' => '%s/images/headers/cactus-thumbnail.jpg',
			'description' => __( 'Cactus', 'baylys' )
		)
	) );
}
endif; // baylys_setup

if ( ! function_exists( 'baylys_admin_header_style' ) ) :

/*-----------------------------------------------------------------------------------*/
/* Register Google fonts for Baylys.
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'baylys_fonts_url' ) ) :

function baylys_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Amiri, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Amiri font: on or off', 'baylys' ) ) {
		$fonts[] = 'Open+Sans:300italic,400italic,700italic,400,300,700,800';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/*-----------------------------------------------------------------------------------*/
/* Call JavaScript Scripts for Baylys (Fitvids for elasic videos, Custom and Placeholder)
/*-----------------------------------------------------------------------------------*/

function baylys_scripts_function() {
	global $wp_styles;

	// Add fonts, used in the main stylesheet.
	wp_enqueue_style( 'baylys-fonts', baylys_fonts_url(), array(), null );

	// Loads main stylesheet.
	wp_enqueue_style( 'baylys-style', get_stylesheet_uri(), array(), '20150206' );

	// FitVids for responsive videos
	wp_enqueue_script( 'baylys-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1');

	// Loads the Placeholder script
	wp_enqueue_script( 'baylys-placeholder', get_template_directory_uri() . '/js/jquery.placeholder.min.js', array( 'jquery' ), '1.0');

	// Loads Custom Baylys JavaScript functionality
	wp_enqueue_script( 'baylys-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0');
}
add_action('wp_enqueue_scripts','baylys_scripts_function');

/*-----------------------------------------------------------------------------------*/
/* Load block editor styles.
/*-----------------------------------------------------------------------------------*/
function baylys_block_editor_styles() {
 wp_enqueue_style( 'baylys-block-editor-styles', get_template_directory_uri() . '/block-editor.css');
 wp_enqueue_style( 'baylys-fonts', baylys_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'baylys_block_editor_styles' );

/*-----------------------------------------------------------------------------------*/
/* Styles the header image displayed on the Appearance > Header admin panel.
/*-----------------------------------------------------------------------------------*/

function baylys_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#headimg img {
		max-width: 1132px;
		height: auto;
		width: 100%;
	}
	</style>
<?php
}
endif; // baylys_admin_header_style

if ( ! function_exists( 'baylys_admin_header_image' ) ) :

/*-----------------------------------------------------------------------------------*/
/* Custom header image markup displayed on the Appearance > Header admin panel.
/*-----------------------------------------------------------------------------------*/

function baylys_admin_header_image() { ?>
	<div id="headimg">
		<?php
		$image = get_header_image();
		if ( $color && $color != 'blank' )
			$style = ' style="color:#' . $color . '"';
		else
			$style = ' style="display:none"';
		?>
		<?php if ( $image ) : ?>
			<img src="<?php echo esc_url( $image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }
endif; // baylys_admin_header_image

/*-----------------------------------------------------------------------------------*/
/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
/*-----------------------------------------------------------------------------------*/

function baylys_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'baylys_page_menu_args' );

/*-----------------------------------------------------------------------------------*/
/* Sets the post excerpt length to 35 characters.
/*-----------------------------------------------------------------------------------*/

function baylys_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'baylys_excerpt_length' );

/*-----------------------------------------------------------------------------------*/
/* Returns a "Continue Reading" link for excerpts
/*-----------------------------------------------------------------------------------*/

function baylys_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Read more', 'baylys' ) . '</a>';
}

/*-----------------------------------------------------------------------------------*/
/* Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and baylys_continue_reading_link().
/*
/* To override this in a child theme, remove the filter and add your own
/* function tied to the excerpt_more filter hook.
/*-----------------------------------------------------------------------------------*/

function baylys_auto_excerpt_more( $more ) {
	return ' &hellip;' . baylys_continue_reading_link();
}
add_filter( 'excerpt_more', 'baylys_auto_excerpt_more' );

/*-----------------------------------------------------------------------------------*/
/* Adds a pretty "Continue Reading" link to custom post excerpts.
/*
/* To override this link in a child theme, remove the filter and add your own
/* function tied to the get_the_excerpt filter hook.
/*-----------------------------------------------------------------------------------*/

function baylys_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= baylys_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'baylys_custom_excerpt_more' );

/**
 * Callback to change just html output on a comment.
 */
function baylys_comments_callback($comment, $args, $depth){
	//checks if were using a div or ol|ul for our output
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
	?>
	<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '', $comment ); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 60 ); ?>
			</div>
			<div class="comment-content">
				<ul class="comment-meta">
					<li class="comment-reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'baylys' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></li>
					<li class="comment-author"><?php printf( __( '%s', 'baylys' ), sprintf( '%s', get_comment_author_link() ) ); ?></li>
					<li class="comment-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s &#64; %2$s', 'baylys' ),
						get_comment_date('j. F Y'),
						get_comment_time() );
					?></a></li>
					<li class="comment-edit"><?php edit_comment_link( __( 'Edit', 'baylys' ), ' ' );?></li>
				</ul>
				<div class="comment-text">
					<?php comment_text(); ?>

					<?php if ( $comment->comment_approved == '0' ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'baylys' ); ?></p>
					<?php endif; ?>
				</div><!-- end .comment-text -->
			</div><!-- end .comment-content -->
		</article><!-- end .comment -->
	<?php
}

/*-----------------------------------------------------------------------------------*/
/* Register widgetized areas
/*-----------------------------------------------------------------------------------*/

function baylys_widgets_init() {

	register_sidebar( array (
		'name' => __( 'Main Sidebar', 'baylys' ),
		'id' => 'sidebar-1',
		'description' => __( 'Widgets will appear in the main sidebar on posts and pages.', 'baylys' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Column 1', 'baylys' ),
		'id' => 'sidebar-2',
		'description' => __( 'Widgets will appear in the first column of the optional 4-column footer widget area.', 'baylys' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Column 2', 'baylys' ),
		'id' => 'sidebar-3',
		'description' => __( 'Widgets will appear in the second column of the optional 4-column footer widget area.', 'baylys' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Column 3', 'baylys' ),
		'id' => 'sidebar-4',
		'description' => __( 'Widgets will appear in the third column of the optional 4-column footer widget area.', 'baylys' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Column 4', 'baylys' ),
		'id' => 'sidebar-5',
		'description' => __( 'Widgets will appear in the fourth column of the optional 4-column footer widget area.', 'baylys' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'baylys_widgets_init' );


if ( ! function_exists( 'baylys_content_nav' ) ) :

/*-----------------------------------------------------------------------------------*/
/* Display navigation to next/previous pages when applicable
/*-----------------------------------------------------------------------------------*/

function baylys_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>" class="clearfix">
				<div class="nav-previous"><?php next_posts_link( __( '&laquo; Older Posts', 'baylys'  ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer Posts &raquo;', 'baylys' ) ); ?></div>
			</nav><!-- end #nav-below -->
	<?php endif;
}

endif; // baylys_content_nav

/*-----------------------------------------------------------------------------------*/
/* Add Baylys Shortcodes
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/shortcodes.php';

/*-----------------------------------------------------------------------------------*/
/* Add Baylys Widgets
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/widgets.php';

/*-----------------------------------------------------------------------------------*/
/* Add One Click Demo Import code.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/demo-installer.php';
