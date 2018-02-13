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

?>
	<?php wp_head();?>

	<div class="bootstrap-child site-content">
		<div class="bootstrap-child container">
			<div class="bootstrap-child work row">

	<section id="primary" class="bootstrap-child content-area col-sm-12 col-lg-8">
		<main id="main" class="site-main" role="main">
			<div class="profile-container">
				<h1>Jonathan Morales. Coder. Musician. Life-Long Learner</h1>
				<figure>
					<div class="profile-pic-frame">
						<img class="image-responsive profile-pic" src="<?php echo get_stylesheet_directory_uri();?>/assets/profile-pic.jpg"/>
					</div>
				</figure>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->
	<div class="project-container">
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
			foreach ($postsArray as $post)
			 {
					echo '<div class="project-element"><h2>' . apply_filters('the_title', $post->post_title) . '</h2>';
					echo apply_filters('the_content', $post->post_content) ."</div>";
			}
			unset($val);

		?>

	</div>

				</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->

<?php
get_sidebar();
get_footer(); ?>
