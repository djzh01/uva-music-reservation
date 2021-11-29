<?php
    session_start();
    ob_start();
	echo "IM IN";
    require('dbutil.php');
	$db = DbUtil::loginConnection();

    $con = new mysqli('mysql01.cs.virginia.edu', 'dz8pa', 'carryiousgeorge1', 'dz8pa_roomreservation');

    $password = sha1($_POST['password']);
    $cid = $_POST['computingid'];
    $result = $con->query("SELECT * FROM User WHERE computing_id = '$cid' AND password='$password'");
    $result2 = $con->query("SELECT * FROM User WHERE computing_id = '$cid'");
    
    if($result->num_rows == 1) {    // If username and password are both correct

        
        // $bid = $_POST['computingid'];
        // $_SESSION['logged']=true;
        // $_SESSION['id']=$_POST['computingid'];
        // $_SESSION['fname']=$_POST['firstname'];
        // $_SESSION['lname']=$_POST['lastname'];
        // $_SESSION['role']=$_POST['role'];
        // $_SESSION['password']=$_POST['password'];
        while ($row=mysqli_fetch_array($result)) {
            $_SESSION['id']=$row['computing_id'];
            $_SESSION['password']=$row['password'];
            $_SESSION['fname']=$row['first_name'];
            $_SESSION['lname']=$row['last_name'];
            $_SESSION['role']=$row['role'];
        }

        header("Location: reservation.php");
        exit;
        
    } 
    else if ($result2->num_rows == 1) {     // If username is correct, but password is wrong
        echo "<h2> Invalid Username or Password <h2>";
    } else {    // If username doesn't exist in database
        echo "username not found";
        header("Location: index.php?error=Computing ID not found");
        exit;
    }

?>