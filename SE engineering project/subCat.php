<?php 
include "config/config.php";
include "includes/header.php";
include "classes/database.php";

$id = $_GET['cat_id'];
$subid = $_GET['subcat_id'];
$db = new Database;
$query = "SELECT * from products where category_id = $id and subCat=$subid";
$result = $db->get_query_result($query);

?> 

<!-- search bar -->
<section class="search-bar container">

<form action="search.php" class="form" method="GET">
  <input type="text" placeholder="Search..." name="name">
  <input type="submit" class='form-control btn btn-success mt-3 py-1 px-2' value="search">
  </form>
</section>
<!-- sub_Categories Section -->
<?php 
$query = "SELECT * from subcat where masterCat= $id order by name;";

$resultt = $db->get_query_result($query);

if ($resultt) :
?>
<section class="category container">
      <div class="cat-box">
            <h1 class="">SubCategories:</h1>
            <ul class='d-flex'>
            <?php 

            while ($cat = $resultt->fetch_assoc()) :
                if (isset($_GET['info'])) :
                if ($cat['id'] == $subid) :
            ?>
                
                  <li> <a href="subCat.php?cat_id=<?php echo $id; ?>&subcat_id=<?php echo $cat['id']; ?>&info=true" class="bold"><?php echo $cat['name']; ?></a></li>
                <?php else : ?>

                <li> <a href="subCat.php?cat_id=<?php echo $id; ?>&subcat_id=<?php echo $cat['id']; ?>&info=true"><?php echo $cat['name']; ?></a></li>
                <?php endif; ?>  
                <?php else :
                    if ($cat['id'] == $subid) :
                ?>
                 <li> <a href="subCat.php?cat_id=<?php echo $id; ?>&subcat_id=<?php echo $cat['id']; ?>" class="bold"><?php echo $cat['name']; ?></a></li>
                <?php else : ?>

                <li> <a href="subCat.php?cat_id=<?php echo $id; ?>&subcat_id=<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></a></li>
                <?php endif; ?> 
                <?php endif; ?>   

                <?php endwhile; ?>
            </ul>
      </div>  
</section>
            <?php endif; ?>

<!-- featured-section -->
<?php if ($result) : ?>
<section class="featured container">
    <h1>Featured Items</h1>
        <div class="products">
        <?php while ($product = $result->fetch_assoc()) :
            if (isset($_GET['info'])) :
        ?>
                 <div class="product-card">
                <a href="info.php?id=<?php echo $product['id']; ?>" >
                    <img src="<?php echo $product['image']; ?>" alt="">
                    <h1><?php echo $product['name']; ?></h1>
                </a>
            </div>
                <?php else : ?>
            <div class="product-card">
                <a href="product.php?id=<?php echo $product['id']; ?>" >
                    <img src="<?php echo $product['image']; ?>" alt="">
                    <h1><?php echo $product['name']; ?></h1>
                    <h2><?php echo $product['price']; ?> L.E</h2>
                  
                </a>
            </div>
                <?php endif; ?>
<?php endwhile; ?>
        </div>
</section>
            <?php else : ?>
            <section class="continue-shopping container">
                    <h4>no items in this category yet</h4>
                    <a href="shop.php">Return to store</a>
                </section>
            <?php endif; ?>




<?php 
include "includes/footer.php";
?>