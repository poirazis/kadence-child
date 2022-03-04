<?php
/**
 * Enqueue child styles.
 */

include_once( get_stylesheet_directory() . '/templates/template-tags.php' );
include_once( get_stylesheet_directory() . '/helpers/helpers.php' );

function child_enqueue_styles() {
	wp_enqueue_style( 'child-theme', get_stylesheet_directory_uri() . '/style.css', array(), 100 );
}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles' ); // Remove the // from the beginning of this line if you want the child theme style.css file to load on the front end of your site.

function organic_origin_gutenberg_styles() {
	wp_enqueue_style( 'child-theme', get_theme_file_uri( '/editor-style.css' ), false, '1.0', 'all' );
}

add_action( 'enqueue_block_editor_assets', 'organic_origin_gutenberg_styles' );
/**
 * Add custom functions here
 */
