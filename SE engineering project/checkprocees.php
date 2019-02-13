<?php 

include "config/config.php";
include "classes/database.php";

$db = new Database;
if (isset($_SESSION['uId'])) :
    $id = $_SESSION['uId'];
endif;
$name = filter_input(INPUT_POST, "firstname");
$address = filter_input(INPUT_POST, "address");
$city = filter_input(INPUT_POST, "city");
$cardnumber = filter_input(INPUT_POST, "cardnumber");
$cvv = filter_input(INPUT_POST, "cvv");



$query = "INSERT into orders (user_id ,name,address,city,credit_card_no,cvv)
Values ($id,'$name','$address','$city','$cardnumber','$cvv')";
$db->insert_query($query);
header("Location:index.php?checkout=true");

?>