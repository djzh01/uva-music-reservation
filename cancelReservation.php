<?php
    session_start();
    ob_start();
    require('dbutil.php');
	$db = DbUtil::loginConnection();

    if (isset($_SESSION['id'])) {
        
        foreach ($_POST['reservation'] as $reservation) {
            $vars = explode(',', $reservation);
            $sql = "DELETE FROM Reserves WHERE computing_id='{$_SESSION['id']}' AND date='{$vars[0]}' AND room_id='{$vars[1]}' AND time='{$vars[2]}'";
            echo $sql;
            $stmt = $db->prepare($sql);
            if($stmt){
                $stmt->execute();
                echo 'success';
            }
        }
        
        
        
    }
    // Check if logging out
    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: index.php");
    }
    header("location: userreservations.php");
    
?>