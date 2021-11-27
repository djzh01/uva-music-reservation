<?php
    echo "Test if enter";

	require('dbutil.php');
    $db = DbUtil::loginConnection();
	

	$sql = "SELECT room_id FROM Room";
	$result = $db->prepare($sql);
    

    while($row = $result->fetch()){
        echo "<p>{$row[0]}</p>";
    }
		/*while($row = $result->fetch()) {
            echo "built diff";
		  //echo "room_id: " . $row["room_id"]. "<br>";
          echo "<p>{$row['room_id']}</p>";
        }*/
	  
      
?>