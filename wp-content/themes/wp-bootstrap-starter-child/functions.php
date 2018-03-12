<?php
wp_deregister_script('jquery');
wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, '3.3.1');
wp_enqueue_script('jquery');

add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

function enqueue_custom_styles()
{
	wp_register_style('8-puzzle-styles', '/wp-content/themes/wp-bootstrap-starter-child/test-styles.css');
	wp_register_style('iconic-lib', 'https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css');


	wp_enqueue_style('iconic-lib', 'https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css');

	if(is_page($page = '8-puzzle-app')||is_page($page = 'thanks')|| is_404() )
	{
		wp_enqueue_style('8-puzzle-styles', '/wp-content/themes/wp-bootstrap-starter-child/test-styles.css');
	}
}

function enqueue_custom_fonts()
{
	wp_register_style('custom_fonts_styles', 'https://fonts.googleapis.com/css?family=Comfortaa|Work+Sans|Bungee');
	wp_enqueue_style('custom_font_styles', 'https://fonts.googleapis.com/css?family=Comfortaa|Work+Sans|Bungee');
}

add_action('wp_enqueue_scripts', 'enqueue_custom_styles');
add_action('wp_enqueue_scripts', 'enqueue_custom_fonts');
?>