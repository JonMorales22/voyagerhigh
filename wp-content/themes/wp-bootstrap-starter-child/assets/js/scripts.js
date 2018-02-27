$("form:first").submit(function(event){
	event.preventDefault();
	$poop = {
		name	: event.currentTarget[0].value, 
		email	: event.currentTarget[1].value,
		msg		: event.currentTarget[2].value,
		proof	: event.currentTarget[3].value
	};
	var url = window.location.href;
	var posting = $.post(url+ "wp-content/themes/wp-bootstrap-starter-child/test.php", $poop)
	.done(function(data){
		console.log("data loaded: " + data);
	})
});

$(function() {
		$('[data-toggle="popover"]').popover();
})

// $("#btn-popper").click( function() {
// 	("#btn-popper").popover('show')
// });

$(".scroll").click(function( event ){
	$target = this.hash;
	$target = $($target);
	$('html,body').animate({scrollTop: $target.offset().top},500);
});
