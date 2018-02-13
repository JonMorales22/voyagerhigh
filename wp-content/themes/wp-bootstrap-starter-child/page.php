<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<div id="content" class="site-content">
		<div class="container">
			<div class="bootstrap-child work row" style="display:inline">

	<section id="primary" class="bootstrap-child content-area col-sm-12 col-lg-8">
		<main id="main" class="site-main" role="main">
			<div class="profile-container">
				<img class="image-responsive profile-pic" src="<?php echo get_stylesheet_directory_uri();?>/assets/profile-pic.jpg"/>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->
	<div class="projects-container">
		<?php
		$postArgs = array(
			'posts_per_page'   => 5,
			'offset'           => 0,
			'category'         => '',
			'category_name'    => '',
			'orderby'          => 'date',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'post',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'author'	   => '',
			'author_name'	   => '',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);
			$postsArray = get_posts($postArgs);
			while($postsArray)
			echo apply_filters('the_content', $postsArray[0]->post_content);
		?>

	</div>

<?php
get_sidebar();
get_footer();
