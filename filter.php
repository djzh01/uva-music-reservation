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

	$weekday = isWeekday($_GET['date']);

	$stmt = $db->prepare("SELECT room_id, start_time 
	FROM Reservation_times NATURAL JOIN Room
	WHERE weekday = '" . $weekday . "' 
	AND (room_id, start_time) NOT IN (select room_id, time FROM Reserves WHERE date= :date)" . $sizestr . $typestr);
	
	$time_stmt = $db->prepare("SELECT room_id, start_time
	FROM Reservation_times NATURAL JOIN Room
	WHERE weekday = {$weekday}" . $sizestr . $typestr);

	$stmt->bindValue(':date', $_GET['date'], PDO::PARAM_STR);

	$avail_times = [];
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
		}	
	}
	if($time_stmt) {
		$time_stmt->execute();
		while($row = $time_stmt->fetch()){
			if(array_key_exists($row[0], $avail_times)){
				array_push($avail_times[$row[0]], $row[1]);
			}
			else {
				$avail_times[$row[0]] = [$row[1]];
			}
		}
	}
	foreach ($avail_times as $room => $time_slots) {
		echo "<ul class=\"vert-btn-group\">{$room}";
		foreach ($time_slots as $time) {
			$formatted_time = date_format(date_create($time), 'g:i A');
			if(in_array($time, $times[$room])){
				echo "<li class=\"btn btn-outline-success\">
				<label  
					for=\"time{$room}{$time}\">
	
				<input id=\"time{$room}{$time}\" 
					type=\"radio\" 
					class=\"btn-check\" 
					value=\"{$room},{$time},{$_GET['date']}\" 
					name=\"times\">{$formatted_time}</label>
				</li>";
			}
			else{
				echo "<li class=\"btn disabled\">
				<label class=\"\" 
					for=\"time{$room}{$time}\">
	
				<input id=\"time{$room}{$time}\" 
					type=\"radio\" 
					class=\"btn-check disabled\" 
					value=\"{$room},{$time},{$_GET['date']}\" 
					name=\"times\" disabled=\"disabled\">{$formatted_time}</label>
				</li>";
			}
		}
		echo "</ul>";
	}
	// foreach ($times as $room => $time_slots) {
	// 	echo "<ul>{$room}";
	// 	foreach ($time_slots as $time) {
	// 		$formatted_time = date_format(date_create($time), 'g:i A');

	// 		echo "<li>
	// 		<label class=\"btn btn-outline-success\" 
	// 			for=\"time{$room}{$time}\">

	// 		<input id=\"time{$room}{$time}\" 
	// 			type=\"radio\" 
	// 			class=\"btn-check\" 
	// 			value=\"{$room},{$time},{$_GET['date']}\" 
	// 			name=\"times\">{$formatted_time}</label>
	// 		</li>";
	// 	}
	// 	echo "</ul>";
	// }

	echo '<script>',
	'createactivation()',
	  '</script>';
	// print_r($times);
	// onclick=\"confirmReservation()\"


	


	

?>
