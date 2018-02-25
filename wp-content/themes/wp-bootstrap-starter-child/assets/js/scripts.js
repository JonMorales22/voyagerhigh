$("#target").submit(function( event ){
	console.log("Submit form");
	event.preventDefault();
});

$(".dropdown-item").click(function( event ){
	$target = (event.target.href);
	$target = $target.split('/');
	$target = $target.pop();
	$target = $($target);
	$('html,body').animate({scrollTop: $target.offset().top},500);
});