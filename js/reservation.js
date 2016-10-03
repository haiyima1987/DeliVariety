/**
 * Created by Adrian on 10/3/2016.
 */

function updateTables(){
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("tableLayoutPHP").innerHTML = this.responseText;
        }
    }
    var $date = $('#date').val();
    var $time = $('#timeInput').val();

    //alert($date+", "+$time);

    xmlhttp.open("GET", "res_tables.php?d="+$date+"&t="+$time, true);
    xmlhttp.send();
}