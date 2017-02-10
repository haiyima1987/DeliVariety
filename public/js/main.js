// show the menu overlay
let overlayShowing = (() => {
    let $bgMenu = $(".btnMenu");
    let $btnClose = $(".btnClose");
    let $overlay = $(".overlay");
    let $body = $("body");
    let $delayTimeMenu = 200;
    let $showTimeMenu = 500;

    $bgMenu.click(showMenu);
    $btnClose.click(hideMenu);

    function showMenu() {
        $overlay.delay($delayTimeMenu).slideDown($showTimeMenu);
        $body.addClass("noScroll");
    }

    function hideMenu() {
        $overlay.delay($delayTimeMenu).slideUp($showTimeMenu);
        $body.removeClass("noScroll");
    }
})();


// scroll back to top of the page
let scrollingToTop = (() => {
    let $offset = 250;
    let $duration = 300;
    let $scrollBtn = $('.scrollUp');
    let $page = $('html, body');

    $scrollBtn.on('click', scrollToTop);
    $(window).on('scroll', showScrollBtn);

    function showScrollBtn() {
        if ($(this).scrollTop() > $offset) {
            $scrollBtn.fadeIn($duration);
        } else {
            $scrollBtn.fadeOut($duration);
        }
    }

    function scrollToTop(event) {
        event.preventDefault();
        $page.animate({scrollTop: 0}, $duration);
    }
})();

// send ajax call to order items
let itemOrdering = (() => {
    let $btnOrder = $(".btnItemOrder");
    let $orderList = $(".orderedItems");

    $btnOrder.on('click', loadOrderList);

    function loadOrderList() {
        let $id = $(this).attr('id');
        let $action = $(this).attr('action');
        let $orderListRoute = "/order/" + $action + "/" + $id;
        $.get(
            $orderListRoute,
            {},
            function (response) {
                $orderList.hide().html(response).fadeIn(50);
            }
        );
    }
})();

// hide the order list by clicking the lunch bag logo
let orderListHiding = (() => {
    let $orderListLogo = $(".orderListLogo");
    let $orderList = $(".orderList");

    $orderListLogo.on('click', toggleOrderList);

    function toggleOrderList(e) {
        e.preventDefault();
        $orderList.fadeToggle(100);
    }
})();

let boxCentering = (() => {
    events.on('centerBox', centerBox);
    
    function centerBox($box) {
        $box.css("position", "absolute");
        $box.css("top", Math.max(0, ($(window).height() - $box.outerHeight()) / 2 + $(window).scrollTop()) + "px");
        $box.css("left", Math.max(0, ($(window).width() - $box.outerWidth()) / 2 + $(window).scrollLeft()) + "px");
    }
})();