<?php 
include "../config/config.php";
include "../classes/database.php";

$db = new Database;

$Username = $_POST['Username'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];
// echo $Password;
(isset($_POST['cp'])) ? $cp = $_POST['cp'] : $cp = 0;

if ($Password != $cp) {
    header("Location:../register.php?status='Please check your Password'&email=$Email &username=$Username");


} else {
    $query = "SELECT * from customers where email = '$Email' ";
    $result = $db->get_query_result($query);
    if ($result) {
        header("Location:../register.php?status='This email is already registerd'&email=$Email &username=$Username");
    } else {
        $query = "INSERT into customers(email,password,username) values('$Email','$Password','$Username')";
        $db->insert_query($query);
        $query = "SELECT * from customers where email = '$Email' ";
        $result = $db->get_query_result($query);
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $Email;
        $_SESSION['login'] = true;
        $_SESSION['uId'] = $user['id'];

        header("Location:../index.php");
    }
}

?>
