/**
 * Created by Haiyi on 1/10/2017.
 */
// select a table
(() => {
    let $spot = $(".available");
    let $availImg = '../img/table_available.png';
    let $selectedImg = '../img/table_selected.png';
    let $count = 0;

    $spot.on('click', selectTable);

    function selectTable() {
        let $date = $("#datePicker").val();
        let $time = $("#timePicker").find(":selected").val();

        if ($date == '' || $time == '') {
            events.emit('formIncomplete', 'Please select date and time');
        } else {
            let $spot = $(this);
            let $img = $spot.find('img');
            if ($spot.hasClass('selected')) {
                $spot.removeClass('selected');
                $img.attr('src', $availImg);
                $count--;
            } else {
                $spot.addClass('selected');
                $img.attr('src', $selectedImg);
                $count++;
            }
            updatePrice($count);
        }
    }

    function updatePrice(count) {
        let $infoBar = $("#priceReservation");
        let $infoDiscount = $("#discountReservation").find('strong');
        let $price = count * 20;
        let $rate = $("#discountRate").html();
        $infoBar.html('Total Price: € ' + $price.toFixed(2));
        $infoDiscount.html('Discount Price: € ' + ($price * $rate).toFixed(2));
    }
})();