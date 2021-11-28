<?php 
    
    session_start();
    echo $_SESSION['id'];
    // echo "\n";
    //echo $_SESSION['fname'];
    // echo "\n";
    //echo $_SESSION['lname'];
    // echo "\n";
    //echo $_SESSION['role'];

  ?>

<!DOCTYPE html>

<html>

<head>
    <script src="https://kit.fontawesome.com/363dc62d4f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="app.css" rel="stylesheet">
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="js/calendar.js"></script>
    <script src="js/buttons.js"></script>

    <title>UVA Practice Room Reservation</title>
    <script>
        $(document).ready(function () {
            $(".roomFilter").change(function () {
                var formData = {
                    size: $("input[name='size']:checked").val(),
                    type: $("input[name='type']:checked").val(),
                    date: $("input[name='date']:checked").val(),

                };
                // console.log(formData.size, formData.type, formData.date);
                $.ajax({
                    url: 'filter.php',
                    data: formData,
                    success: function (data) {
                        $('#availRooms').html(data);

                    }
                });
            });
        });
        $(document).ready(function () {
            $(".makeReservation").click(function () {
                var formData = {
                    time: $("input[name='times']:checked").val(),
                };
                console.log(formData.time);
                $.ajax({
                    url: 'makeReservation.php',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        $('#placeholder').html(data);

                    }
                });
            });

        });
    </script>
</head>

<body>
    <div class="row">
        <form action="filter.php" method="get" class="roomFilter col-12 col-xl-6">
            <div id="main">
                <div class="jumbotron">
                    <h1 class="text-center">
                        <a id="left">
                            <i class="fa fa-chevron-left">
                            </i>
                        </a>
                        <span id="month-changer">
                            <span>&nbsp;</span>
                            <span id="month"></span>
                            <span>&nbsp;</span>
                            <span id="year"> </span>
                            <span>&nbsp;</span>
                        </span>
                        <a id="right">
                            <i class="fa fa-chevron-right"> </i>
                        </a>
                    </h1>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-offset-1">
                        <table class="table btn-group"></table>
                    </div>
                </div>
            </div>
        </form>

        <div class="col-12 col-xl-6 pt-4">
            <form action="filter.php" method="get" class="roomFilter">
                <div class="row mb-3">
                    <h3 class="col-6 text-center">Room Size</h3>
                    <h3 class="col-6 text-center">Room Type</h3>
                </div>
                <div class="row">
                    <div class=" col-6 btn-group btn-group-toggle" data-toggle="buttons">
                        <label for="small" class="btn btn-outline-success">
                            <input id="small" type="radio" class="btn-check" value="small" name="size"
                                autocomplete="off" />
                            Small
                        </label>
                        <label for="large" class="btn btn-outline-success">
                            <input id="large" type="radio" class="btn-check" value="large" name="size"
                                autocomplete="off" />
                            Large
                        </label>
                        <label for="nosize" class="btn btn-outline-success active">
                            <input id="nosize" type="radio" class="btn-check" value="nopref" name="size"
                                autocomplete="off" checked aria-pressed="true" />
                            No Preference
                        </label>
                    </div>
                    <br>
                    <div class="col-6 btn-group btn-group-toggle" data-toggle="buttons">
                        <label for="grand" class="btn btn-outline-success">
                            <input id="grand" type="radio" class="btn-check" value="grand" name="type"
                                autocomplete="off" />
                            Grand Piano
                        </label>
                        <label for="upright" class="btn btn-outline-success">
                            <input id="upright" type="radio" class="btn-check" value="upright" name="type"
                                autocomplete="off" />
                            Upright Piano
                        </label>
                        <label for="Digital" class="btn btn-outline-success">
                            <input id="Digital" type="radio" class="btn-check" value="digital grand" name="type"
                                autocomplete="off" />
                            Digital Piano
                        </label>
                        <label for="Harp" class="btn btn-outline-success">
                            <input id="Harp" type="radio" class="btn-check" value="harp" name="type"
                                autocomplete="off" />
                            Harp
                        </label>
                        <label for="notype" class="btn btn-outline-success active">
                            <input id="notype" type="radio" class="btn-check" value="nopref" name="type"
                                autocomplete="off" checked aria-pressed="true" />
                            No Preference
                        </label>
                    </div>
                </div>
            </form>
            <form action="makeReservation.php" method="post" class="makeReservation">
                <h1 class="text-center mt-3">Rooms</h1>
                <div id="availRooms" class="rooms"></div>
            </form>
            <div id="placeholder">sda</div>
        </div>
    </div>
</body>

</html>
