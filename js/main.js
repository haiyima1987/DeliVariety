// show the menu and banner
// function toggle() {
//     var $bgMenu = document.getElementById("banner");
//     var $menuList = document.getElementsByClassName("navbar")[0];
//
//     if ($bgMenu.className == "banner row") {
//         $bgMenu.className = "fullBanner";
//         $menuList.style.display = "block";
//     }
//     else {
//         $bgMenu.className = "banner row";
//         $menuList.style.display = "none";
//     }
// }
//
// document.getElementById("btnMenu").addEventListener("click", toggle);

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