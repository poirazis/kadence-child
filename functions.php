<?php
/**
 * Proto Campaing Child Theme
 * @version 1.0.0
 */

include_once( get_stylesheet_directory() . '/templates/template-tags.php' );
include_once( get_stylesheet_directory() . '/helpers/helpers.php' );

/**
 * Enqueue Styles
 */

 function proto_child_enqueue_styles() {
	wp_enqueue_style( 'child-theme', get_stylesheet_directory_uri() . '/style.css', array(), 100 );
}

add_action( 'wp_enqueue_scripts', 'proto_child_enqueue_styles' );

function proto_child_enqueue_gutenberg_styles() {
	wp_enqueue_style( 'child-theme', get_theme_file_uri( '/editor-style.css' ), false, '1.0', 'all' );
}

add_action( 'enqueue_block_editor_assets', 'proto_child_enqueue_gutenberg_styles' );
