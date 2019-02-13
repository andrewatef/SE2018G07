<?php 
include "includes/header-login.php";
?>



<div class="container">

      <?php 
      if (filter_input(INPUT_GET, "register") == "true") :
      ?>
<p id="success" class="container mb-5">You have registerd successfully,kindly login with the registered account Email: <span><?php echo $_GET['email']; ?></span></p>
<?php endif; ?>
   <?php 
      if (filter_input(INPUT_GET, "info") == "false") :
      ?>
<p id="danger" class="container mb-5">You have entered wrong email or password</span></p>
<?php endif; ?>

      <form class="form-group"  method="post" action="process.php">
        <i class="fas fa-user"></i>
          <?php if (isset($_GET['email'])) : ?>
        <input type="text" class=""name="email" placeholder="email"value="<?php echo $_GET['email']; ?>">
      <?php else : ?>
       <input type="text" class=""name="email" placeholder="email"value="">
      <?php endif; ?>
        <br>
        <i class="fas fa-lock"></i>
        <input type="password"  class="" name="password"placeholder="password" value="">
        <br>
        <input type="submit" value="login" class="btn btn-primary mb-5">

        <p class="lead">new user? <a href="register.php">click here to register</a> </a>  </p>
      </form>
      

</div>




<?php 
include "includes/footer-login.php";
?>