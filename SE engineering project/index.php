<?php 
include "config/config.php";
if (filter_input(INPUT_GET, "logout") == "true") {
    unset($_SESSION['login']);
}

include "includes/header.php";
include "classes/database.php";
?>
<!-- the jumbotron that contain the image and the all you need heading
-->
<section class="top-jumbo">
    <img src="img/doctor.jpg" alt="">
    <div class="jumbo-content">
 <h1>All You Need For your health</h1>
    <p>Welcome to My pharmacy Online Store! We offer comprehensive pharmaceutical services including compounding, vaccinations,free delivery. Be sure to check out all of our online offerings, we will ship to you anywhere in Egypt. If you have any questions, call us today.</p>
    </div>
    
</section>
<?php 
if (filter_input(INPUT_GET, "checkout") == "true") :
    unset($_SESSION["shopping_cart"]);
unset($_SESSION['count']);

?>
<p id="success" class="container">your order will be deliverd as soon as possible cheer up</p>
<?php endif; ?>

<!-- the newsletter div -->
<section class="newsletter container d-flex">
        <form action="includes/newsletter.php" method="POST">
            <input type="email" placeholder="Email Address" class="input" name="email">
            <input type="submit" class="btn btn-outline-primary button mt-4 " value="Subscribe">
        </form>
        <p class="">Subscribe to our newsletter for seasonal promotions, health news and savings</p>
</section>
<?php 
if (filter_input(INPUT_GET, "news")) :
?>
        <p id="success" class="container"><?php echo $_GET['news']; ?></p>
        <?php endif; ?>





<!-- cards section -->

<section class="round-cards container d-flex">
    <!-- first card -->
<div class="cardd">
    <a href="shop.php">
 <img src="img/online.png" alt="">
    <h1>Online Store</h1>
    </a>
</div>

    <!-- second card -->
<div class="cardd">
    <a>
    <img src="img/del.png" alt="">
    <h1>Free Delivery</h1>
    </a>
</div>

</section>

<!-- banner section -->

<section class="banner">
<p>
    Thanks For Visiting Us Online. We Have Designed A New Website With More Features To Better Serve You. If You Previously Visited Us Online You May Have To Create A New Account To Take Advantage Of All The Added Benefits. If You Have Problems Or Questions Please Give Us A Call At 111-111-111.
</p>


</section>





<?php 
include "includes/footer.php";
?>