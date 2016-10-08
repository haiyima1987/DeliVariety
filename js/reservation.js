/**
 * Created by Adrian on 10/3/2016.
 */

function updateTables(){
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("tableLayoutPHP").innerHTML = this.responseText;
        }
    };
    var $date = $('#date').val();
    var $time = $('#timeInput').val();

    xmlhttp.open("GET", "include/res_tables.php?d="+$date+"&t="+$time, true);
    xmlhttp.send();
};

function displayConfirmation(e) {
    var $date = $('#date').val();
    var $time = $('#timeInput').val();
    var $phone = $('#phone').val();
    var $email = $('#email').val();

    var $tables = getSelectedTables();
    if($tables.length == 0){
        alert("Please select a table to make a reservation!");
        return false;
    }
    if($phone === ""){alert("Please enter your phone number.");return false;}
    if($email === ""){alert("Please enter your email."); return false;}

    var $tables_string = $tables.join(",");

    var xmlhttp = new XMLHttpRequest();
    var url = "include/reserve.php";
    var params = "d="+$date+"&t="+$time+"&p="+$phone+"&e="+$email+"&tables="+$tables_string;

    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("regConfirm").innerHTML = this.responseText;
        }
    };

    xmlhttp.send(params);

    return false;
};

function getSelectedTables() {
    var selectedTables = new Array();
    for($x = 1; $x < 9; $x++){
        if($(document.getElementById($x)).is(".selectedTable") === true){
            selectedTables.push($x);
        }
    }

    return selectedTables;
};

//solution found: http://jsfiddle.net/7dcuh/15/
$(document).on('mouseenter', '.tableImage', function () {
    if ($(this).is(".selectedTable") === false){
        $(this).attr('src', 'img/table_selected.png');
    }
}).on('mouseleave', '.tableImage', function () {
    if ($(this).is(".selectedTable") === false) {
        $(this).attr('src', 'img/table.png');
    }
}).on('click', '.tableImage', function () {
    $(this).toggleClass("selectedTable");
});
