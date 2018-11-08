<?php


      include 'inccc/courses.php';
      include_once('./inc/header.php');
      $id = $_GET['id'];
      $db = new Database();
    if(isset($_POST['maxdegree'])){
      $maxd = $_POST['maxdegree'];
      $query = "Update courses set max_degree=$maxd where id=$id";
      $db->create($query);
    }
    if(isset($_POST['study'])){
      $study = $_POST['study'];
      $query = "Update courses set study_year=$study where id=$id";
      $db->create($query);
    }
 	    $courses=new Courses();
    $course = $courses->getc($id);


 ?>


 <div class="container">
 		<table class="table table-striped mt-4">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Course Name</th>
            <th scope="col">max_degree</th>
            <th scope="col">study_year</th>
          </tr>
        </thead>
        <?php foreach ($course as $row) : ?>
        <tbody>
          <tr>
            <th scope="row"><?php echo $id; ?> </th>
            <td> <?php echo $row['name']; ?> </td>
            <td> <?php echo $row['max_degree']; ?> <button type="button"class="btn btn-danger mx-4 degreebtn" name="button">Edit</button> </td>
            <td> <?php echo $row['study_year']; ?><button type="button"class="btn btn-danger mx-4 studbtn" name="button">Edit</button> </td> </td>
          </tr>
        </tbody>
      <?php endforeach ; ?>
    </table>
 </div>


<form class="form-group degree" action="cinfo.php?id=<?php echo $id; ?>" method="post">
  <input type="number" name="maxdegree" value=""class="form-control" placeholder="Max_degree">
  <input type="submit" name="" value="Change" >
</form>
<form class="form-group stud" action="cinfo.php?id=<?php echo $id; ?>" method="post">
  <input type="number" name="study" value=""class="form-control" placeholder="Study year">
  <input type="submit" name="" value="Change" >
</form>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('.form-group').hide();
        $('.stud').hide();
        $('.degreebtn').click(function(){
          $('.degree').toggle();
        });
        $('.studbtn').click(function(){
          $('.stud').toggle();
        });


    });
  </script>


 <?php include_once('./inc/footer.php');

 ?>
