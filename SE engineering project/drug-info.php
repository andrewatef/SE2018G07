<?php 
include "config/config.php";
include "includes/header.php";
include "classes/database.php";

$db = new Database;
$query = "SELECT * from products order by id desc limit 4";
$result = $db->get_query_result($query);

?>

<!-- search bar -->
<section class="search-bar container">
<i class="fas fa-search"></i>
<form action="search.php" class="form">
  <input type="text" placeholder="Search..." name="name">
  <input type="submit" class='form-control btn btn-success mt-3 py-1 px-2' value="search">
  </form>
</section>

<!-- Categories Section -->
<section class="category container">
      <div class="cat-box">
            <h1 class="">Categories:</h1>
            <ul class='d-flex'>
            <?php 
            $query = "SELECT * from categories order by name;";
            $resultt = $db->get_query_result($query);
            while ($cat = $resultt->fetch_assoc()) :
            ?>
                <li> <a href="cat.php?id=<?php echo $cat['id']; ?>&info=true"><?php echo $cat['name']; ?></a></li>
            <?php endwhile; ?>
            </ul>
      </div>  
</section>

<!-- featured-section -->
<section class="featured container">
        <h1>Featured Items</h1>
        <div class="products">
        <?php while ($product = $result->fetch_assoc()) : ?>
            <div class="product-card">
                <a href="info.php?id=<?php echo $product['id']; ?>" >
                    <img src="<?php echo $product['image']; ?>" alt="">
                    <h1><?php echo $product['name']; ?></h1>
                </a>
            </div>
<?php endwhile; ?>
        </div>
</section>




<?php 
include "includes/footer.php";
?>