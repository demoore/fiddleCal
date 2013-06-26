<div class="container-fluid">
    <div class="row-fluid">
        <div class="span8 offset3">
            <?php
            if (isset($userInfo)) {
                echo "<h1><small>Welcome " . $userInfo->userFirstName . "</small></h1>";
            }
            ?>
            <h1><span id="custom-month" class="custom-month"></span>
                –
                <span id="custom-year" class="custom-year"></span></h1>

            <nav>
                <span id="custom-prev" class="custom-prev"> < </span>
                <span id="custom-next" class="custom-next"> > </span>
                <span id="custom-current" class="custom-current" title="Got to current date"> – </span>
            </nav>
        </div>
        <br>
    </div>
    <div class="row-fluid">
        <div class="span8">
            <div id="calendar" class="fc-calendar-container span12"></div>

        </div>
        <div class="span4">
            <div class="well">
                <form action="">
                    <fieldset>
                        <legend>Add a reminder</legend>
                        <label for="date">Date</label>

                        <div><span id="date" name="date" class="badge badge-inverse">Select Date</span></div>
                        <label for="info">Info</label>
                        <textarea rows="3" name="info" id="info"></textarea>
                        <br>
                        <button type="submit" class="btn">Submit</button>
                        <input type="hidden" id="dayValue" value="">
                        <input type="hidden" id="monthValue" value="">
                        <input type="hidden" id="yearValue" value="">
                    </fieldset>
                </form>
            </div>
            <div class="well">
                <fieldset>
                    <legend>Important Dates</legend>
                </fieldset>
            </div>
        </div>
    </div>
</div>


</div>
<!-- /container -->

<script type="text/javascript">

    $(function () {

        var cal = $('#calendar').calendario({
                onDayClick: function ($el, $contentEl, dateProperties) {
                    $dayOnClick = dateProperties.day;
                    $monthOnClick = dateProperties.month;
                    $yearOnClick = dateProperties.year;

                    for (var key in dateProperties) {
                        console.log(key + ' = ' + dateProperties[ key ]);
                    }

                    $("#date").html($dayOnClick + "/" + $monthOnClick + "/" + $yearOnClick);
                    $("#dayValue").val($dayOnClick);
                    $("#monthValue").val($monthOnClick);
                    $("#yearValue").val($yearOnClick);


                }

            }),
            $month = $('#custom-month').html(cal.getMonthName()),
            $year = $('#custom-year').html(cal.getYear());

        $('#custom-next').on('click', function () {
            cal.gotoNextMonth(updateMonthYear);
        });
        $('#custom-prev').on('click', function () {
            cal.gotoPreviousMonth(updateMonthYear);
        });
        $('#custom-current').on('click', function () {
            cal.gotoNow(updateMonthYear);
        });

        function updateMonthYear() {
            $month.html(cal.getMonthName());
            $year.html(cal.getYear());
        }


    });

</script>

<script type="text/javascript">

</script>