$("form").submit(function(event){
	console.log("submit form");
	$data = eventData;
	event.preventDefault();
});

$(".scroll").click(function( event ){
	$target = this.hash;
	$target = $($target);
	$('html,body').animate({scrollTop: $target.offset().top},500);
});

// $(window).on("scroll", function() {
// 	if(($(window).scrollTop() + $(window).height() > $(document).height() - 100))
// 	{
// 		$("#scrollTop:hidden").fadeIn(10);
// 	}
// 	else
// 	{
// 		$("#scrollTop").fadeOut(10);
// 	}	
// });
