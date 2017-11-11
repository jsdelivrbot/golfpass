var delta = 300;
var timer = null;
$(window).on('resize', function() {
	clearTimeout(timer);
	timer = setTimeout(detailResizeDone, delta);
});
stickInit();
function detailResizeDone() {
	$("#book-box").trigger("sticky_kit:detach");
	stickInit();
}
function stickInit() {
	$("#book-box").stick_in_parent()
		.on("sticky_kit:stick", function(e) {
			console.log("has stuck!", e.target);
		})
		.on("sticky_kit:unstick", function(e) {
			console.log("has unstuck!", e.target);
		}).on("sticky_kit:bottom", function(e) {
			console.log("bottom!", e.target);
		});
}
