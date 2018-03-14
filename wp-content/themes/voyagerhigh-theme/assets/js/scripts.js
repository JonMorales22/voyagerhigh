$("#btn-popper").click(function() {
	$("form:first").submit();
})

$(".scroll").click(function( event ){
	$target = this.hash;
	$target = $($target);
	$('html,body').animate({scrollTop: $target.offset().top},500);
	event.preventDefault();
});
