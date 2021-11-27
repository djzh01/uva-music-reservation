<?php
    ob_start();
	echo "IM IN";
    require('dbutil.php');
	$db = DbUtil::loginConnection();

    $con = new mysqli('mysql01.cs.virginia.edu', 'dz8pa', 'carryiousgeorge1', 'dz8pa_roomreservation');

   
    $result = $con->query("SELECT computing_id FROM User WHERE computing_id = '$_POST[computingid]'");
    
    if($result->num_rows == 0) {
        $sql="INSERT INTO User (computing_id, first_name, last_name, role)
        VALUES
        ('$_POST[computingid]','$_POST[firstname]','$_POST[lastname]','$_POST[role]')";
        $con->query($sql);

        header("Location: http://localhost/uva-music-reservation/login.html");
        exit;
        //header("Location: http://localhost/uva-music-reservation/login.html");
        //exit;
    } else {
        echo "username already exists";
    }
    //if (!mysqli_query($con,$sql))
    //{
       
    //die('Error: ' . mysqli_error($con));
    //}

    //echo "1 record added"; // Output to user
    //session_start();

    /*$computing_id = 'testid';
    $name = 'TESTname';
    $last = 'TestLast';
    $role = 'TestStudent';
    $stmt = $db->prepare('INSERT INTO `User` (`computing_id`, `first_name`, `last_name`, `role`) VALUES (?,?,?,?)');


    $stmt->execute(array($computing_id, $name, $last, $role));

    if($stmt){
        echo "Success";
    }
    else{
        echo "Error";
    }*/


?>

<!DOCTYPE html>

<html>
<body>


        <form action="register.html" method="post">
            
            <input type="Submit" value = "back to register">
            </form>

            <form action="login.html" method="post">
            
            <input type="Submit" value = "back to login">
            </form>


	<br/><br/>
</body>
</html>