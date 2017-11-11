var delta = 300;
var timer = null;
$(window).on('resize', function() {
	$("#book-box").trigger("sticky_kit:update");
});
stickInit();
function detailResizeDone() {
	// $("#book-box-wrap,#book-box").trigger("sticky_kit:recalc");
	// $("#book-box-wrap").trigger("sticky_kit:recalc");
	// $("#book-box").trigger("sticky_kit:recalc");
	// $$("#book-box-wrap,#book-box").trigger("sticky_kit:detach");
	$("#book-box").trigger("sticky_kit:detach");
	$("#book-box").stick_in_parent();
}

function stickInit() {
	$("#book-box").stick_in_parent();
}
