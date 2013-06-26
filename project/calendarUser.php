<?php
include("php/entryTable.php");
$newEntry = new \entry\entryTable($userInfo->userTable);
$myTable = $newEntry;

$jsonObject = $myTable->getUserTable();
// TODO fix edit - edit doesn't work immediately after adding a label
?>
<br>
<div class="container-fluid">
    <div class="row-fluid">

        <div class="page-header">
            <?php
            if (isset($userInfo)) {
                echo "<h1><small>Welcome " . $userInfo->userFirstName . "</small></h1>";
            }
            ?>
        </div>
        <h1><span id="custom-month" class=" custom-month"></span>
            –
            <span id="custom-year" class="custom-year"></span></h1>

        <nav>
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a id="custom-prev" class="btn custom-prev"><i class="icon-chevron-left"></i></a>
                    <a id="custom-current" class="btn custom-current" title="Go to current date"><i
                            class="icon-chevron-down"></i></a>
                    <a id="custom-next" class="btn custom-next"><i class="icon-chevron-right"></i></a>
                </div>
            </div>
        </nav>
    </div>
    <br>

    <div class="row-fluid">
        <div class="span8">
            <div id="calendar" class="fc-calendar-container span12"></div>
        </div>
        <div class="span4">
            <div class="well">
                <form method="post">
                    <fieldset>
                        <legend>Add a reminder</legend>
                        <label for="date">Date</label>

                        <div><span id="date" class="badge badge-inverse">Select Date</span></div>
                        <label for="info">Info</label>
                        <textarea rows="3" name="info" id="info"></textarea>
                        <br>
                        <button type="button" value="Submit" class="btn btn-primary btn-large" id="submit">Add entry
                        </button>
                        <input type="hidden" id="dayValue" value="">
                        <input type="hidden" id="monthValue" value="">
                        <input type="hidden" id="yearValue" value="">
                        <input type="hidden" id="testValue" value="">

                    </fieldset>
                </form>
            </div>

        </div>
    </div>
</div>

<div id='popover-form' class="hide">
    <form method="post" id="popover-buttons">
        <fieldset class="form-horizontal">
            <button type="button" class="btn btn-primary edit-btn">Edit</button>
            <button type="button" class="btn btn-danger del-btn">Delete</button>
        </fieldset>
    </form>
</div>


</div>


<!-- /container -->
<!-- Calender Handling Javascript -->
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

<!-- Popup handling from the database -->
<script type="text/javascript">

    function makePopups(){

        var isVisible = false;
        var clickedAway = false;
        $('.label').popover({
            selector: '[data-toggle="popover"]',
            animation: true,
            placement: 'top',
            html: true,
            title: '<button type="button" class="close">&times;</button>',
            content: function () {
                return '<div class="popup-text">' + $(this).parent().find('.content').html() + '</div>' + $("#popover-form").html();
            },
            trigger: 'manual'

        }).click(function (e) {
                $(this).popover('show');
                clickedAway = false
                isVisible = true
                e.preventDefault()
            });

        $(document).click(function (e) {
            if (isVisible & clickedAway) {
                $('.btn-danger').popover('hide')
                isVisible = clickedAway = false
            }
            else {
                clickedAway = true
            }
        });

        $('.label').popover({
            html: true,
            trigger: 'manual'
        }).click(function (e) {
                $(this).popover('show');
                $('.close').click(function (e) {
                    $('.label').popover('hide');
                });
                e.preventDefault();
            });

    }

    $(document).ready(function () {


        returnEntries();
        makePopups();
        $("#custom-prev").click(function () {
            returnEntries();
            makePopups();
        })
        $("#custom-next").click(function () {
            returnEntries();
            makePopups();
        })
        $("#custom-current").click(function () {
            returnEntries();
            makePopups();
        })

        function returnEntries() {

            var dates = <?php echo $myTable->returnJSON() ?>;
            var datePattern = /(201[\d])-0?(1?\d)-(\d\d)/m;
            for (var i = 0; i < dates.length; i++) {
                var explosion = dates[i]["entryDate"].match(datePattern);


                var divName = "d" + (parseInt(explosion[3]) + 1) + "m" + (parseInt(explosion[2]) - 1) + "y" + explosion[1];

                var labelName = dates[i]["entryName"].slice(0, 8) + "...";
                //alert(divName);

                //Inserts label, hidden content, and hidden input
                //TODO Clean this shit up
                $("#" + divName).append('<div class="divLabel"><a href="#" class="label label-info my-popover popup-marker" rel="clickover" data-toggle="popover" ' +
                    'data-placement="top" rel="popover" data-content="' + dates[i]["entryName"] + '"  >' + labelName + '</a>' +
                    '<div class="content hide">' + dates[i]["entryName"] + '</div>' + '<input type="hidden" class="anID" id="' + divName + 'entry" value="' + dates[i]["entryID"] + '"></div>');

//                $("#" + divName).append('<div class="content hide">' + dates[i]["entryName"] + '</div>');
//
//                $("#" + divName).append('<input type="hidden" class="anID" id="' + divName + 'entry" value="' + dates[i]["entryID"] + '"></div>');


            }
        }

        //makePopups();

    });


    $(document).ready(function () {
        $('body').click(function () {
            $('.popover').popover('toggle');
            console.log("CLicK");
        });


    });

</script>

<!-- Editing, deleting, and making entries -->
<script type="text/javascript">

    $("#submit").click(function () {

        var parameters = {
            'name': $("textarea#info").val(),
            'date': ($yearOnClick + "-" + $monthOnClick + "-" + $dayOnClick),
            'email': "<?php echo $userEmail; ?>",
            'tableName': "<?php echo "$userInfo->userTable"; ?>"
        };

        console.log(parameters);

        $.ajax({
            type: "post",
            url: "project/insert.php",
            data: parameters,
            dataType: "json"


        }).always(function () {
                var date = parameters;
                var datePattern = /(201\d)-(\d?\d)-(\d?\d)/m;

                var explosion = date["date"].match(datePattern);
                console.log(explosion[3]);


                var divName = "d" + (parseInt(explosion[3]) + 1) + "m" + (parseInt(explosion[2]) - 1) + "y" + explosion[1];
                var labelName = date["name"].slice(0, 8) + "...";
                //alert(divName);

                $("#" + divName).append('<div class="divLabel"><a href="#" class="label label-info my-popover" ' +
                    'data-toggle="popover" data-placement="top" rel="popover" data-content="'
                    + date["name"] + '"  >' + labelName + '</a> <div class="content hide">' + date["name"] + '</div></div>');


                makePopups();
            });


    });


    var textAreaTruth = true;
    $('body').on("click", ".edit-btn", function () {

        $(this).toggleClass('btn-primary btn-success');

        if (textAreaTruth) {
            var oldText = $('div').closest('div.popup-text').text();
            $('div').closest('div.popup-text').replaceWith('<textarea rows="3" name="info" id="newEdit">' + oldText + '</textarea>');
            $(this).html('Save');
            textAreaTruth = false;


        } else {
            var newText = $('textarea').closest('#newEdit').val();
            console.log(newText);
            $(this).html('Edit');

            var parameters = {
                'name': $("textarea#newEdit").val(),
                'date': ($yearOnClick + "-" + $monthOnClick + "-" + $dayOnClick),
                'email': "<?php echo $userEmail; ?>",
                'tableName': "<?php echo "$userInfo->userTable"; ?>",
                'id': $ID.valueOf()
            };


            $.ajax({
                type: "post",
                url: "project/update.php",
                data: parameters,
                dataType: "json"


            }).always(function () {
                    var date = parameters;
                    var datePattern = /(201\d)-(\d?\d)-(\d?\d)/m;

                    var explosion = date["date"].match(datePattern);
                    console.log(explosion[3]);
                    console.log(parameters);


                    var divName = "d" + (parseInt(explosion[3]) + 1) + "m" + (parseInt(explosion[2]) - 1) + "y" + explosion[1];

                    //alert(divName);


                });

            //Change textarea back to div
            $('textarea').closest('#newEdit').replaceWith('<div class ="popup-text">' + newText + '</div>');

            //Change label and popover text
            var labelName = parameters["name"].slice(0, 8) + "...";
            $('div.popover').siblings('a.label').html(labelName);
            $(this).closest('div.divLabel').children('div.content').html(newText);


            textAreaTruth = true;
        }


    });

    $('body').on("click", ".del-btn", function () {
        var parameters = {
            'name': "DELETETIME",
            'date': ($yearOnClick + "-" + $monthOnClick + "-" + $dayOnClick),
            'email': "<?php echo $userEmail; ?>",
            'tableName': "<?php echo "$userInfo->userTable"; ?>",
            'id': $ID.valueOf()
        };

        //console.log($(this).closest('div.day').val());
        console.log(parameters);

        $.ajax({
            type: "post",
            url: "project/delete.php",
            data: parameters,
            dataType: "json"
        }).always(function () {
                var date = parameters;
                var datePattern = /(201\d)-(\d?\d)-(\d?\d)/m;


                var explosion = date["date"].match(datePattern);
                console.log(explosion[3]);


                var divName = "d" + (parseInt(explosion[3]) + 1) + "m" + (parseInt(explosion[2]) - 1) + "y" + explosion[1];
                var labelName = date["name"].slice(0, 8) + "...";
                //alert(divName);

                $('body').find().remove();
                console.log("REMOVED");


            });
        $(this).closest('div.divLabel').remove();
    });


    var $ID;
    $(document).ready(function () {
        $('.label').click(function () {
            $ID = $(this).parent().parent().find(".anID").val();
        });

    });


</script>