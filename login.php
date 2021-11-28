<?php
    ob_start();
	echo "IM IN";
    require('dbutil.php');
	$db = DbUtil::loginConnection();

    $con = new mysqli('mysql01.cs.virginia.edu', 'dz8pa', 'carryiousgeorge1', 'dz8pa_roomreservation');

    //$sql="INSERT IGNORE INTO User (computing_id, first_name, last_name, role)
    //VALUES
    //('$_POST[computingid]','$_POST[firstname]','$_POST[lastname]','$_POST[role]')";

   
    $result = $con->query("SELECT computing_id FROM User WHERE computing_id = '$_POST[computingid]'");
    
    if($result->num_rows == 0) {
        echo "username not found";
        header("Location: index.php?error=Computing ID not found");
        exit;
    } else {

    //if (!mysqli_query($con,$sql))
    //{
       
    //die('Error: ' . mysqli_error($con));
    //}

    //echo "1 record added"; // Output to user
    //session_start();
    session_start();
        $id = $_POST['computingid'];
        $_SESSION['logged']=true;
        $_SESSION['id']=$_POST['computingid'];
        //$_SESSION['fname']=$_POST[firstname];
        //$_SESSION['lname']=$_POST[lastname];
        //$_SESSION['role']=$_POST[role];
        //echo $_SESSION['id'];
        //echo "<script type='text/javascript'> document.location = 'http://localhost/uva-music-reservation/checklogin.php'; </script>";
        header("Location: reservation.php");
        exit;
    }
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