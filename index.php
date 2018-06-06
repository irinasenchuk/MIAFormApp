<?php
if(isset($_GET['status']))
{    header("Location: 404.html");
        exit;    
}

    header("Location: db/log-in.php");
    exit;