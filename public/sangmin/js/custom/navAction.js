$(document).ready(function () {
    $('#search').focus(function () {
        console.log('test');
        $('#auto-complate').css('visibility', 'visible');
    });
    $('#search').blur(function () {
        console.log('test');
        $('#auto-complate').css('visibility', 'hidden');
    });

    var toggle = function () {
        $('body').toggleClass('menu-open');
    }
});
