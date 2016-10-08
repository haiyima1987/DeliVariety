<div class="sideBar col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
    <form class="form-horizontal reserveForm" onsubmit="event.preventDefault(); displayConfirmation();">
        <filedset>
            <legend>Date & Time:</legend>
            <div class="form-group">
                <label class="control-label col-md- 3 col-sm-3 col-xs-3" for="date">Date:</label>
                <div class="col-md-12 col-sm-9 col-xs-9">
                    <input type="text" class="form-control" id="date" value="<?php echo $current_date; ?>" onchange="updateTables()" name="date">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md- 3 col-sm-3 col-xs-3" for="time">Time:</label>
                <div class="col-md-12 col-sm-9 col-xs-9">
                    <input id="timeInput" type="text" value="<?php echo $current_time; ?>" class="time ui-timepicker-input form-control" autocomplete="off" onchange="updateTables()" name="time">
                </div>
            </div>
        </filedset>
        <filedset>
            <legend>Contact Information:</legend>
            <div class="form-group">
                <label class="control-label col-md- 3 col-sm-3 col-xs-3" for="phone">Phone:</label>
                <div class="col-md-12 col-sm-9 col-xs-9">
                    <input type="tel" class="form-control" id="phone" placeholder="Enter phone number" name="phone">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md- 3 col-sm-3 col-xs-3" for="email">Email:</label>
                <div class="col-md-12 col-sm-9 col-xs-9">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
            </div>
        </filedset>
        <div class="form-group">
            <div class="col-md-9 col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4">
                <button type="submit" name="Submit" class="btn btn-default">Make Reservation</button>
            </div>
        </div>
    </form>
    <div id="regConfirm"></div>
</div>