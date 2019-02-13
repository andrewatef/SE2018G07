<?php 
include "config/config.php";
include "includes/header.php";
include "classes/database.php";

$db = new Database;
$id = $_GET['id'];
$query = "SELECT * from products where id=$id order by id desc limit 4";
$result = $db->get_query_result($query);
$product = $result->fetch_assoc();

?>
<section class="container">
    <section class="uses">
        <h1> <?php echo $product['name']; ?> Uses</h1>
        <p class="lead"> <?php echo $product['uses']; ?> </p>
    </section>
     <section class="side_effects">
        <h1> <?php echo $product['name']; ?> Side Effects</h1>
        <p class="lead"> <?php echo $product['side_effects']; ?> </p>
    </section>
    
            <a href="product.php?id=<?php echo $product['id']; ?>" class="buy btn btn-primary ">Buy</a>
</section>



<?php 
include "includes/footer.php";
?>