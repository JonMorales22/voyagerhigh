$("#target").submit(function( event ){
	console.log("Submit form");
	event.preventDefault();
});

$(".scroll").click(function( event ){
	$target = (event.target.href);
	$target = $target.split('/');
	$target = $target.pop();
	$target = $($target);
	$('html,body').animate({scrollTop: $target.offset().top},500);
});

$(function() {
	var scrollHeight = $(document).height();
	console.log("scrollHeight: " + scrollHeight);
});

$(window).on("scroll", function() {
	if(($(window).scrollTop() + $(window).height() > $(document).height() - 100))
	{
		$("#scrollTop:hidden").fadeIn(10);
	}
	else
	{
		$("#scrollTop").fadeOut(10);
	}
		
});