<?php
	require('dbutil.php');
	$db = DbUtil::loginConnection();
	
	$stmt = $db->prepare("select room_id from Room where size = ? and type = ?");
	if($stmt) {
		$stmt->execute([$_GET['size'], $_GET['type']]);
		while($row = $stmt->fetch()){
			echo "<p>{$row[0]}</p>";
		}
	// 	// if (empty($_GET['name'])) {
    //     //     $errors['name'] = '';
    //     // }
        
    //     // if (empty($_POST['email'])) {
    //     //     $errors['email'] = 'Email is required.';
    //     // }
        $searchString = '%' . $_GET['size'] . '%';
	// 	$stmt->bind_param("s", $searchString);
	// 	$stmt->execute();
	// 	$stmt->bind_result($ip, $user, $datetime);
	// 	echo "<table border=1><th>IP</th><th>User Agent</th><th>Date of Access</th>\n";
	// 	while($stmt->fetch()) {
	// 		echo "<tr><td>$ip</td><td>$user</td><td>$datetime</td></tr>";
	// 	}
	// 	echo "</table>";
	
	}


?>
