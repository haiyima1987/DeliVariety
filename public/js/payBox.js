/**
 * Created by Haiyi on 1/5/2017.
 */
// enable the showing of the pay box after refreshing
(() => {
    let $btnList = $("#btnList");
    let $payBox = $(".payBox");
    let $overview = $(".orderOverview");
    let $pageOverview = "/order/overview";
    let $fadeInTime = 50;

    $btnList.on('click', showPayBox);

    function showPayBox(e) {
        e.preventDefault();
        $.get(
            $pageOverview,
            {},
            function (response) {
                $payBox.fadeIn($fadeInTime);
                $overview.html(response);
                events.emit('centerBox', $payBox);
            }
        );
    }
})();

// hide the overview pay box
(() => {
    let $btnBoxClose = $(".payBoxClose");
    let $payBox = $(".payBox");
    let $fadeInTime = 200;

    $btnBoxClose.on('click', closePayBox);

    function closePayBox(e) {
        e.preventDefault();
        $payBox.fadeOut($fadeInTime);
    }
})();