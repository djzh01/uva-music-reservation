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
        <style>
            body {
                margin: 50px;
            }

            .form-control{
                box-shadow: none;
                border-color: #BA68C8;
            }

            .profile-button:hover {
                background: #682773
            }

            .profile-button:focus {
                background: #682773;
                box-shadow: none
            }

            .profile-button:active {
                background: #682773;
                box-shadow: none
            }
        </style>
        <script src="https://kit.fontawesome.com/363dc62d4f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>

        <title>Profile</title>
    </head>

    <body style="margin: 50px;">
        <nav class="navbar fixed-top navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="https://music.virginia.edu/">UVA Music</a>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php if(isset($_SESSION['id'])) : ?>
                        <li class="nav-item"><a class="nav-link" href="">Welcome, <?php echo $_SESSION['fname']; ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="reservation.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="userreservations.php">My Reservations</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="reservation.php?logout=true">Logout</a></li>
                    <?php endif;?>
                    <?php if(!isset($_SESSION['id'])) : ?>
                    <li class="nav-item active"><a class="nav-link" href="index.php">Login/Register</a></li>
                    <?php endif;?>
                </ul>
            </div>
        </nav>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        <span class="font-weight-bold"><?php echo $_SESSION['fname']; ?> <?php echo $_SESSION['lname']; ?></span>
                        <span class="text-black-50"><?php echo $_SESSION['id']; ?>@virginia.edu</span>
                        <span> </span>
                    </div>
                </div>
                <form action="updateProfile.php" method="post" class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="fname" placeholder="first name" value="">
                        </div>
                            <div class="col-md-6"><label>Last Name</label><input type="text" name="lname" class="form-control" value="" placeholder="last name"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label>Computing ID</label><input type="text" name="cid" class="form-control" placeholder="ejs3an" value=""></div>
                            <div class="col-md-12"><label>Role</label><input type="text" name="role" class="form-control" placeholder="Student" value=""></div>
                            <div class="col-md-12"><label>Password</label><input type="password" name="password" class="form-control" placeholder="Password"></div>
                            <div class="col-md-12"><label>Music Classes</label><input type="text" name="classes" class="form-control" placeholder="MUPF 3140" value=""></div>
                        </div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="Submit">Save Profile</button></div>
                </form>
                <div class="col-md-4">
                    <div class="=-3 py-5">
                        <div class="d-flex justify-content-between align-items-center experience">
                            <h5>Upcoming Reservations</h5>
                        </div>
                        <div class="col-md-12">
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
                    </div>
                </div>
            </div>

        </div>
        
    </body>
</html>