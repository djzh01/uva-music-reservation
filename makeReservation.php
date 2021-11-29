<?php
    session_start();

    require('dbutil.php');
    $db = DbUtil::loginConnection();

    $vars = explode(',', $_POST['time']);

    $stmt = $db->prepare("INSERT INTO Reserves (computing_id, room_id, time, date)
                            VALUES ({$_SESSION['id']}, {$vars[0]}, {$vars[1]}, {$vars[2]});");

    // echo "INSERT INTO Reserves (computing_id, room_id, time, date)
    // VALUES ({$_SESSION['id']}, {$vars[0]}, {$vars[1]}, {$vars[2]});";

    // if($stmt) {
	// 	$stmt->execute();
    // }
?>