<?php
    session_start();

    require('dbutil.php');
    $db = DbUtil::loginConnection();

    $vars = explode(',', $_POST['time']);
    $con = new mysqli('mysql01.cs.virginia.edu', 'dz8pa', 'carryiousgeorge1', 'dz8pa_roomreservation');

    // $result = $con->query("INSERT INTO Reserves (computing_id, room_id, time, date)
    //                         VALUES ({$_SESSION['id']}, {$vars[0]}, {$vars[1]}, {$vars[2]});");
    echo "asdf".$vars;
    $sql = "INSERT INTO Reserves (computing_id, room_id, time, date)
            VALUES ('{$_SESSION['id']}', '{$vars[0]}', '{$vars[1]}', '{$vars[2]}');";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
    }
    
    header("Refresh:0; Location: reservation.php");
    mysqli_close($con);
?>