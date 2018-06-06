<?php
    require_once "connect.php";
    session_start();

    $email=$_POST['username_email'];
    // $username=$_POST['username'];
    $password= password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql="SELECT * FROM users WHERE username='".$email."' OR email='".$email."'";
    $rez=$conn->query($sql);
    $row = $rez->fetch_assoc();
    echo print_r($row['id']);
    // if ($rez->num_rows > 0) {
    // // output data of each row
    // while($row = $rez->fetch_assoc()) {
    //     print_r($row);
    // }}
//  else {
    // echo "0 results";
// } 

    if (mysqli_num_rows($rez)==0) {
        $_SESSION['state']="EMAIL_OR_USERNAME_NOT_FOUND";
        header("Location: log-in.php");
        exit();
    }
    if (password_verify($password,$row['password'])) {
        $_SESSION['state']="INVALID_PASSWORD";
        header("Location: log-in.php");
        exit();
    }
    else{
    if (isset($_SESSION['state'])) {
        unset($_SESSION['state']);
    }
    $_SESSION['id']=$row['id'];
    // echo "<script>console.log(\"id is set id=".$row['id']."\" session_id is set \$_SESSION['id']=".$_SESSION['id'].") </script>";
    header("Location: user-page.php");
    exit();
    }