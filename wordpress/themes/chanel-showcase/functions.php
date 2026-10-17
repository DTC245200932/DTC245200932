<?php

defined( 'ABSPATH' ) || exit;

function chanel_showcase_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'chanel_showcase_setup' );

function chanel_showcase_enqueue_styles() {
	$style_path = get_stylesheet_directory() . '/style.css';
	$version    = file_exists( $style_path ) ? (string) filemtime( $style_path ) : wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'chanel-showcase-style', get_stylesheet_uri(), array(), $version );
}
add_action( 'wp_enqueue_scripts', 'chanel_showcase_enqueue_styles' );
