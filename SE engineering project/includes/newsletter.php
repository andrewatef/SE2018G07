<?php 
include "../config/config.php";
include "../classes/database.php";

$db = new Database();

(isset($_POST['email'])) ? $email = filter_input(INPUT_POST, "email") : $email = null;

$query = "SELECT * from newsletter where email='$email'";
$result = $db->get_query_result($query);

if (!$result) {
    $query = "INSERT into newsletter (email) values('$email')";
    $db->insert_query($query);
    header("Location:../index.php?news=Subscribed Successfuly");

} else {
    header("Location:../index.php?news=already Subscribed");
}
?>