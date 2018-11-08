<?php
        include('inc/header.php');
        include('inccc/database.php');
        if(isset($_POST['sname']) && isset($_POST['cname']) && isset($_POST['deg']) ){
          $cname = $_POST['cname'];
          $sname = $_POST['sname'];
          $deg = $_POST['deg'];
          $db = new Database();
          $query = "Select id from students where name ='{$sname}' limit 1 ";
          $sid = $db->selectq($query);
          $ssid = $sid['id'];
          $query = "Select id from courses where name ='{$cname}' limit 1";
          $cid = $db->selectq($query);
          $ccid = $cid['id'];
          $query = "inert into grades (student_id , course_id , degree) values ($ssid ,$ccid ,$deg)";
          $db->create($query);
        }



?>
<div class="container">
<form class="form-group" action="custinsert.php" method="post">
  <input type="text" name="sname" class="form-control my-3"placeholder="Student name">
  <input type="text" name="cname" class="form-control my-3"placeholder="course name">
  <input type="number" name="deg" class="form-control my-3"placeholder="degree">
  <input type="submit" class=" my-3 btn btn-primary" value="Add">
  </form>
</div>



  <?php include('inc/footer.php'); ?>
