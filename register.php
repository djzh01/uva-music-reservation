<?php
    ob_start();
	echo "IM IN";
    require('dbutil.php');
	$db = DbUtil::loginConnection();

    $con = new mysqli('mysql01.cs.virginia.edu', 'dz8pa', 'carryiousgeorge1', 'dz8pa_roomreservation');

   
    $result = $con->query("SELECT computing_id FROM User WHERE computing_id = '$_POST[computingid]'");
    
    if($result->num_rows == 0) {
        $hashed_pass = sha1($_POST['password']);
        $sql="INSERT INTO User (computing_id, first_name, last_name, role, password)
        VALUES
        ('$_POST[computingid]','$_POST[firstname]','$_POST[lastname]','$_POST[role]','$hashed_pass')";
        // $con->query($sql);

        if (!mysqli_query($con,$sql)) {
            die('Error: ' . mysqli_error($con));
        }

        header("Location: index.php");
        exit;

    } else {
        echo "username already exists";
    }
    

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