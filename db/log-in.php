<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php 
        var_dump($_SESSION);
    ?>
    
    <form action="login-user.php" method="post">
        <?php
            if (isset($_SESSION['state'])) {
                if ($_SESSION['state']==="EMAIL_OR_USERNAME_NOT_FOUND") {
                    echo '<div style="color: red">Invalid email or username</div>';
                }
            }
            
            if (isset($_SESSION['state'])) {
                if ($_SESSION['state']==="INVALID_PASSWORD") {
                    echo '<div stle="color: red">Invalid password</div>';
                }
            }
        ?>
        Username or Email: <input type="text" name="username_email"> <br>
        Password: <input type="password" name="password"> <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>