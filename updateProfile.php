<?php
    session_start();
    ob_start();
    require('dbutil.php');
	$db = DbUtil::loginConnection();

    $con = new mysqli('mysql01.cs.virginia.edu', 'dz8pa', 'carryiousgeorge1', 'dz8pa_roomreservation');
    
    // // For first name
    // if(isset($_POST['fname']) and $_POST['fname'] != $_SESSION['fname']) {
    //     $sql = "UPDATE User SET first_name ='$_POST[fname]' WHERE User.computing_id = '$_SESSION[id]';";
    //     $_SESSION['fname']=$_POST['fname'];
    //     if (!mysqli_query($con,$sql)) {
    //         die('Error: ' . mysqli_error($con));
    //     }
    //     header("Location: profile.php");
    // }

    // // For last name
    // if(isset($_POST['lname']) and $_POST['lname'] != $_SESSION['lname']) {
    //     $sql = "UPDATE User SET last_name ='$_POST[lname]' WHERE User.computing_id = '$_SESSION[id]';";
    //     $_SESSION['lname']=$_POST['lname'];
    //     if (!mysqli_query($con,$sql)) {
    //         die('Error: ' . mysqli_error($con));
    //     }
    //     header("Location: profile.php");
    // }

    // For password
    if(isset($_POST['newpass'])) {
        $currpass = sha1($_POST['oldpass']);
        if ($currpass != "da39a3ee5e6b4b0d3255bfef95601890afd80709") {
            $oldpassword = $_SESSION['password'];
            if ($currpass == $oldpassword) {
                $hashed_pass = sha1($_POST['newpass']);
                $sql = "UPDATE User SET User.password ='$hashed_pass' WHERE User.computing_id = '$_SESSION[id]';";
                $_SESSION['password']=$hashed_pass;
                if (!mysqli_query($con,$sql)) {
                    die('Error: ' . mysqli_error($con));
                }
            } else {
                echo "<script>alert('You entered the wrong password.')</script>";
                echo "<a style='font-size: 100px; text-align: center; padding: 20px;'  href='profile.php'>Go back to Profile page</a>";
            }
        } else {
            echo "<script>alert('Please enter your current password.')</script>";
            echo "<a style='font-size: 100px; text-align: center; padding: 20px;'  href='profile.php'>Go back to Profile page</a>";
        }
        // header("Location: profile.php");
    }
    mysqli_close($con);
?>