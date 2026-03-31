<?php
/**
 * Twenty Twelve functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'twentytwelve' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'colorful', get_template_directory() . '/languages' );

	require_once ( get_template_directory() . '/admin/theme-options.php' );

	add_filter( 'the_content', 'filter_the_content_linktarget' );
	function filter_the_content_linktarget( $content ) {
		if ( is_singular('hfcontent') ) {
			$content = preg_replace('/<a((?!.*target).*?)>/', '<a $1 target="_top">', $content);

			return $content;
		}

		return $content;
	}

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_theme_support('editor-styles');
	add_editor_style('editor-style.css');

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'colorful' ) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop

	add_theme_support('wp-block-styles');
	add_theme_support('align-wide');
}
add_action( 'after_setup_theme', 'twentytwelve_setup' );

function gutenberg_style_custom() {
	wp_enqueue_style( 'theme-editor-style', get_theme_file_uri('/gutenberg-style.css') );
	wp_enqueue_style( 'colorful-style', get_theme_file_uri('/admin/colorful-style.css') );
	wp_enqueue_style( 'colorful-blocks/divider', get_theme_file_uri() . '/custom-blocks/style-index.css' );
	wp_enqueue_script( 'colorful-style-selector', get_theme_file_uri('/admin/editor-helper.js'), [ 'wp-blocks' ] );
	wp_enqueue_script( 'colorful-blocks-template', get_theme_file_uri('/admin/template.js'), [] );
	wp_enqueue_script( 'colorful-blocks', get_theme_file_uri('/admin/blocks.js'), [ 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-plugins', 'wp-edit-post', 'wp-components', 'colorful-blocks-template' ] );
	wp_localize_script( 'colorful-blocks', 'colorful_blocks_imgurl', 'http://lptemp.com/dx/images/' );
	wp_set_script_translations( 'colorful-blocks', 'colorful', get_template_directory() . '/languages' );
}
add_action( 'enqueue_block_editor_assets', 'gutenberg_style_custom' );

function enqueue_webfonts() {
	wp_enqueue_style( 'colorful-notosans', 'https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300,400,500,700,900&display=swap&subset=japanese' );
	wp_enqueue_style( 'colorful-notoserif', 'https://fonts.googleapis.com/css?family=Noto+Serif+JP:200,300,400,500,600,700,900&display=swap&subset=japanese' );
	wp_enqueue_style( 'colorful-mplus', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&display=swap&subset=japanese' );
	wp_enqueue_style( 'colorful-kosugi', 'https://fonts.googleapis.com/css2?family=Kosugi&display=swap&subset=japanese' );
	wp_enqueue_style( 'colorful-kosugimaru', 'https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap&subset=japanese' );
	wp_enqueue_style( 'colorful-rocknroll', 'https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap&subset=japanese' );
	wp_enqueue_style( 'colorful-shippori', 'https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@400;500;600;700;800&display=swap&subset=japanese' );
	wp_enqueue_style( 'colorful-stick', 'https://fonts.googleapis.com/css2?family=Stick&display=swap&subset=japanese' );
}
add_action( 'admin_enqueue_scripts', 'enqueue_webfonts' );
add_action( 'wp_enqueue_scripts', 'enqueue_webfonts' );

function colorful_admin_body_class( $admin_body_class ) {
	return $admin_body_class = ' colorful_content';
}
add_action( 'admin_body_class', 'colorful_admin_body_class' );

/**
 * Enqueues scripts and styles for front-end.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/*
	 * Loads our special font CSS file.
	 *
	 * The use of Open Sans by default is localized. For languages that use
	 * characters not supported by the font, the font can be disabled.
	 *
	 * To disable in a child theme, use wp_dequeue_style()
	 * function mytheme_dequeue_fonts() {
	 *     wp_dequeue_style( 'twentytwelve-fonts' );
	 * }
	 * add_action( 'wp_enqueue_scripts', 'mytheme_dequeue_fonts', 11 );
	 */

	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'twentytwelve-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'colorful-style', get_template_directory_uri() . '/css/colorful-style.css' );
	wp_enqueue_style( 'colorful-blocks/divider', get_template_directory_uri() . '/custom-blocks/style-index.css' );
}
add_action( 'wp_enqueue_scripts', 'twentytwelve_scripts_styles' );

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Twenty Twelve 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function twentytwelve_wp_title( $title, $sep ) {
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
		$title = "$title $sep " . sprintf( __( 'Page %s', 'colorful' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentytwelve_wp_title', 10, 2 );

/**
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );

/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'colorful' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'colorful' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'ヘッダー(左)',
		'id' => 'header-1',
		'description' => __( 'テーマオプションでウィジェットテンプレートを選択した際に表示されるウィジェットです。', 'colorful' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'ヘッダー(右)',
		'id' => 'header-2',
		'description' => __( 'テーマオプションでウィジェットテンプレートを選択した際に表示されるウィジェットです。', 'colorful' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'フッター(左)',
		'id' => 'footer-1',
		'description' => __( 'テーマオプションでウィジェットテンプレートを選択した際に表示されるウィジェットです。', 'colorful' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'フッター(中央)',
		'id' => 'footer-2',
		'description' => __( 'テーマオプションでウィジェットテンプレートを選択した際に表示されるウィジェットです。', 'colorful' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'フッター(右)',
		'id' => 'footer-3',
		'description' => __( 'テーマオプションでウィジェットテンプレートを選択した際に表示されるウィジェットです。', 'colorful' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );

if ( ! function_exists( 'twentytwelve_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'colorful' ); ?></h3>
			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'colorful' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'colorful' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'twentytwelve_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'colorful' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'colorful' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'colorful' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'colorful' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'colorful' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'colorful' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'colorful' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentytwelve_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'colorful' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'colorful' ) );

	$date = '';/*sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);*/

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'colorful' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'colorful' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'colorful' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'colorful' );
	}
	$utility_text = str_replace('| 投稿日: ', '', $utility_text);

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve 1.0
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function twentytwelve_body_class( $classes ) {
	$background_color = get_background_color();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_color ) )
		$classes[] = 'custom-background-empty';
	elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
		$classes[] = 'custom-background-white';

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'twentytwelve_body_class' );

/**
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'twentytwelve_content_width' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since Twenty Twelve 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function twentytwelve_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentytwelve_customize_register' );


/* カスタムブロックの追加 */
add_filter( 'block_categories_all', 'colorful_block_categories' );
function colorful_block_categories($categories) {
	$slugs = array_column( $categories, 'slug' );

	if( !in_array( 'colorful-blocks', $slugs, true ) ) {
		$categories[] = array(
			'slug'  => 'colorful-blocks',
			'title' => 'Colorful Blocks',
		);
	}

	return $categories;
}

add_action( 'init', function() {
	register_block_type( __DIR__ . '/custom-blocks' );
});

/* カスタム投稿タイプの追加 */
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type('hover',
		array(
			'labels' => array(
				'name' => __('ホバーウィンドウ', 'colorful' ),
				'singular_name' => __('ホバーウィンドウ', 'colorful' )
			),
			'public' => true,
			'menu_position' => 5,
			'show_in_rest' => true,
    	)
	);
	register_post_type('hfcontent',
		array(
			'labels' => array(
				'name' => __('上級・全体HF', 'colorful' ),
				'singular_name' => __('上級・全体HF', 'colorful' )
			),
			'public' => true,
			'menu_position' => 5,
			'show_in_rest' => true,
    	)
	);
	register_post_type('block_pattern',
		array(
			'labels' => array(
				'name' => __('オリジナルデザイン', 'colorful' ),
				'singular_name' => __('オリジナルデザイン', 'colorful' )
			),
			'public' => true,
			'menu_position' => 9,
			'has_archive' => false,
			'show_in_menu' => false,
			'show_in_nav_menus' => false,
			'show_in_rest' => true,
			'supports' => array('title', 'editor', 'author', 'thumbnail'),
    	)
	);
}



if ( !class_exists('ACF') ) {
	// Define path and URL to the ACF plugin.
	define( 'MY_ACF_PATH', get_template_directory() . '/inc/advanced-custom-fields/' );
	define( 'MY_ACF_URL', get_template_directory_uri() . '/inc/advanced-custom-fields/' );

	// Include the ACF plugin.
	include_once( MY_ACF_PATH . 'acf.php' );

	// Customize the url setting to fix incorrect asset URLs.
	add_filter('acf/settings/url', 'my_acf_settings_url');
	function my_acf_settings_url( $url ) {
		return MY_ACF_URL;
	}

	// (Optional) Hide the ACF admin menu item.
	add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
	function my_acf_settings_show_admin( $show_admin ) {
		return false;
	}
}

require 'inc/block-patterns.php';
require 'inc/register-field.php';
require 'inc/inline-scripts-styles.php';


if(is_admin() && current_user_can('edit_posts') &&
current_user_can('edit_pages') && get_user_option('rich_editing') == 'true') {
	add_filter('mce_external_plugins', 'my_mce_external_plugins');
	add_filter('mce_buttons_3', 'my_mce_buttons');
}
function my_mce_buttons($buttons) {
	// 追加したい要素の名前を定義(separatorは区切り)
	array_push($buttons, "taglist", "taglist2", "fontlist");
	return $buttons;
}
function my_mce_external_plugins($plugin_array) {
	// プラグインファイルのurl
	$plugin_array['addquicktags'] = get_template_directory_uri().'/tinymce/editor_plugin.js';
	$plugin_array['jpfonts'] = get_template_directory_uri().'/tinymce/font.js';
	return $plugin_array;
}

add_filter('post_class', 'my_post_class');
function my_post_class($classes) {
	$key = array_search('hentry', $classes);
	unset($classes[$key]);
	return $classes;
}

// カウントダウン ショートコード
function inner_countdown($atts) {
	global $post;
	$html = '<div class="navbar navbar-inverse navbar-nofix">';
	$html .= '<div class="navbar-inner" >';
	$html .= '<div class="brand">';
	$html .= '<p>' . get_field('countdown_name', $post->ID) . '　<span class="CDT"></span></p>';
	$html .= '</div></div></div>';
	return $html;
}
add_shortcode('innerCountdown', 'inner_countdown');

// 最新記事一覧 ショートコード
function inner_posts($atts) {
	global $post;
	$theme_options = get_theme_options();
	
	ob_start();
	echo '<div class="clear">';

	$myposts = get_posts(array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => get_option('posts_per_page'),
	));
	foreach ( $myposts as $post ) : setup_postdata( $post );

	if($theme_options['blog_type'] == 'design2') {
		get_template_part( 'content', 'card' );
	} else {
		get_template_part( 'content' );
	}

	endforeach; wp_reset_postdata();

	echo '</div>';

	/*
	$page_for_posts = get_option('page_for_posts');
	if( $page_for_posts == 0 ) {
		$archives = wp_get_archives(array(
			'type' => 'monthly',
			'limit' => 1,
			'format ' => 'custom',
			'echo' => 0,
		));
		if( preg_match("|href='(.+?)'|", $archives, $matche) == 1 ) {
			printf('<p><a href="%s">→過去の記事を見る</p>', $matche[1]);
		} elseif( preg_match('|href="(.+?)"|', $archives, $matche) == 1 ) {
			printf('<p><a href="%s">→過去の記事を見る</p>', $matche[1]);
		}
	} else{
		printf('<p><a href="%s">→ブログページへ移動する</p>', get_permalink($page_for_posts));
	}
	*/

	return ob_get_clean();
}
add_shortcode('innerPosts', 'inner_posts');

require 'inc/theme-update-checker.php';
$example_update_checker = new ThemeUpdateChecker(
	'colorful-theme',
	'https://lptemp.com/system/update-info.json'
);

function font_admin_style() {
global $post;
$theme_options = get_theme_options();

if( (get_field('entire_enable', $post->ID) === 'on' || $theme_options['all_enable'] === 'on') ) { // 全体設定
 if($theme_options['webfonts'] === 'off') {
  $font_family = $theme_options['font_family'];
 } else {
  $font_family = $theme_options['font_family_web'];
  if(!$font_family) $font_family = 7;
 }
} else { // 個別設定
 if(get_field('webfonts', $post->ID) === 'off') {
  $font_family = get_field('font_family', $post->ID);
 } else {
  $font_family = get_field('font_family_web', $post->ID);
  if(!$font_family) $font_family = 7;
 }
}

switch( $font_family ) {
  case 1:
    $font = '"ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","メイリオ",Meiryo, Osaka,"ＭＳ Ｐゴシック","MS PGothic",sans-serif';
    break;
  case 2:
    $font = '"ヒラギノ明朝 Pro W3","ＭＳ Ｐ明朝",serif';
    break;
  case 3:
    $font = '"メイリオ",Meiryo,"ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","ＭＳ Ｐゴシック",sans-serif';
    break;
  case 4:
    $font = '"ヒラギノ丸ゴ Pro W4","ヒラギノ丸ゴ Pro","Hiragino Maru Gothic Pro","ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","HG丸ｺﾞｼｯｸM-PRO","HGMaruGothicMPRO"';
    break;
  case 5:
    $font = '"游ゴシック体","Yu Gothic",YuGothic,"ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","メイリオ",Meiryo,Arial,Sans-Serif';
    break;
  case 6:
    $font = '"游明朝",YuMincho,"Hiragino Mincho ProN","Hiragino Mincho Pro","ＭＳ 明朝",serif';
    break;
  case 7:
    $font = '"Noto Sans JP",sans-serif';
    break;
  case 8:
    $font = '"Noto Serif JP",serif';
    break;
  default:
    $font = '"Open Sans",Helvetica,Arial,sans-serif';
    break;
}

if( (get_field('entire_enable', $post->ID) === 'on' || $theme_options['all_enable'] === 'on') ) { // 全体設定
 // フォントサイズ
 if( $theme_options['fontsize'] ) {
  $fontsize = $theme_options['fontsize'];
 } else {
  $fontsize = 18;
 }
 // 行間
 if( $theme_options['lineheight'] ) {
  $lineheight = $theme_options['lineheight'];
 } else {
  $lineheight = 1.8;
 }
} else { // 個別設定
 // フォントサイズ
 if( get_field('fontsize', $post->ID) ) {
  $fontsize = get_field('fontsize', $post->ID);
 } else {
  $fontsize = 18;
 }
 // 行間
 if( get_field('lineheight', $post->ID) ) {
  $lineheight = get_field('lineheight', $post->ID);
 } else {
  $lineheight = 1.8;
 }
}

echo "<style>
html .mce-content-body { font-size: ".$fontsize."px; font-family: ".$font."; line-height: ".$lineheight."; }
</style>".PHP_EOL;
}
add_action('admin_print_styles-post.php', 'font_admin_style');

function font_admin_script() {
global $post;
$theme_options = get_theme_options();

if( (get_field('entire_enable', $post->ID) === 'on' || $theme_options['all_enable'] === 'on') ) { // 全体設定
 if($theme_options['webfonts'] === 'off') {
  $font_family = $theme_options['font_family'];
 } else {
  $font_family = $theme_options['font_family_web'];
  if(!$font_family) $font_family = 7;
 }
} else { // 個別設定
 if(get_field('webfonts', $post->ID) === 'off') {
  $font_family = get_field('font_family', $post->ID);
 } else {
  $font_family = get_field('font_family_web', $post->ID);
  if(!$font_family) $font_family = 7;
 }
}

switch( $font_family ) {
  case 1:
    $font = '"ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","メイリオ",Meiryo, Osaka,"ＭＳ Ｐゴシック","MS PGothic",sans-serif';
    break;
  case 2:
    $font = '"ヒラギノ明朝 Pro W3","ＭＳ Ｐ明朝",serif';
    break;
  case 3:
    $font = '"メイリオ",Meiryo,"ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","ＭＳ Ｐゴシック",sans-serif';
    break;
  case 4:
    $font = '"ヒラギノ丸ゴ Pro W4","ヒラギノ丸ゴ Pro","Hiragino Maru Gothic Pro","ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","HG丸ｺﾞｼｯｸM-PRO","HGMaruGothicMPRO"';
    break;
  case 5:
    $font = '"游ゴシック体","Yu Gothic",YuGothic,"ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","メイリオ",Meiryo,Arial,Sans-Serif';
    break;
  case 6:
    $font = '"游明朝",YuMincho,"Hiragino Mincho ProN","Hiragino Mincho Pro","ＭＳ 明朝",serif';
    break;
  case 7:
    $font = '"Noto Sans JP",sans-serif';
    break;
  case 8:
    $font = '"Noto Serif JP",serif';
    break;
  default:
    $font = '"Open Sans",Helvetica,Arial,sans-serif';
    break;
}

if( (get_field('entire_enable', $post->ID) === 'on' || $theme_options['all_enable'] === 'on') ) { // 全体設定
 // フォントサイズ
 if( $theme_options['fontsize'] ) {
  $fontsize = $theme_options['fontsize'];
 } else {
  $fontsize = 18;
 }
 // 行間
 if( $theme_options['lineheight'] ) {
  $lineheight = $theme_options['lineheight'];
 } else {
  $lineheight = 1.8;
 }
} else { // 個別設定
 // フォントサイズ
 if( get_field('fontsize', $post->ID) ) {
  $fontsize = get_field('fontsize', $post->ID);
 } else {
  $fontsize = 18;
 }
 // 行間
 if( get_field('lineheight', $post->ID) ) {
  $lineheight = get_field('lineheight', $post->ID);
 } else {
  $lineheight = 1.8;
 }
}

echo "<script>
(function($) {
	var checkInterval = setInterval( function() {
		if( typeof(tinyMCE) !== 'undefined' ) {
			if( tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden() ) {
				$('#content_ifr').contents().find('head').append('<link href=\'https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300,400,500,700,900&display=swap&subset=japanese\' rel=\'stylesheet\'>');
				$('#content_ifr').contents().find('head').append('<link href=\'https://fonts.googleapis.com/css?family=Noto+Serif+JP:200,300,400,500,600,700,900&display=swap&subset=japanese\' rel=\'stylesheet\'>');
				$('#content_ifr').contents().find('head').append('<style>html .mceContentBody { font-size: ".$fontsize."px; font-family: ".$font."; line-height: ".$lineheight."; }</style>');
				clearInterval(checkInterval);
			}
		}
	}, 500);
})(jQuery);
</script>".PHP_EOL;
}
add_action('admin_footer-post.php', 'font_admin_script');

// ブロックパターン モーダル
function colorful_blocks_admin_footer() {
?>
<div id="colorful_blocks_modal2" class="colorful_blocks_modal" style="display:none;">
    <div class="colorful_blocks_modal_gallery">
        <div class="colorful_blocks_modal_description">
          <div class="components-panel__body inner">
            <h1 class="blocks_title2"><button type="button" class="components-button components-description-toggle" onclick="ColorfulAccordion(this)"><?php _e( '【COLORFUL SECTIONSとは？】', 'colorful' ); ?><span class="dashicons dashicons-arrow-down-alt2"></span></button></h1>
            <div class="components-description">
              <?php _e( '<p>COLORFUL SECTIONSは、<br>
              複数のブロックであらかじめデザインされている<br>
              「セクション」単位のデザインテンプレートをご用意しています。<br>
              <br>
              はじめてLPを作成される方や、素早くLPを作りたい方にオススメです。<br>
              <br>
              ＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿</p>

              <h2>オススメの作り方</h2>
              <p>１:<br>
              「<a href="#blocks7">LPの上部</a>」→「<a href="#blocks8">LPの中部</a>」→「<a href="#blocks9">LPの下部</a>」の順番で、<br>
              お好きなセクションを設置していくと、効果的なLP構成に基づいた<br>
              LPページが出来上がります。</p>

              <p>２：<br>
              あとは、それぞれのセクションの文字や画像を置き換えるなど<br>
              ご自身のLPをつくっていきましょう！<br>
              ＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿<br>
              →<a href="https://lpcolorful.com/member/?page_id=70" target="_blank">該当するマニュアルはこちら</a>(要ログイン)</p>', 'colorful' ); ?>
            </div>
          </div>
        </div>

        <?php
        $args = array(
            'post_type' => array('block_pattern'),
            'post_status' => array('publish'),
            'posts_per_page' => -1,
            'order' => 'ASC',
        );
        $the_query = new WP_Query($args);
        if ( $the_query->have_posts() ) {
        ?>
        <h3 class="blocks_patterns"><?php _e( 'オリジナルデザイン', 'colorful' ); ?></h3>
        <?php
            $i = 0;
            echo '<script>ColorfulGallery[\'Patterns\'] = []</script>';
            while ( $the_query->have_posts() ) {
                $j = $i + 1;
                $the_query->the_post();
                $pattern_title = get_the_title();
                if( !$pattern_title ){
                    $pattern_title = __( 'タイトルなし', 'colorful' );
                }
                $pattern_content = get_the_content();
                if( has_post_thumbnail() ) {
                    $thumbnail_id = get_post_thumbnail_id();
                    $src_info = wp_get_attachment_image_src($thumbnail_id, $size = array(600,400));
                    $src = $src_info[0];
                    $class = '';
                } else {
                    $src = get_template_directory_uri() . '/images/noimage.png';
                    $class = 'colorful_noimage';
                }
                if( $pattern_content ){
                    $pattern_content = str_replace( array("\r", "\n"), '', $pattern_content );
                    echo '<script>ColorfulGallery[\'Patterns\']['.$i.'] = \''.addslashes($pattern_content).'\';</script>';
                    echo '<a onclick="ColorfulGalleryButton(ColorfulGallery[\'Patterns\']['.$i.'], this)" class="colorful_blocks_img '.$class.'"><img src="'.$src.'" alt=""><span>'.$j.': '.$pattern_title.'</span></a>';
                    $i++;
                }
            }
            wp_reset_postdata();
        }
        ?>

        <h2 id="blocks7"><?php _e( 'LPの上部', 'colorful' ); ?></h2>
        <h3 class="blocks_worries"><?php _e( 'こんなお悩みありませんか？', 'colorful' ); ?></h3>
        <script>ColorfulGalleryList('worries-selections');</script>
        <h3 class="blocks_features"><?php _e( '3つの特徴', 'colorful' ); ?></h3>
        <script>ColorfulGalleryList('features-selections');</script>

        <h2 id="blocks8"><?php _e( 'LPの中部', 'colorful' ); ?></h2>
        <h3 class="blocks_service"><?php _e( 'サービス詳細', 'colorful' ); ?></h3>
        <script>ColorfulGalleryList('service-selections');</script>
        <h3 class="blocks_voice"><?php _e( 'お客様の声・実績者の声', 'colorful' ); ?></h3>
        <script>ColorfulGalleryList('voice-selections');</script>
        <h3 class="blocks_profile"><?php _e( 'プロフィール', 'colorful' ); ?></h3>
        <script>ColorfulGalleryList('profile-selections');</script>
        <h3 class="blocks_recommend"><?php _e( 'こんな方にオススメです', 'colorful' ); ?></h3>
        <script>ColorfulGalleryList('recommend-selections');</script>
        <h3 class="blocks_table"><?php _e( '表デザイン', 'colorful' ); ?></h3>
        <script>ColorfulGalleryList('table-selections');</script>
        <h3 class="blocks_step"><?php _e( '申し込みのステップ', 'colorful' ); ?></h3>
        <script>ColorfulGalleryList('step-selections');</script>
        <h3 class="blocks_benefit"><?php _e( 'こんなベネフィットがあります', 'colorful' ); ?></h3>
        <script>ColorfulGalleryList('benefit-selections');</script>

        <h2 id="blocks9"><?php _e( 'LPの下部', 'colorful' ); ?></h2>
        <h3 class="blocks_benefits"><?php _e( '特典', 'colorful' ); ?></h3>
        <script>ColorfulGalleryList('benefits-selections');</script>
        <h3 class="blocks_appli"><?php _e( '申し込みはこちら', 'colorful' ); ?></h3>
        <script>ColorfulGalleryList('appli-selections');</script>
        <h3 class="blocks_formboxBg"><?php _e( '登録はこちら', 'colorful' ); ?></h3>
        <script>ColorfulGalleryList('formboxBg-selections');</script>
        <h3 class="blocks_buy"><?php _e( '購入はこちら', 'colorful' ); ?></h3>
        <script>ColorfulGalleryList('buy-selections');</script>
        <h3 class="blocks_qa"><?php _e( 'よくあるご質問', 'colorful' ); ?></h3>
        <script>ColorfulGalleryList('qa-selections');</script>

        <h2 id="blocks10"><?php _e( 'ヘッド', 'colorful' ); ?></h2>
        <h3 class="blocks_head"><?php _e( 'ヘッド', 'colorful' ); ?></h3>
        <script>ColorfulGalleryList('head-selections');</script>
    </div>
</div>
<div id="colorful_blocks_modal" class="colorful_blocks_modal" style="display:none;">
    <div class="colorful_blocks_modal_gallery">
        <div class="colorful_blocks_modal_description">
          <div class="components-panel__body inner">
          </div>
        </div>

        <h3 class="blocks_templates"><?php _e( 'カラフルテンプレーツ', 'colorful' ); ?></h3>
    </div>
</div>
<div id="colorful_blocks_jump2" class="colorful_blocks_jump" style="display:none;">
    <select onchange="ColorfulGalleryJump(this)">
        <option value="blocks_title2"><?php _e( 'COLORFUL SECTIONSとは？', 'colorful' ); ?></option>
        <?php if ( $the_query->have_posts() ): ?>
        <option value="blocks_patterns"><?php _e( 'オリジナルデザイン', 'colorful' ); ?></option>
        <?php endif; ?>
        <optgroup label="<?php _e( 'LPの上部', 'colorful' ); ?>">
            <option value="blocks_worries"><?php _e( 'こんなお悩みありませんか？', 'colorful' ); ?></option>
            <option value="blocks_features"><?php _e( '3つの特徴', 'colorful' ); ?></option>
        </optgroup>
        <optgroup label="<?php _e( 'LPの中部', 'colorful' ); ?>">
            <option value="blocks_service"><?php _e( 'サービス詳細', 'colorful' ); ?></option>
            <option value="blocks_voice"><?php _e( 'お客様の声・実績者の声', 'colorful' ); ?></option>
            <option value="blocks_profile"><?php _e( 'プロフィール', 'colorful' ); ?></option>
            <option value="blocks_recommend"><?php _e( 'こんな方にオススメです', 'colorful' ); ?></option>
            <option value="blocks_table"><?php _e( '表デザイン', 'colorful' ); ?></option>
            <option value="blocks_step"><?php _e( '申し込みのステップ', 'colorful' ); ?></option>
            <option value="blocks_benefit"><?php _e( 'こんなベネフィットがあります', 'colorful' ); ?></option>
        </optgroup>
        <optgroup label="<?php _e( 'LPの下部', 'colorful' ); ?>">
            <option value="blocks_benefits"><?php _e( '特典', 'colorful' ); ?></option>
            <option value="blocks_appli"><?php _e( '申し込みはこちら', 'colorful' ); ?></option>
            <option value="blocks_formboxBg"><?php _e( '登録はこちら', 'colorful' ); ?></option>
            <option value="blocks_buy"><?php _e( '購入はこちら', 'colorful' ); ?></option>
            <option value="blocks_qa"><?php _e( 'よくあるご質問', 'colorful' ); ?></option>
        </optgroup>
        <optgroup label="<?php _e( 'ヘッド', 'colorful' ); ?>">
            <option value="blocks_head"><?php _e( 'ヘッド', 'colorful' ); ?></option>
        </optgroup>
    </select>
</div>
<div id="colorful_blocks_jump" class="colorful_blocks_jump" style="display:none;">
    <select onchange="ColorfulGalleryJump(this)">
        <option value="blocks_templates"><?php _e( 'カラフルテンプレーツ', 'colorful' ); ?></option>
    </select>
</div>
<div id="colorful_blocks_buttons" class="colorful_blocks_buttons" style="display:none;">
    <a id="colorful_blocks_copy" class="colorful_blocks_copy colorful_blocks_btn none"><?php _e( 'コピー', 'colorful' ); ?></a><script>ColorfulGalleryCopy();</script>
    <a id="colorful_blocks_insert" onclick="ColorfulGalleryInsert()" class="colorful_blocks_btn none"><?php _e( '挿入', 'colorful' ); ?><span id="colorful_blocks_count"></span></a>
    <a id="colorful_blocks_multiple" onclick="ColorfulGalleryMultiple()" class="colorful_blocks_btn"><?php _e( '選択', 'colorful' ); ?></a>
    <a id="colorful_blocks_cancel" onclick="ColorfulGalleryCancel()" class="colorful_blocks_btn none"><?php _e( 'キャンセル', 'colorful' ); ?></a>
    <a id="colorful_blocks_close" onclick="ColorfulGalleryClose()" class="colorful_blocks_btn"><?php _e( '閉じる', 'colorful' ); ?></a>
</div>
<?php
}
add_action('admin_footer', 'colorful_blocks_admin_footer');
