<!DOCTYPE html>
<?php

?>
	<head>
		<?php
			wp_head();
		?>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<main id="main" class="site-main" role="main">
		<body class="front-page">
			<div class="scroll-menu">
				<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <span class="oi oi-menu"></span>
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				  	<a class="scroll dropdown-item" href="#home">Home</a>
				    <a class="scroll dropdown-item" href="#about">About</a>
				    <a class="scroll dropdown-item" href="#projects">Projects</a>
				    <a class="scroll dropdown-item" href="#contact">Contact</a>
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
							<img class='profile-pic' src=" <?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2018/03/profile-pic-temp-4.jpg"/>
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
						    		<ul class="about">
						    			<li>C/C++/C#</li>
						    			<li>Java</li>
						    			<li>Javascript
						    			<li>HTML/CSS</li>
						    			<li>Git</li>
						    		</ul>
						    	<p>Software/Operating Systems</p>
						    		<ul class="about">
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
						    	<ul class="about">
						    		<li>Graduation: May 2018</li>
						    		<li>B.S. in Computer Science</li>
						    		<li>Minor in Mathematics</li>
						    	</ul>
						    	<p>Coursework</p>
						    	<ul class="about">
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
						     		<ul class="about">
						     			<li>Guitar</li>
						     			<li>Piano</li>
						     			<li>Bass Guitar</li>
						     			<li>Singing</li>
						     			<li>Bongos</li>
						     		</ul>
						     	<p>Other</p>
						     		<ul class="about">
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
									echo "<div class='card-text block'>"; 
									echo get_the_content();
									echo "</div>";
									echo "</div>";//<----end card-body ---->
								echo "</div>"; //<----end card-block ---->
							}
							wp_reset_postdata();
						}
					?>
				</div><!--projects-container-->
				<div class="child-container contact">
					<div class="container-title"><h1 id="contact">Contact</h1></div>
					<div class="wrapper">
						<div class="child-element contact">
							<div class="contact-info">
									<p><span class="oi oi-phone"></span>570-977-2847</p>
									<a class="front-page" href="mailto:jonmorales2.718@gmail.com">
										<p>
											<span class="oi oi-envelope-closed"></span>
											JonMorales2.718@gmail.com
										</p>
									</a>
							</div>
						</div><!--child-element contact-->
						<div class="form-container">
							<form id="target" action="https://formspree.io/jonmorales2.718@gmail.com" method="POST">
							<h2>Send a message:</h2>
							  <div class="form-group">
							    <label for="name"></label>
							    <input class="form-control" id="exampleFormControlInput1" name="name" type="text" placeholder="Your name" required>
							  </div>
							  <div class="form-group">
							    <label for="email"></label>
							    <input class="form-control" id="exampleFormControlInput1" name="_replyto" type="email" placeholder="email@email" required>
							  </div>
							  <div class="message">
							    <label for="exampleFormControlTextarea1"></label>
							    <textarea class="form-control" id="exampleFormControlTextarea1" name="send" type="text" placeholder="Your message" rows="10" required></textarea>
							  </div>
							  <div class="button-holder">
							  		<a tabindex="0" id="btn-popper" class="btn btn-primary btn-sm">Send</a>
								  	<button type="reset" class="btn btn-primary btn-sm">Clear</button>
							  </div>
							  <input type="hidden" name="_next" value="<?php echo get_stylesheet_directory_uri(); ?>/thanks"/>
							</form>
								<!--data-container="body" data-toggle="popover" data-trigger="focus" data-placement="left"-->
						</div><!--form container-->
						<div id="scrollTop" class="back-to-top">
							<a class="front-page scroll" href="#home">
								<p>
									<span class="oi oi-chevron-top"></span>
									Back to Top
								</p>
							</a>
						</div>
					</div><!--wrapper-->
				</div><!--contact-container-->
			</div><!--CONATINER-->
		<!--<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/scripts.js"></script>-->
		</body>
	</main><!-- #main -->

<?php
wp_footer(); ?>
</html>

