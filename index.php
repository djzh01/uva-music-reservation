<!DOCTYPE html>
<html>

<head>
</head>

<body>


    <form action="login.php" method="post">
        <h3>Login</h3>
        Computing ID: <input type="text" name="computingid">
        Password: <input type='text' name='password'>
        <input type="Submit">
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
    </form>

    <form action="register.html" method="post">

        <input type="Submit" value="register">
    </form>




    <br /><br />
</body>

</html>