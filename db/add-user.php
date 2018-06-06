<?php
require_once "connect.php";
session_start();


$email=$_POST['email'];
$username=$_POST['username'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$password= password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql="SELECT * FROM users WHERE email='".$email."'";
if (mysqli_num_rows($conn->query($sql)) != 0) {
    $_SESSION['state']="EMAIL_ALREADY_EXIST";
    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';
    header('Location: sign-up.php');
    exit();
}

$sql="SELECT * FROM users WHERE username='".$username."'";
if (mysqli_num_rows($conn->query($sql)) != 0) {
    $_SESSION['state']="USERNAME_ALREADY_EXIST";
    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';
    header('Location: sign-up.php');
    exit();
}

else{

    if (isset($_SESSION['state'])) {
        unset($_SESSION['state']);
    }
$sql="INSERT INTO users (email, username, name, surname, password) VALUES ('".$email."', '".$username."', '".$name."', '".$surname."', '".$password."')";
if ($conn->query($sql)===TRUE) {
    echo "<script>console.log('User added)'</script>";
    $sql="SELECT * FROM users WHERE email='$email'";
    $rez=$conn->query($sql);
    while($row=mysqli_fetch_assoc($rez))
    $_SESSION['id']= $row['id'];
}
else echo mysqli_error($conn);
}
mysqli_close($conn);
header("Location: user-page.php");