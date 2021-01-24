<?php
/**
 * Enqueue scripts and styles.
 */
function it_news_scripts() {
	wp_enqueue_style( 'it_news_style', get_template_directory_uri().'/assets/css/style.css', array() );
	// wp_enqueue_style( 'it_news_dark_mode', get_template_directory_uri().'/assets/css/style.css', array() );
	wp_enqueue_script( 'it_news_dark_mode', get_template_directory_uri().'/assets/js/dark-mode.js', array( 'jquery' ) );


	
}
include 'admin/event-management.php';

add_action( 'wp_enqueue_scripts', 'it_news_scripts' );

function it_news_time_ago_function() {

return sprintf( esc_html__( '%s ago', 'textdomain' ), human_time_diff(get_the_time ( 'U' ), current_time( 'timestamp' ) ) );
}
add_filter( 'the_time', 'it_news_time_ago_function' );


// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// Add default posts and comments RSS feed links to head.
add_theme_support( 'it-news-feed-links' );

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

add_filter( 'body_class', function( $classes ) {
	if( is_user_logged_in() ) {
		$classes[]='loggedin';
	}
    return $classes;
} );

if ( ! function_exists( 'tech_it_comment_form' ) ) :
	/**
	 * Documentation for function.
	 */
	function tech_it_comment_form( $order ) {
		if ( true === $order || strtolower( $order ) === strtolower( get_option( 'comment_order', 'asc' ) ) ) {

			comment_form(
				array(
					'logged_in_as' => null,
					'title_reply'  => null,
				)
			);
		}
	}
endif;