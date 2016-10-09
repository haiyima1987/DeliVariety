var $btnBoxClose = $(".payBoxClose");
var $payBox = $(".payBox");
var $fadeInTime = 200;

$btnBoxClose.on('click', closePayBox);

function closePayBox(e) {
    e.preventDefault();
    $payBox.fadeOut($fadeInTime);
}