$(document).ready(function () {

    var $bgMenu = $("#btnMenu");
    var $btnClose = $(".btnClose");
    var $overlay = $("#overlay");
    var $body = $("body");
    var $delayTime = 200;
    var $slidingTime = 500;

    function showMenu() {
        $overlay.delay($delayTime).slideDown($slidingTime);
        $body.addClass("noScroll");
    }

    function closeMenu() {
        $overlay.delay($delayTime).slideUp($slidingTime);
        $body.removeClass("noScroll");
    }

    $bgMenu.click(showMenu);
    $btnClose.click(closeMenu);
})