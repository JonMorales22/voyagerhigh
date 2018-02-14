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
	<head>
		<link href="https://fonts.googleapis.com/css?family=Comfortaa|Work+Sans|Sarina" rel="stylesheet"> 
		<?php
			wp_head();
		?>
	</head>

	<main id="main" class="site-main" role="main">
		<div class="background"></div>
		<body>
			<div class="content-container">
				<div class="row"> 
					<div class ="title">Jon Morales</div>
					<div class ="tagline">Coder. Musician. Lover of Learning.</div>
				</div>
				
				<div class="row"> 
					<figure>
						<div class ="profile-pic-frame">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/profile-pic-edit.jpg"/>
						</div>
					</figure>
				</div>
			</div><!--content-container-->
			<div class="about-container">
				<div class="about-title"><h1>About Me</h1></div>
				<div class="about-text">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt sed diam quis congue. In id tellus quis purus aliquet pulvinar id non leo. Phasellus sit amet urna vestibulum, tincidunt diam sed, commodo lorem. Suspendisse sit amet libero et mi tempor aliquet. Pellentesque vel scelerisque lacus, quis euismod elit. Sed tempor dui urna, ut pulvinar ante lobortis quis. Sed nec ligula quis tellus ultricies consequat quis at elit. Vestibulum malesuada ornare massa, eu auctor nisl lacinia vitae. Nunc commodo in sapien vitae condimentum. Fusce ac purus at urna porttitor rhoncus eu non neque. Maecenas ultrices dolor tincidunt tellus pharetra, in consequat felis ornare. Suspendisse a posuere nibh. 
				</div>
			</div><!--about-container-->
			<div class="project-container">
				<div class="about-title"><h1>Projects</h1></div>
				<?php
					$args = array(
						'post_type' => 'post',
					);
					$query = new WP_Query($args);

					if($query->have_posts() ){
						while($query->have_posts()){
							$query->the_post();
							echo "<div class='project-element'>";
							echo "<div class='project-title'>"; the_title(); echo "</div>";
							if(has_post_thumbnail())
							{
								echo "<div class='project-pic'>"; the_post_thumbnail(); echo "</div>";
							}
							echo "<div class='project-text'>"; the_content();  echo "</div>";
							echo "</div>";
						}
						wp_reset_postdata();
					}


				?>
			</div><!--projects-container-->
			<div class="contact-container">
				<div class="about-title"><h1>Contact</h1></div>
				<div class="about-text">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt sed diam quis congue. In id tellus quis purus aliquet pulvinar id non leo. Phasellus sit amet urna vestibulum, tincidunt diam sed, commodo lorem. Suspendisse sit amet libero et mi tempor aliquet. Pellentesque vel scelerisque lacus, quis euismod elit. Sed tempor dui urna, ut pulvinar ante lobortis quis. Sed nec ligula quis tellus ultricies consequat quis at elit. Vestibulum malesuada ornare massa, eu auctor nisl lacinia vitae. Nunc commodo in sapien vitae condimentum. Fusce ac purus at urna porttitor rhoncus eu non neque. Maecenas ultrices dolor tincidunt tellus pharetra, in consequat felis ornare. Suspendisse a posuere nibh. 
				</div>
			</div><!--contact-container-->
		</body>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer(); ?>
