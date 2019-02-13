<?php 
include "../config/config.php";
include "../classes/database.php";

$db = new Database;

$id = $_GET['id'];
$query = "SELECT * FROM comments  join customers on comments.user_id = customers.id where comment_product_id=$id  and comment_status='show' ; ";
$result = $db->get_query_result($query);
$comments = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($comments);
?>
