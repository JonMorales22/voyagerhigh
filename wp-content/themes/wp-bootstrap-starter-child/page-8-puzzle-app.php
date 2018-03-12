<!DOCTYPE html>
<?php
/**
*	Template for 8-puzzle-app
*
*	I have no idea what I'm doing....
*
*/
?>



<head>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<main>
	<body class="app">
		<div class="container-fluid">
			<div class="row justify-content-md-center">
			   <div class="col">
			   	   <div class="content">
			   	      <div class='header-holder'>				      	
			   	   		<?php 
				      		$page = get_post($id=7); //on local id=127
				      		$page_content = $page->post_content;
				      		echo '<h1 class="container-title">' . $page->post_title . '</h1>';
				      		//echo "<div class='post-contents'>" . $page->post_content . "</div>";
				    	?>
					   </div>
				   		<div class="embed-responsive embed-responsive-21by9">
					       <iframe src="<?php echo get_home_url(); ?>/apps/8-puzzle-src/8puzzle.html"></iframe>
				       </div>
				       	<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Info</button>
				   </div><!-- .content -->
				   			   			<div id="aboutModal" class="modal fade in bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						  <div class="modal-dialog modal-lg">
						    <div class="modal-content">
						    	<div class="modal-header">
						    		<h2>Welcome to the 8 Puzzle!</h2>
						    		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          								<span aria-hidden="true">×</span>
        							</button>
						    	</div>
						    	<div class="modal-body">
						    		<?php echo $page_content; ?>
						    	</div>
						    	<div class="modal-footer">
						    		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						    	</div>
						    </div>
						  </div>
						</div> <!--end modal-->
			   </div><!--.col-->
			</div><!--.row-->
		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<!--<script src="<?php echo get_home_url(); ?>/page-contact"></script>-->
	</body>
</main>



<?php wp_footer()?>
</html>
