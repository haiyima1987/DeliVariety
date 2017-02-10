// send ajax request to two pages to update order list
(() => {
    let $btnMinus = $(".btnMinus");
    let $btnPlus = $(".btnPlus");
    let $orderList = $(".orderedItems");

    $btnMinus.on('click', selectedItemChangedByOne);
    $btnPlus.on('click', selectedItemChangedByOne);

    function selectedItemChangedByOne() {
        let $id = $(this).attr('id');
        let $action = $(this).attr('action');
        let $orderListRoute = "/order/" + $action + "/" + $id;
        $.get(
            $orderListRoute,
            {},
            function (response) {
                $orderList.html(response);
            }
        );
    }
})();

// // show payment box
// (() => {
//     let $btnList = $("#btnList");
//     let $payBox = $(".payBox");
//     let $pageOverview = "/order/overview";
//     let $fadeInTime = 50;
//
//     $btnList.on('click', showPayBox);
//
//     function showPayBox(e) {
//         e.preventDefault();
//         $.get(
//             $pageOverview,
//             {},
//             function (response) {
//                 $payBox.fadeIn($fadeInTime);
//                 $payBox.html(response);
//                 centerPayBox();
//             }
//         );
//     }
//
//     function centerPayBox() {
//         $payBox.css("position", "absolute");
//         $payBox.css("top", Math.max(0, ($(window).height() - $payBox.outerHeight()) / 2 + $(window).scrollTop()) + "px");
//         $payBox.css("left", Math.max(0, ($(window).width() - $payBox.outerWidth()) / 2 + $(window).scrollLeft()) + "px");
//     }
// })();