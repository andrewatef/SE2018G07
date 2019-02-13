<?php
include "config/config.php";
include "includes/header.php";

?>

 <div class="container  register">
    <form action="includes/register.php" method="POST">

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
              <?php if (isset($_GET['status'])) : ?>
            <input type="text" class="form-control" id="inputEmail3" name="Username" value="<?php echo $_GET['username']; ?>">
            <?php else : ?>
             <input type="text" class="form-control" id="inputEmail3" name="Username"placeholder="Username">
             <?php endif; ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
               <?php if (isset($_GET['status'])) : ?>
            <input type="text" class="form-control" id="inputEmail3" name="Email" value="<?php echo $_GET['email']; ?>">
            <?php else : ?>
             <input type="text" class="form-control" id="inputEmail3" name="Email"placeholder="Email">
             <?php endif; ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3"name="Password" placeholder="Password">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" name="cp" placeholder="Confirm Password">
          </div>
        </div>
      
        <div class="form-group row mt-5">
          <div class="col-sm-10">
            <input type="submit" class="btn btn-primary" value="Sign up">
          </div>
        </div>
       

<?php if (isset($_GET['status'])) : ?>
<p id="success" class="container"><?php echo $_GET['status']; ?></p>
<?php endif; ?>
</form>

</div>










<?php 
include "includes/footer.php";
?>








<?php 
include "includes/footer.php";
?>