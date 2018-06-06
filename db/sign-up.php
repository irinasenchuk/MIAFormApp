<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
</head>
<body>

    <?php 
    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';
    ?>
    <form action="add-user.php" method="post"> <br>
        <?php
        if(isset($_SESSION['state']))
           {
               echo "<div style=\"color:red\">";
               if ($_SESSION['state']==="EMAIL_ALREADY_EXIST") {
                   echo "There is account with this e-mail";
               }
               if ($_SESSION['state']==="USERNAME_ALREADY_EXIST") {
                echo "There is account with this username";
            }
            
               echo "</div>";
           } 
        ?>

        E-mail:<input type="email" name="email" ><br>
        Username:<input type="text" name="username" ><br>
        Name:<input type="text" name="name" ><br>
        Surname:<input type="text" name="surname" ><br>
        Password:<input type="password" name="password" ><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>