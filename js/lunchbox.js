// send ajax request to two pages
var $btnMinus = $(".btnMinus");
var $btnPlus = $(".btnPlus");
var $lunchBox = $(".lunchBox");
var $payBox = $(".payBox");
var $lunchBoxPage = "include/lunchbox.php";
var $payBoxPage = "include/paybox.php";

$btnMinus.on('click', selectedItemChangedByOne);
$btnPlus.on('click', selectedItemChangedByOne);

function selectedItemChangedByOne() {
    $.get(
        $lunchBoxPage,
        {
            action: $(this).attr('action'),
            id: $(this).attr('id')
        },
        function (response) {
            $lunchBox.html(response);
            $payBox.load($payBoxPage);
        }
    );
}

// task 7: show order list
// variables for task 7
var $btnList = $("#btnList");
var $fadeInTime = 200;

$btnList.on('click', showPayBox);

// show order list
function showPayBox(e) {
    e.preventDefault();
    $payBox.fadeIn($fadeInTime);
}