<?php 
include "config/config.php";
include "includes/header.php";
include "classes/database.php";


//update the quantity from the bag
if (filter_input(INPUT_POST, "change-quantity")) {
  $quantity = filter_input(INPUT_POST, "quantity");
  $id = filter_input(INPUT_POST, "id");
  foreach ($_SESSION["shopping_cart"] as $key => $product) {
        //check the product id is it equal to the id from the post form , if it is then change the quantity
    if ($product['id'] == $id) {
      $_SESSION["shopping_cart"][$key]['quantity'] = $quantity;
    }
  }
}


if (filter_input(INPUT_GET, "action") == 'delete') {
    //loop through the shopping cart until it matched the id 

  foreach ($_SESSION["shopping_cart"] as $key => $product) {
    if ($product['id'] == filter_input(INPUT_GET, "id")) {
            //remove product from the shopping cart when it matches the get id
      unset($_SESSION["shopping_cart"][$key]);
      $_SESSION['count']--;
    }
  }
  $_SESSION["shopping_cart"] = array_values($_SESSION["shopping_cart"]);
}

?>

<!-- search bar -->
<section class="search-bar container">

<form action="search.php" class="form" method="GET">
  <input type="text" placeholder="Search..." name="name">
  <input type="submit" class='form-control btn btn-success mt-3 py-1 px-2' value="search">
  </form>
</section>


      <?php 
      if (!empty($_SESSION["shopping_cart"])) :
        $total = 0;
      foreach ($_SESSION["shopping_cart"] as $key => $product) : ?>
    <table class="table ">
  <thead>
    <tr>
      <th width="5%" scope="col">#</th>
      <th width="20%" scope="col">Product name</th>
      <th width="10%" scope="col">quantity</th>
      <th width="20%" scope="col">Price</th>
      <th width="20%" scope="col">total</th>
      <th  scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $product['name']; ?></td>
      <td>  <form action="view-bag.php" method="POST">
                <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>">
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                <input type="submit" name="change-quantity" value="add" class="btn btn-primary mt-2">
          </form>
            </td>
      <td>LE <?php echo $product['price']; ?></td>
       <td>LE <?php echo $product['price'] * $product['quantity']; ?></td>
      <td><a href="view-bag.php?action=delete&id=<?php echo $product['id']; ?>"> <button class="btn btn-danger">delete</button></a> </td>
    </tr>
<?php 
$total = $total + ($product['price'] * $product['quantity']);
endforeach; ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><h5>Total</h5> : LE <?php echo $total; ?></td>
    </tr>
  </tbody>
</table>
<?php if (count($_SESSION['shopping_cart']) > 0) : ?>

        <a href="checkout.php?total=<?php echo $total; ?>" class="checkout btn btn-outline-primary form-control">CHECK OUT</a>

<?php endif; ?>
<?php else : ?>
<!-- if the shopping bag is empty  -->

<section class="continue-shopping container">
    <h4>Your shopping bag is empty </h4>
    <a href="shop.php">Continue shopping</a>
</section>

<?php endif; ?>













<?php 
include "includes/footer.php";
?>