var global_msg = "";

$("form").submit(function(event){
	event.preventDefault();
	$poop = {
		name	: event.currentTarget[0].value, 
		email	: event.currentTarget[1].value,
		msg		: event.currentTarget[2].value,
		proof	: event.currentTarget[3].value
	};
	var url = window.location.href;
	var posting = $.post(url+ "wp-content/themes/wp-bootstrap-starter-child/test.php", $poop)
	.done(function(ass){
		global_msg=ass;
		console.log(global_msg);
		$("#btn-popper").popover("dispose")
		$("#btn-popper").popover({
			container: "body",
			placement: "left",
			trigger: "focus",
			delay: 100,
			content: ass
		})
		$("#btn-popper").popover("show");
	})
});

$("#btn-popper").on('show.bs.popover', function () {
	console.log("show");
	//popover.setContent();
});

$('#btn-popper').on('hidden.bs.popover', function () {
	console.log("hidden");
 	$("#btn-popper").popover("dispose")
});

$("#btn-popper").click(function() {
	$("form:first").submit();
})

$(".scroll").click(function( event ){
	$target = this.hash;
	$target = $($target);
	$('html,body').animate({scrollTop: $target.offset().top},500);
});
