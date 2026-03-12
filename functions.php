<?php
/**
 * Engineering Theme functions and definitions.
 *
 * @package engineering-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// -------------------------------------------------------
// Theme Setup
// -------------------------------------------------------
function et_setup(): void {
	load_theme_textdomain( 'engineering-theme', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'html5',
		[ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ]
	);
	add_theme_support(
		'custom-logo',
		[
			'height'      => 80,
			'width'       => 80,
			'flex-height' => true,
			'flex-width'  => true,
		]
	);

	register_nav_menus(
		[
			'primary' => __( 'القائمة الرئيسية', 'engineering-theme' ),
			'footer'  => __( 'قائمة التذييل', 'engineering-theme' ),
		]
	);
}
add_action( 'after_setup_theme', 'et_setup' );

// -------------------------------------------------------
// Enqueue Assets
// -------------------------------------------------------
function et_assets(): void {
	wp_enqueue_style(
		'engineering-theme-style',
		get_stylesheet_uri(),
		[],
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'et_assets' );

// -------------------------------------------------------
// Body Classes
// -------------------------------------------------------
function et_body_classes( array $classes ): array {
	$classes[] = 'rtl';
	$classes[] = 'font-cairo';
	return $classes;
}
add_filter( 'body_class', 'et_body_classes' );
