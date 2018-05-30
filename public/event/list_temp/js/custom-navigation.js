(function($) {
	
	"use strict";
	
	// Cache Selectors
	var mainWindow		=$(window),
		mainDocument	=$(document),
		myLoader		=$(".loader"),
		myNav			=$("#mynavbar"),
		mytopBar		=$('#top-bar'),
		navLink			=$('.landing-page.nav a'),
		navCollapse		=$('.navbar-collapse'),
		htmlBody		=$('html, body'),
		colorPanel		=$('#colorPanel'),
		mytoolTip		=$('[data-toggle="tooltip"]'),
		closeBtn		=$("#close-btn"),
		menuBtn			=$("#menu-btn"),
		mySidenav		=$("#mySidenav");
	
	
	// Loader
	mainWindow.on('load', function () {
		myLoader.fadeOut("slow");
	});
	
	
	// Navbar
	mainDocument.on('ready', function(){
	
		myNav.affix({
			offset: { 
				top: function() { return mytopBar.height(); }
			}
		});
	});
	
	
	// Landing Page Navbar
	navLink.on('click', function () {
		navCollapse.collapse('hide');
	});
	
	mainDocument.on('ready',function(){
	  // Add smooth scrolling to all links
	  navLink.on('click', function(event) {
	
		// Make sure this.hash has a value before overriding default behavior
		if (this.hash !== "") {
		  // Prevent default anchor click behavior
		  event.preventDefault();
	
		  // Store hash
		  var hash = this.hash;
	
		  // Using jQuery's animate() method to add smooth page scroll
		  // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
		  htmlBody.animate({
			scrollTop: $(hash).offset().top
		  }, 800, function(){
	   
			// Add hash (#) to URL when done scrolling (default click behavior)
			window.location.hash = hash;
		  });
		} // End if
	  });
	});
	
	
	// Side Navbar
	mainDocument.on('ready',function(){
		menuBtn.on('click',
		function(){
			mySidenav.css('transform','translateX(0%)');
		});
	});
	
	mainDocument.on('ready',function(){
		closeBtn.on('click',
		function(){
			mySidenav.css('transform','translateX(-120%)');
		});
	});
	

	// Tool Tip
	mainDocument.on('ready', function(){
		mytoolTip.tooltip();   
	});
	
	
	// Color Picker
	mainDocument.on('ready', function(){
		colorPanel.ColorPanel({
			styleSheet: '#cpswitch'
            , colors: {
                '#ffcb05': 'css/yellow.css'
                , '#3cafff': 'css/skyblue.css'
                , '#ff6666': 'css/pink.css'
				, '#7fc143': 'css/green.css'
				, '#00cccc': 'css/cyan.css'
				, '#ffbf80': 'css/skin.css'
				, '#9797ff': 'css/lightblue.css'
				, '#d98cb3': 'css/purple.css'
				, '#cc9966': 'css/brown.css'
				, '#00e6ac': 'css/spring-green.css'
				, '#fc603f': 'css/orange.css'
				, '#C4C920': 'css/lightgreen.css'
				, '#E266E8': 'css/strongpurple.css'
				, '#6CE34B': 'css/stronggreen.css'
				
            , }
            , linkClass: 'linka'
            , animateContainer: false
		});
	});

})(jQuery);