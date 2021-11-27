<?php 
    
    session_start();
    echo $_SESSION['id'];
    echo "\n";
    //echo $_SESSION['fname'];
    echo "\n";
    //echo $_SESSION['lname'];
    echo "\n";
    //echo $_SESSION['role'];

  ?>

<!DOCTYPE html>

<html>
<head>
    <script src="https://kit.fontawesome.com/363dc62d4f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="calendar.css" rel="stylesheet">
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="js/calendar.js"></script>

    <title>UVA Practice Room Reservation</title>
	<script>
	$(document).ready(function() {
		$( "#roomFilter" ).change(function() {
            var formData = {
                size: $( "input[name='size']:checked" ).val(),
                type: $( "input[name='type']:checked" ).val(),
            };
            console.log(formData.size, formData.type);
			$.ajax({
				url: 'filter.php', 
				data: formData,
				success: function(data){
					$('#availRooms').html(data);	
				
				}
			});
		});
		
	});
	</script>
</head>


<body>
    <div class="container" id="main">
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
                <table class="table"></table>
            </div>
        </div>
    </div>

    <form action="filter.php" method="get" id="roomFilter"> 
        <h3>Room Size</h3>
	    <input id="small" type="radio" value="small" name="size"/>
        <label for="small">Small</label><br>
	    <input id="large" type="radio" value="large" name="size"/>
        <label for="large">Large</label><br>
	    <input id="nosize" type="radio" value="nopref" name="size"/>
        <label for="nosize">No Preference</label><br>

        <br>
        <h3>Room Type</h3>
        <input id="grand" type="radio" value="grand" name="type"/>
        <label for="grand">Grand Piano</label><br>
        <input id="upright" type="radio" value="upright" name="type"/>
        <label for="upright">Upright Piano</label><br>
        <input id="Digital" type="radio" value="digital grand" name="type"/>
        <label for="Digital">Digital Piano</label><br>
        <input id="Harp" type="radio" value="harp" name="type"/>
        <label for="Harp">Harp</label><br>
        <input id="notype" type="radio" value="nopref" name="type"/>
        <label for="notype">No Preference</label><br>
    </form>
    <h1>Rooms</h1>
	<p id="availRooms"></p>

	<br/><br/>
    
    

</body>
</html>
