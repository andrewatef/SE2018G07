<?php 
include "config/config.php";

include "classes/database.php";
$db = new Database;
$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");

$query = "SELECT * from customers where email='$email' and password ='$password'";

$result = $db->get_query_result($query);

if ($result) {
    $user = $result->fetch_assoc();
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $email;
    $_SESSION['login'] = true;
    $_SESSION['uId'] = $user['id'];

    header("Location:index.php");
} else {
    header("Location:login.php?info=false&email=$email");
}


