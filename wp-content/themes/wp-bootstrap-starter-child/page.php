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

/*
TO DO:
	-get the media queries to work the RIGHT way, the way I am doing it now is just waaay too sloppy
	-fix the block-card body at screen width. It acts dumb at 500px (i think)
	-make it so the card section under About collapses to 1 column (acts dumb at 788px)
	-position absolute positions element to nearest ANCESTOR -> might be able to use this for the profile-pic (figure)
	-fix the contact form section
	-get scroll button to work/ other javascript bells+whistles
*/

?>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Comfortaa|Work+Sans|Bungee" rel="stylesheet"> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css"/>
		<?php
			wp_head();
		?>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<main id="main" class="site-main" role="main">
		<body>
			<div class="scroll-menu">
				<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <span class="oi oi-menu"></span>
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				  	<a class="dropdown-item" href="#home">Home</a>
				    <a class="dropdown-item" href="#about">About</a>
				    <a class="dropdown-item" href="#projects">Projects</a>
				    <a class="dropdown-item" href="#contact">Contact</a>
				  </div>
				</div>
			</div>
			<div id="home" class="content-container">
				<div class="row"> 
					<div class ="title">Jon Morales</div>
					<div class ="tagline">Coder. Musician. Lover of Learning.</div>
				</div>
				<div class="row">
					<figure id="scroll-one">
						<div class ="profile-pic-frame">
							<img src=" <?php echo get_stylesheet_directory_uri(); ?>/assets/profile-pic-edit.jpg"/>
						</div>
					</figure>
				</div>
			</div><!--content-container-->
				<div class="big-container">
				<div id="about" class="child-container">
					<div class="about-title"><h1>About</h1></div>
					<div class="child-element">
						
						<div class="child-content">
							<p class="lead">My name is Jonathan Morales and I am a computer science major.</p>
							<p class="lead">Currently I'm seeking an internship in the field, specifically in software development.</p>
							<p class="lead">My skills, experience, and background can be viewed below.</p>
						</div>
						
					</div>
					<div class="card-holder">
						<div class="card about">
						  <div class="card-body about">
						    <h5 class="card-title">Skills</h5>
						    <div class="card-text about">
						    	<p>Programming Languages</p>
						    		<ul>
						    			<li>C/C++/C#</li>
						    			<li>Java</li>
						    			<li>Javascript
						    			<li>HTML/CSS</li>
						    			<li>Git</li>
						    		</ul>
						    	<p>Software/Operating Systems</p>
						    		<ul>
										<li>Wordpress</li>
										<li>Bootstrap</li>
										<li>Xcode/Visual Studio</li>
									</ul>
						    </div>
						  </div>
						</div>
						<div class="card about">
						  <div class="card-body about">
						    <h5 class="card-title">Education</h5>
						    <div class="card-text about">
						    	<p>East Stroudsburg University</p>
						    	<ul>
						    		<li>Graduation: May 2018</li>
						    		<li>B.S. in Computer Science</li>
						    		<li>Minor in Mathematics</li>
						    	</ul>
						    	<p>Coursework</p>
						    	<ul>
						    		<li>Software Engineering</li>
						    		<li>Data Structures</li>
						    		<li>Operating Systems</li>
						    		<li>Artificial Intelligence</li>
						    		<li>Graph Theory</li>
						    	</ul>
						    </div>
						  </div>
						</div>
						<div class="card about">
						  <div class="card-body about">
						    <h5 class="card-title">Hobbies</h5>
						     <div class="card-text about">
						     	<p>Music</p>
						     		<ul>
						     			<li>Guitar</li>
						     			<li>Piano</li>
						     			<li>Bass Guitar</li>
						     			<li>Singing</li>
						     			<li>Bongos</li>
						     		</ul>
						     	<p>Other</p>
						     		<ul>
						     			<li>Reading</li>
						     			<li>Cooking</li>
						     			<li>Learning Chinese</li>
						     		</ul>
							</div>
						  </div>
						</div>
					</div><!--card-holder-->
					<div class="child-element">
						<a href="assets/JonMorales_Resume.pdf" class="btn btn-primary" download>Download full resume</a>
						<!--<form>
							<input class="btn btn-primary"  value="Download full resume here" onclick="window.location.href='localhost/VoyagerHigh/public_html/wp-content/themes/wp-bootstrap-starter-child/assets/JonMorales_Resume.pdf'">
						</form>-->
						<!-- <img class="icon" src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/svg/data-transfer-download.svg"-->
					</div>
				</div><!--child-container-->
				<div id="projects" class="child-container">
					<div class="container-title projects"><h1>Projects</h1></div>
					<?php
						$args = array(
							'post_type' => 'post',
						);
						$query = new WP_Query($args);

						if($query->have_posts() ){
							while($query->have_posts()){
								$query->the_post();
								echo "<div class='card block'>";
									echo "<div class='card-title'><h4>"; the_title(); echo "</h4></div>";
									echo "<div class='block-content'>";
									if(has_post_thumbnail())
									{
										$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
										echo "<img src='" . $featured_img_url . "'>";
									}
									echo "<div class='card-text'>"; 
									echo get_the_content();
									echo "</div>";
									echo "</div>";//<----end card-body ---->
								echo "</div>"; //<----end card-block ---->
							}
							wp_reset_postdata();
						}
					?>
				</div><!--projects-container-->
				<div id="contact" class="child-container contact">
					<div class="container-title"><h1>Contact</h1></div>
					<div class="wrapper">
						<div class="child-element contact">
							<div class="contact-info">
									<p><span class="oi oi-phone"></span>570-977-2847</p>
									<p><span class="oi oi-envelope-closed"></span><a href="mailto:jonmorales2.718@gmail.com">JonMorales2.718@gmail.com</a></p>
							</div>
						</div><!--child-element contact-->
						<div class="form-container">
							<form id="target">
							<h2>Send a message:</h2>
							  <div class="form-group">
							    <label for="exampleFormControlInput1"></label>
							    <input class="form-control" id="exampleFormControlInput1" placeholder="Your name" novalidate>
							  </div>
							  	<div class="form-group">
							    <label for="exampleFormControlInput1"></label>
							    <input class="form-control" id="exampleFormControlInput1" placeholder="Your email">
							  </div>
							  <div class="form-group">
							    <label for="exampleFormControlTextarea1"></label>
							    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Your message" rows="10"></textarea>
							  </div>
							  <div class="button-holder">
							  		<button type="submit" class="btn btn-primary btn-sm">Send</button>
								  	<button type="reset" class="btn btn-primary btn-sm">Clear</button>
							  </div>
							</form>
						</div><!--form container-->
					</div><!--wrapper-->
				</div><!--contact-container-->
			</div><!--CONATINER-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/scripts.js"></script>
		</body>
	</main><!-- #main -->

<?php
get_footer(); ?>
