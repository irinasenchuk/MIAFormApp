<?php
$conn = new mysqli('localhost', 'root', '','formAppDatabase');
if ($conn->connect_error) {
    die("Connection failed:".$conn->connect_error);
}
else echo "<script>console.log('Connected to formAppDatabase');</script>";


// $email="aa";
// $username="ss";
// $name="cc";
// $surname="dd";
// $passwordWithoutHash="asdasdsa";
// $password= password_hash("asdasdsa", PASSWORD_BCRYPT);

// public function add-user($email: string)
// {
//     # code...
// }