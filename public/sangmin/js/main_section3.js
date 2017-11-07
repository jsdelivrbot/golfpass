jQuery(document).ready(function ($) {
	var jssor_1_2options = {
		$AutoPlay: 1,
		$Idle: 0,
		$SlideDuration: 5000,
		$SlideEasing: $Jease$.$Linear,
		$PauseOnHover: 4,
		$SlideWidth: 340,
		$Cols: 6,
		$Align: 0
	};
	var jssor_1_2slider = new $JssorSlider$("jssor_1_2", jssor_1_2options);
	/*#region responsive code begin*/
	var MAX_WIDTH = 2000;
	function ScaleSlider2() {
		var containerElement = jssor_1_2slider.$Elmt.parentNode;
		var containerWidth = containerElement.clientWidth;
		if (containerWidth) {
		var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);
			jssor_1_2slider.$ScaleWidth(expectedWidth);
		} else {
			window.setTimeout(ScaleSlider2, 30);
		}
	}

	ScaleSlider2();
	$(window).bind("load", ScaleSlider2);
		/*$(window).bind("resize", ScaleSlider2);*/
		$(window).bind("orientationchange", ScaleSlider2);
	/*#endregion responsive code end*/
});
