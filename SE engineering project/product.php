<?php 
include "config/config.php";
include "includes/header.php";
include "classes/database.php";

(isset($_GET['id'])) ? $id = $_GET['id'] : $id = null;

$products_ids = array();


//check if add to cart is submitted
if (filter_input(INPUT_POST, 'submit')) {
    if (isset($_SESSION['shopping_cart'])) {
        //keep track of how many product in the shopping cart
        $count = count($_SESSION['shopping_cart']);

        $products_ids = array_column($_SESSION['shopping_cart'], 'id');

        if (!in_array(filter_input(INPUT_GET, 'id'), $products_ids)) {

            $_SESSION['count']++;
            $_SESSION['shopping_cart'][$count] = array(

                'id' => filter_input(INPUT_GET, "id"),
                'name' => filter_input(INPUT_POST, "name"),
                'price' => filter_input(INPUT_POST, "price"),
                'quantity' => filter_input(INPUT_POST, "quantity")

            );
        } else {//product already exists increase quantity
           
            //match array key to id of the product being aded to the cart 
            for ($i = 0; $i < count($products_ids); $i++) {
                if ($products_ids[$i] == filter_input(INPUT_GET, 'id')) {
                    // add item quantity to the existing product in array

                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }


    } else {
         //if the shoping cart doesnt exist 
        //create array using the submitted form data
        $_SESSION['count'] = 1;
        $_SESSION['shopping_cart'][0] = array(

            'id' => filter_input(INPUT_GET, "id"),
            'name' => filter_input(INPUT_POST, "name"),
            'price' => filter_input(INPUT_POST, "price"),
            'quantity' => filter_input(INPUT_POST, "quantity")

        );

    }
}
//fetching the info of the selected product
$db = new Database;
$query = "SELECT * from products where id = $id";
$result = $db->get_query_result($query);
$product = $result->fetch_assoc();

?>
    <!-- search bar -->
<section class="search-bar container">

<form action="search.php" class="form" method="GET">
  <input type="text" placeholder="Search..." name="name">
  <input type="submit" class='form-control btn btn-success mt-3 py-1 px-2' value="search">
  </form>
</section>


<section class="product-info container product " id="<?php echo $product['id']; ?>">
<h1 class="mb-5"><?php echo $product['name']; ?></h1>
<div class="add-to-bag d-flex">
    <img src="<?php echo $product['image']; ?>" alt="">
    <form action="product.php?id=<?php echo $id; ?>" class="add-form" method="POST">
        <h3 class="mb-4">Price: <?php echo $product['price']; ?> LE</h3>
        <label for="quantity">Qty</label>
        <input type="number" name="quantity" value="1">
        <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
        <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
        <input type="submit" name="submit"class="form-control mt-3" value="Add to bag">
    </form>
</div>


</section>

<!-- reviews -->
<section class="container comments" >
        <div class="comment">
            <h1></h1>
            <hr class="first-hr">
            <h3>Product Review</h3>
            <hr class="second-hr">
        </div>
        
    </section>

    <?php 
        //textarea and submit button for the comment
    ?>
    <section class="comment-area container getUserId" id="<?php echo $_SESSION['uId']; ?>"> 
 <?php if (isset($_SESSION['login'])) : ?>
            <textarea name="comment" id="user_comment" cols="90" rows="10" placeholder="Write your Feedback"></textarea>
            
            <button   value="" class ="button" name='submit' id="getform">Add Review</button>
<?php endif; ?>
   
    <?php 
        //here is the place for the comments that are approved to be shown
    ?>
        <section class="reviews">
           
        </section>
    </section>


<?php include 'includes/footer.php'; ?>