<?php
    echo $_POST['time'];

    require('dbutil.php');
    $db = DbUtil::loginConnection();

    // $stmt = $db->prepare("INSERT INTO Reserves (computing_id, room_id, time, date)
    //                         VALUES ();");
?>