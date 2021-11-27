<?php
    echo "Test if enter"; 

	require('dbutil.php');
	$db = DbUtil::loginConnection();
	

	$disp = "SELECT room_id FROM Room";
	$result = $db->prepare($disp);


		while($row = $result->fetch()) {
		  //echo "room_id: " . $row["room_id"]. "<br>";
          echo "<p>{$row[0]}</p>";
        }
	/*
		echo "<br>";
		$previous = -1;
		$first_row = true;
		$very_first = true;
		if($stmt) {
			$stmt->execute([$_GET['date']]);
			while($row = $stmt->fetch()){
				if($first_row){
					if($very_first){
						echo "{$row[0]}, ";
						$very_first = false;
					}
					echo "{$row[1]} ";
					$previous = $row[0];
					$first_row = false;
				}
				else{
					if($row[0] == $previous){
						echo "{$row[1]} ";
						$previous = $row[0];
					}
					else{
						$first_row = true;
						echo "<br>";
						echo "{$row[0]}, {$row[1]} ";
		
					}
				}
				
			}	
		}*/
      
?>

