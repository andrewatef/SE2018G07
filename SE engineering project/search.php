<?php 
include "config/config.php";
include "includes/header.php";
include "classes/database.php";

$db = new Database;
$name = $_GET['name'];

$query = "SELECT * from products where name  like'%$name%' order by id desc ";
$result = $db->get_query_result($query);

?>

<!-- search bar -->
<section class="search-bar container">

<form action="search.php" class="form" method="GET">
  <input type="text" placeholder="Search..." name="name">
  <input type="submit" class='form-control btn btn-success mt-3 py-1 px-2' value="search">
  </form>
</section>



<!-- featured-section -->
<section class="featured container">
        <h1>Search Results</h1>
        <div class="products">
        <?php while ($product = $result->fetch_assoc()) : ?>
            <div class="product-card">
                <a href="product.php?id=<?php echo $product['id']; ?>" >
                    <img src="<?php echo $product['image']; ?>" alt="">
                    <h1><?php echo $product['name']; ?></h1>
                    <h2><?php echo $product['price']; ?> L.E</h2>
                  
                </a>
            </div>
<?php endwhile; ?>
        </div>
</section>




<?php 
include "includes/footer.php";
?>