<?php
	require('dbutil.php');
	$db = DbUtil::loginConnection();

	// $loginUser = "dz8pa"; 
    // $loginPass = "carryiousgeorge1";
    // $host = "mysql01.cs.virginia.edu"; // local host
    // $schema = "dz8pa_roomreservation"; // DB Schema
    // $dsn = "mysql:host=$host;dbname=$schema";

	// try
    //   {
    //      $db = new PDO($dsn, $loginUser, $loginPass);
         
    //      // dispaly a message to let us know that we are connected to the database 
    //      echo "<p>You are connected to the database --- Yay!!</p>";
    //   }
    //   catch (PDOException $e)     // handle a PDO exception (errors thrown by the PDO library)
    //   {
    //      // Call a method from any object, use the object's name followed by -> and then method's name
    //      // All exception objects provide a getMessage() method that returns the error message 
    //      $error_message = $e->getMessage();        
    //      echo "<p>An error occurred while connecting to the database: $error_message </p>";
    //   }
    //   catch (Exception $e)       // handle any type of exception
    //   {
    //      $error_message = $e->getMessage();
    //      echo "<p>Error message: $error_message </p>";
    //   }

	echo "establish connection"
	
	// $stmt = $db->stmt_init();
	
	// if($stmt->prepare("select * from address where user like ?") or die(mysqli_error($db))) {
	// 	// if (empty($_GET['name'])) {
    //     //     $errors['name'] = '';
    //     // }
        
    //     // if (empty($_POST['email'])) {
    //     //     $errors['email'] = 'Email is required.';
    //     // }
    //     $searchString = '%' . $_GET['size'] . '%';
	// 	$stmt->bind_param("s", $searchString);
	// 	$stmt->execute();
	// 	$stmt->bind_result($ip, $user, $datetime);
	// 	echo "<table border=1><th>IP</th><th>User Agent</th><th>Date of Access</th>\n";
	// 	while($stmt->fetch()) {
	// 		echo "<tr><td>$ip</td><td>$user</td><td>$datetime</td></tr>";
	// 	}
	// 	echo "</table>";
	
	// 	$stmt->close();
	// }
	
	// $db->close();


?>
