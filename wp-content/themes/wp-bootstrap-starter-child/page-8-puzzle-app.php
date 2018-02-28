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
</head>

<main>
	<body class="app">
		<div class="container-fluid">
			<div class="row justify-content-md-center">
			   <div class="col">
				   <div class="embed-responsive embed-responsive-4by3">
				   		
					   <iframe class="embed-responsive-item" src="<?php echo get_home_url(); ?>/apps/8-puzzle-src/8puzzle.html"></iframe>
				   </div>
			   </div>
			</div><!--row-->
		</div>

	</body>
</main>



<?php get_footer(); ?>
</html>
