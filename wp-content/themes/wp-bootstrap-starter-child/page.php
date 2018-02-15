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
		<link href="https://fonts.googleapis.com/css?family=Comfortaa|Work+Sans|Bungee" rel="stylesheet"> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css"/>
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
			<div class="child-container">
				<div class="about-title"><h1>About<h1></div>
				<div class="project-element rounded">
					<span class="oi oi-media-record"></span>
					<h2>Hobbies</h2>
					<p>Guitar, Bass Guitar, Piano, Cooking, Learning Languages, Reading</p>
				</div>
				<div class="project-element rounded">
					<span class="oi oi-media-record"></span>
					<h2>Skills</h2>
					<p>C/C++/C#, Java, SQL, Perl, Prolog / LISP, JavaScript, Assembler, XML,
					</p>
				</div>
				<div class="project-element rounded">
					<span class="oi oi-media-record"></span>
					<h2>Education</h2>
					<p>East Stroudsburg University - 2013-2018</p>
				</div>
				<div class="project-element rounded">
					<span class="oi oi-media-record"></span>
					<h2>Resume</h2>
				</div>
			</div><!--about-container-->
			<div class="child-container">
				<div class="container-title"><h1>Projects</h1></div>
				<?php
					$args = array(
						'post_type' => 'post',
					);
					$query = new WP_Query($args);

					if($query->have_posts() ){
						while($query->have_posts()){
							$query->the_post();
							echo "<div class='project-element card'>";
								echo "<div class='card-body'>";
								echo "<div class='card-title'>"; the_title(); echo "</div>";
								if(has_post_thumbnail())
								{
									$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
									echo "<img class='card-img-top' src='" . $featured_img_url . "'</div>";
								}
								echo "<p class='card-text'>"; the_content();  echo "</p>";
								echo "</div>";//<----end card-body ---->
							echo "</div>"; //<----end card ---->
						}
						wp_reset_postdata();
					}
				?>
			</div><!--projects-container-->
			<div class="child-container">
				<div class="form-container">
					<div class="container-title"><h1>Contact</h1></div>
					<form>
					  <div class="form-group">
					    <label for="exampleFormControlInput1">Your Name</label>
					    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="John Smith">
					  </div>
					  	<div class="form-group">
					    <label for="exampleFormControlInput1">Your Email</label>
					    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
					  </div>
					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Message</label>
					    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
					  </div>
					  <div class="button-holder">
						  <button type="button" class="btn btn-primary btn-sm">Clear</button>
						  <button type="button" class="btn btn-primary btn-sm">Send</button>
					  </div>
					</form>
				</div><!--form container-->
			</div><!--contact-container-->
		</body>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer(); ?>
