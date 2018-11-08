<?php
      include 'datab.php';
      include 'std.php';
      include 'viewuser.php';
      include_once('./inc/header.php');
 ?>

 <form class="form-group container" action="#" method="post">
   <div class="form-group">
     <label for="">Search Name:</label>
     <input type="text" class="mt-1 form-control" name="name" placeholder="name">
   </div>
   <input type="submit" class="mt-2 btn btn-primary" name="" value="Search">
 </form>
  <?php
      if(isset($_POST['name'])){
        $name = $_POST['name'];
        $view  = new User();
        $names = $view->searchUser($name);
        foreach ($names as $name ) {
          // code...
          echo "<p>name: ".$name['name']." course: ".$name['course']."</p>";
        }
      }

   ?>


 <?php include_once('../inc/footer.php'); ?>
