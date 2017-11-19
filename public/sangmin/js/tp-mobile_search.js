jQuery(document).ready(function($) {
  var wHeight = window.innerHeight;
  //search bar middle alignment
  $('#tp-mk-fullscreen-searchform').css('top', wHeight / 2);
  //reform search bar
  jQuery(window).resize(function() {
    wHeight = window.innerHeight;
    $('#tp-mk-fullscreen-searchform').css('top', wHeight / 2);
  });
  // Search
  $('#tp-search-button').click(function() {
    console.log("Open Search, Search Centered");
    $("div.tp-mk-fullscreen-search-overlay").addClass("tp-mk-fullscreen-search-overlay-show");
  });
  $("a.tp-mk-fullscreen-close").click(function() {
    console.log("Closed Search");
    $("div.tp-mk-fullscreen-search-overlay").removeClass("tp-mk-fullscreen-search-overlay-show");
  });
});
