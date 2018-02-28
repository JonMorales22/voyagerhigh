<?php
wp_deregister_script('jquery');
wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, '3.3.1');
wp_enqueue_script('jquery');

add_action('wp_enqueue_scripts', 'enqueue_test');

function enqueue_test()
{
	wp_register_style('8-puzzle-styles', '/wp-content/themes/wp-bootstrap-starter-child/test-styles.css');

	if(is_page($page = '8-puzzle-app'))
	{
		wp_enqueue_style('8-puzzle-styles', '/wp-content/themes/wp-bootstrap-starter-child/test-styles.css');
	}
}

add_action('wp_enqueu_scripts', 'enqueue_test');
?>