<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function soma_hotel_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on SOMA HOTEL, use a find and replace
		* to change 'soma_hotel' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'soma_hotel', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'soma_hotel' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'soma_hotel_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'soma_hotel_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function soma_hotel_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'soma_hotel_content_width', 640 );
}
add_action( 'after_setup_theme', 'soma_hotel_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function soma_hotel_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'soma_hotel' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'soma_hotel' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'soma_hotel_widgets_init' );


function mytheme_assets() {
    $theme   = wp_get_theme();
    $dir_uri = get_theme_file_uri( 'build/' );
    $dir_abs = get_theme_file_path( 'build/' );

    // JS
    if ( file_exists( $dir_abs . 'index.js' ) ) {
        $asset = include $dir_abs . 'index.asset.php';
        wp_enqueue_script(
            'mytheme-js',
            $dir_uri . 'index.js',
            $asset['dependencies'] ?? [],
            $asset['version']      ?? $theme->get( 'Version' ),
            true
        );
    }

    // CSS
    if ( file_exists( $dir_abs . 'index.css' ) ) {
        wp_enqueue_style(
            'mytheme-css',
            $dir_uri . 'index.css',
            [],
            filemtime( $dir_abs . 'index.css' )
        );
    }
}
add_action( 'wp_enqueue_scripts', 'mytheme_assets' );
