<?php


      include 'inccc/Gradesclass.php';
      include_once('./inc/header.php');
      $id = $_GET['id'];
      $db = new Database();
    if(isset($_POST['studentid'])){
      $stdid = $_POST['studentid'];
      $query = "Update grades set student_id=$stdid where id=$id";
      $db->create($query);
    }
    if(isset($_POST['courseid'])){
      $crsid = $_POST['courseid'];
      $query = "Update grades set course_id=$crsid where id=$id";
      $db->create($query);
    }
    if(isset($_POST['degree'])){
      $deg = $_POST['degree'];
      $query = "Update grades set degree=$deg where id=$id";
      $db->create($query);
    }
 	    $grades=new Grades();
    $grade = $grades->getg($id);


 ?>


 <div class="container">
 		<table class="table table-striped mt-4">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Student id <button type="button"class="btn btn-danger mx-5 degreebtn" name="button">Edit</button></th>
            <th scope="col">course id <button type="button"class="btn btn-danger mx-5 studbtn" name="button">Edit</button></th>
            <th scope="col">degree <button type="button"class="btn btn-danger mx-5 deg" name="button">Edit</button></th>
          </tr>
        </thead>
        <?php foreach ($grade as $row) : ?>
        <tbody>
          <tr>
            <th scope="row"><?php echo $id; ?> </th>
            <td> <?php echo $row['student_id']; ?> </td>
            <td> <?php echo $row['course_id']; ?></td>
            <td> <?php echo $row['degree']; ?> </td>
          </tr>
        </tbody>
      <?php endforeach ; ?>
    </table>
 </div>


<form class="form-group degree" action="ginfo.php?id=<?php echo $id; ?>" method="post">
  <input type="number" name="studentid" value=""class="form-control" placeholder="student id">
  <input type="submit" name="" value="Change" >
</form>
<form class="form-group stud" action="ginfo.php?id=<?php echo $id; ?>" method="post">
  <input type="number" name="courseid" value=""class="form-control" placeholder="course id">
  <input type="submit" name="" value="Change" >
</form>
<form class="form-group degr" action="ginfo.php?id=<?php echo $id; ?>" method="post">
  <input type="number" name="degree" value=""class="form-control" placeholder="degree">
  <input type="submit" name="" value="Change" >
</form>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('.degree').hide();
        $('.stud').hide();
        $('.degr').hide();
        $('.degreebtn').click(function(){
          $('.degree').toggle();
        });
        $('.studbtn').click(function(){
          $('.stud').toggle();
        });
        $('.deg').click(function(){
          $('.degr').toggle();
        });


    });
  </script>


 <?php include_once('./inc/footer.php');

 ?>
