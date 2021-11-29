<?php
	require('dbutil.php');
	$db = DbUtil::loginConnection();

	function isWeekday($date) {
		$weekDay = date('w', strtotime($date));
		if ($weekDay == 0 || $weekDay == 6) return 0;
		else {
			return 1;
		}
	}
	$sizestr = '';
	$typestr = '';

	if($_GET['size'] != 'nopref'){
		$sizestr = " AND size ='" . $_GET['size'] ."'"; 
	}
	if($_GET['type'] != 'nopref'){
		$typestr = " AND type ='" . $_GET['type'] ."'"; 
	}

	$stmt = $db->prepare("SELECT room_id, start_time 
	FROM Reservation_times NATURAL JOIN Room
	WHERE weekday = '" . isWeekday($_GET['date']) . "' 
	AND (room_id, start_time) NOT IN (select room_id, time FROM Reserves WHERE date= :date)" . $sizestr . $typestr);
	
	$stmt->bindValue(':date', $_GET['date'], PDO::PARAM_STR);

	echo "<br>";
	// $previous = -1;
	$times = [];

	if($stmt) {
		$stmt->execute();
		while($row = $stmt->fetch()){
			if(array_key_exists($row[0], $times)){
				array_push($times[$row[0]], $row[1]);
			}
			else {
				$times[$row[0]] = [$row[1]];
			}
			// if($row[0] == $previous){
			// 	echo "{$row[1]} ";
			// 	$previous = $row[0];
			// }
			// else{
			// 	echo "<br>";
			// 	echo "{$row[0]}, {$row[1]} ";
			// 	$previous = $row[0];
			// }

		}	
	}

	foreach ($times as $room => $time_slots) {
		echo "<ul>{$room}";
		foreach ($time_slots as $time) {
			echo "<li>

			<label class=\"btn btn-outline-success createRes\" 
				for=\"time{$room}{$time}\">
			<input id=\"time{$room}{$time}\" 
				type=\"radio\" 
				class=\"btn-check\" 
				value=\"{$room},{$time},{$_GET['date']}\" 
				name=\"times\">{$time}</label>
			</li>";
		}
		echo "</ul>";
	}

	echo '<script>',
	'createactivation()',
	  '</script>';
	// print_r($times);
	// onclick=\"confirmReservation()\"


	


	

?>
