<?php
    session_start();
    ob_start();
    require('dbutil.php');
	$db = DbUtil::loginConnection();

    $con = new mysqli('mysql01.cs.virginia.edu', 'dz8pa', 'carryiousgeorge1', 'dz8pa_roomreservation');

    $password = sha1($_POST['password']);
    $cid = $_POST['computingid'];
    $stmt = $db->prepare("SELECT * FROM User WHERE computing_id = ? AND password=?");
    $stmt2 = $db->prepare("SELECT * FROM User WHERE computing_id = ?");

    if($stmt) {
		$stmt->execute([$cid, $password]);
    }
    if($stmt2) {
		$stmt2->execute([$cid]);
    }
    
    if($stmt->rowCount() == 1) {    // If username and password are both correct

        
        // $bid = $_POST['computingid'];
        // $_SESSION['logged']=true;
        // $_SESSION['id']=$_POST['computingid'];
        // $_SESSION['fname']=$_POST['firstname'];
        // $_SESSION['lname']=$_POST['lastname'];
        // $_SESSION['role']=$_POST['role'];
        // $_SESSION['password']=$_POST['password'];
        while ($row=$stmt->fetch()) {
            $_SESSION['id']=$row['computing_id'];
            $_SESSION['password']=$row['password'];
            $_SESSION['fname']=$row['first_name'];
            $_SESSION['lname']=$row['last_name'];
            $_SESSION['role']=$row['role'];
        }
        
        if($_SESSION['role'] == "Admin"){
            header("Location: reservation.php");
            exit;
        }
        else{
            header("Location: reservation.php");
            exit;
        }
        
    } 
    else if ($stmt2->rowCount() == 1) {     // If username is correct, but password is wrong
        header("Location: index.php?error=Incorrect ID or Password");
    } else {    // If username doesn't exist in database
        header("Location: index.php?error=Computing ID not found");
        exit;
    }

?>