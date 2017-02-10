// send ajax to find available tables for a particular date and time
let spotsUpdating = (() => {
    let $datePicker = $("#datePicker");
    let $timePicker = $("#timePicker");
    let $tableInfo = $('.tableInfo');

    $datePicker.on('change', showAvailableSpots);
    $timePicker.on('change', showAvailableSpots);

    function showAvailableSpots() {
        let $date = $("#datePicker").val();
        let $time = $("#timePicker").find(":selected").val();

        if ($date != '' && $time != '') {
            let $location = 'updatespots/' + $date + '/' + $time;
            $.get(
                $location,
                {},
                (response) => {
                    $tableInfo.html(response);
                }
            );
        }
    }
})();

// show and hide error box also subscribe error msg event
let errorUpdating = (() => {
    let $errorBox = $(".errorBox");
    let $text = $errorBox.find("h4");
    let $btnClose = $(".errorBox i");

    events.on('formIncomplete', insertErrorMsg);
    $btnClose.on('click', _closeErrorBox);

    function insertErrorMsg(msg) {
        $text.html(msg);
        events.emit('centerBox', $errorBox);
        $errorBox.fadeIn(200);
    }

    function _closeErrorBox() {
        $errorBox.fadeOut(200);
    }
})();

// get spot selection information
let spotSelection = () => {
    let $selected = $(".selected");

    function getReservedIds() {
        let $selectedIds = [];
        $selected.each(function (index) {
            $selectedIds.push($(this).find('img').attr('alt'));
        });
        return $selectedIds;
    }

    function getData() {
        let $selectedIds = getReservedIds();
        if ($selectedIds.length == 0) {
            return 'Please select your spot';
        } else {
            return $selectedIds;
        }
    }

    return {
        getData: getData
    }
};

// get user information
let infoRetrieving = () => {
    let $date = $("#datePicker").val();
    let $timeSpan = $("#timePicker").val();
    let $fName = $("#resFName").val();
    let $lName = $("#resLName").val();
    let $phone = $("#resPhone").val();
    let $email = $("#resEmail").val();

    function getData() {
        return {
            date: $date,
            timeSpan: $timeSpan,
            firstName: $fName,
            lastName: $lName,
            phone: $phone,
            email: $email
        }
    }

    return {
        getData: getData
    }
};

// reserve selected spots
let postReservation = (() => {
    let $form = $("#formReservation");
    let $reserveSuccess = $("#reserveSuccess");
    let $url = 'reservespots';
    // let $_token = '{{ csrf_token() }}';
    let $_token = $('input[name="_token"]').val();

    $form.on('submit', reserveTables);

    function reserveTables(e) {
        e.preventDefault();
        let $selectedIds = spotSelection().getData();
        if ($.type($selectedIds) === 'string') {
            events.emit('formIncomplete', $selectedIds);
        } else {
            let $user_info = infoRetrieving().getData();
            $user_info.spots = $selectedIds;
            $user_info._token = $_token;
            $.post({
                url: $url,
                data: $user_info,
                success: (response) => {
                    $reserveSuccess.html(response);
                },
                error: (error) => {
                    let $errors = $.parseJSON(error.responseText);
                    if ($errors.firstName) {
                        $("#fNameError").addClass('has-error');
                        $("#fNameErrorMsg").find('strong').html($errors.firstName);
                    }
                    if ($errors.lastName) {
                        $("#lNameError").addClass('has-error');
                        $("#lNameErrorMsg").find('strong').html($errors.lastName);
                    }
                    if ($errors.phone) {
                        $("#phoneError").addClass('has-error');
                        $("#phoneErrorMsg").find('strong').html($errors.phone);
                    }
                    if ($errors.email) {
                        $("#emailError").addClass('has-error');
                        $("#emailErrorMsg").find('strong').html($errors.email);
                    }
                }
            });
        }
    }
})();