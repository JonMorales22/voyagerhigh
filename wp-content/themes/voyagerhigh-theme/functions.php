<?php
/**
 * WP Bootstrap Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Voyagerhigh_theme
 */


//register bootstrap scripts and stlyes
function register_bootstrap_scripts()
{
	wp_deregister_script('jquery');
	wp_register_script('jquery','https://code.jquery.com/jquery-3.2.1.slim.min.js',false,'3.3.1', true);

	wp_register_script('ajax','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', false, '1.12.9', true);


	$depend = array('jquery','ajax');

	wp_register_script('bootstrap_core','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', $depend, '4.0.0', true);

	wp_enqueue_script('jquery');
	wp_enqueue_script('ajax');
	wp_enqueue_script('bootstrap_core');

}

function register_bootstrap_styles()
{
	wp_register_style('bootstrap_css','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');

	wp_register_style('iconic_lib', 'https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css');

	wp_enqueue_style('bootstrap_css');
	wp_enqueue_style('iconic_lib');
}

//fonts!!!
function register_google_fonts() {
	wp_register_style('google_fonts_styles', 'https://fonts.googleapis.com/css?family=Comfortaa|Work+Sans|Bungee');
	wp_enqueue_style('google_fonts_styles');
}

function register_voyager_high_styles()
{
	wp_register_style('voyager_high_style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('voyager_high_style');

}


//register 8-puzzle-app stuff
function register_8_puzzle_scripts()
{

}

function register_8_puzzle_styles()
{
	wp_register_style('8_puzzle_styles', '/wp-content/themes/wp-bootstrap-starter-child/test-styles.css');

	wp_enqueue_style('8_puzzle_styles');
}




add_action('wp_enqueue_scripts', 'register_bootstrap_scripts');
add_action('wp_enqueue_scripts', 'register_bootstrap_styles');
add_action('wp_enqueue_scripts', 'register_google_fonts');
add_action('wp_enqueue_scripts', 'register_voyager_high_styles');



?>