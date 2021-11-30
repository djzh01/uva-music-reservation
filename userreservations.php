<?php
session_start();
require('dbutil.php');
$db = DbUtil::loginConnection();

if (isset($_SESSION['id'])) {
    $stmt = $db->prepare("SELECT DISTINCT room_id, date, time FROM Reserves WHERE computing_id = ? ORDER BY room_id, time");
    $reservations = [];
    if ($stmt) {
        $stmt->execute([$_SESSION['id']]);
        while ($row=$stmt->fetch()) {
            if(array_key_exists($row[1], $reservations)){
				array_push($reservations[$row[1]], [$row[0], $row[2]]);
			}
			else {
				$reservations[$row[1]] = [[$row[0], $row[2]]];
			}
        }
    }
}
else{
    echo 'Please log in to see reservation times.';
}
// Check if logging out
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
}

?>

<!DOCTYPE html>

<html>

<head>
    <script src="https://kit.fontawesome.com/363dc62d4f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="app.css" rel="stylesheet">
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>

    <title>UVA Practice Room Reservation</title>
</head>

<body>
<nav class="navbar fixed-top navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="https://music.virginia.edu/">UVA Music</a>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php if(isset($_SESSION['id'])) : ?>
                    <li class="nav-item"><a class="nav-link" href="">Welcome<?php echo ', ' . $_SESSION['fname']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="reservation.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="userreservations.php">My Reservations</a></li>
                <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="reservation.php?logout=true">Logout</a></li>
                <?php endif;?>
                <?php if(!isset($_SESSION['id'])) : ?>
                <li class="nav-item active"><a class="nav-link" href="index.php">Login/Register</a></li>
                <?php endif;?>
            </ul>
        </div>
    </nav>
    <div>
        <?php 
            foreach($reservations as $date => $info){
                echo "<ul>{$date}";
                foreach ($info as $roomtime) {
                    echo "<li>
                            Room: {$roomtime[0]} <br> Time: {$roomtime[1]} </li>";
                }
                echo '</ul>';
            }
        ?>
    </div>
</body>

</html>