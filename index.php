<!DOCTYPE html>
<html>

<head>
<script src="https://kit.fontawesome.com/363dc62d4f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>

<body>

<div class="container">
    <form action="login.php" method="post" class="row justify-content-center">
        <h1 class="col-6 text-center">Login</h1>
        <div class="w-100"></div>
        <h4 class="col-6 text-left">Computing ID:</h3> 
        <div class="w-100"></div>
        <input class="col-6" type="text" name="computingid">
        <div class="w-100"></div>
        <h4 class="col-6 text-left">Password:</h3>
        <div class="w-100"></div>
        <input class="col-6" type='password' name='password'>
        <div class="w-100"></div>
        <input class="col-6" type="Submit">
        <div class="w-100"></div>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
    </form>

    <form action="register.html" method="post" class="row justify-content-center">

        <input class="col-6" type="Submit" value="register">
    </form>
    </div>



    <br /><br />
</body>

</html>