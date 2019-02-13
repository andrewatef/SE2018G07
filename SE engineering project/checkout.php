<?php 

include "config/config.php";
include "includes/header2.php";
include "classes/database.php";

?>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="checkprocees.php" method="POST">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <?php if (!isset($_SESSION['login'])) : ?>
        <input type="submit" value="Complete Order" class="btn bton " disabled> 
        <p>Pleas log in first <a href="login.php">from here</a> </p>
<?php else : ?>
<input type="submit" value="Complete Order" class="btn bton " > 
<?php endif; ?>
      </form>
    </div>
  </div>

  <div class="col-25">
    <div class="container">
      <h4>Cart 
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i> 
          <b><?php echo count($_SESSION["shopping_cart"]); ?></b>
        </span>
      </h4>
       <?php foreach ($_SESSION["shopping_cart"] as $key => $product) : ?>
      <p><a href="product.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a> <span class="price">LE <?php echo $product['price'] * $product['quantity']; ?></span></p>
<?php endforeach; ?>
      <hr>
      <p>Total <span class="price" style="color:black"><b>LE <?php echo $_GET['total']; ?></b></span></p>
    </div>
  </div>
</div>





<?php 
include "includes/footer2.php";
?>