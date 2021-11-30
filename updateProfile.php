<?php
    session_start();
    ob_start();
    require('dbutil.php');
	$db = DbUtil::loginConnection();

    $con = new mysqli('mysql01.cs.virginia.edu', 'dz8pa', 'carryiousgeorge1', 'dz8pa_roomreservation');
    echo $_SESSION['id'];
    
    if(isset($_POST['fname'])) {
        echo "HELLO I AM HERE";
        $sql = "UPDATE User SET first_name ='$_POST[fname]' WHERE User.computing_id = '$_SESSION['id']';";
        echo "Got past SQL statement";
        if (!mysqli_query($con,$sql)) {
            die('Error: ' . mysqli_error($con));
        }
        header("Location: profile.php");
    }
?>