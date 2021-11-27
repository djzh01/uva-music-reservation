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

	echo "SELECT room_id, start_time 
	FROM Reservation_times NATURAL JOIN Room
	WHERE weekday = '" . isWeekday($_GET['date']) . "' 
	AND (room_id, start_time) NOT IN (select room_id, time FROM Reserves WHERE date= :date)" . $sizestr . $typestr;

	echo "<br>";
	$previous = -1;
	if($stmt) {
		$stmt->execute();
		while($row = $stmt->fetch()){
			if($row[0] == $previous){
				echo "{$row[1]} ";
				$previous = $row[0];
			}
			else{
				echo "<br>";
				echo "{$row[0]}, {$row[1]} ";
				$previous = $row[0];
			}
		}	
	}



	

?>
