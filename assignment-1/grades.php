<?php
      include 'inccc/Gradesclass.php';
      include_once('./inc/header.php');
      $grade=new Grades();
      $msg = '';
      $msgclass='';

      if(filter_has_var(INPUT_POST ,'submit')){
      $grades = $_POST["grade"];
      $name= $grades['student'];
      $max= $grades["course"];
      $deg=$grades["degree"];
      if(!empty($name)&& !empty($max)&& !empty($deg)){
      $grade->createG($name , $max , $deg );}
    else{
      $msg = "Fill all fileds";
      $msgclass = "alert-danger";
    }
  }
      $grades = $grade->all();
 ?>


 <div class="container">
   <h3 class="display-2">Grades section</h3>
   <?php if($msg != ''): ?>
     <div class="alert <?php echo $msgclass; ?> text-muted my-3">
       <?php echo $msg; ?>
     </div>
   <?php endif ?>
   <form class="form-group" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
     <input type="number" name="grade[student]" class="form-control mb-3"value="" placeholder="Student id">
     <input type="number" name="grade[course]" class="form-control mb-3"value="" placeholder="course id">
     <input type="number" name="grade[degree]" class="form-control mb-3"value="" placeholder="degree">
   <input type="submit" name="submit"class="btn btn-primary my-4"name="" value="Add grade">
   </form
 </div>
 <div class="container">
   <table class="table table-striped mt-4">
     <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">student id</th>
         <th scope="col">course id</th>
         <th scope="col">degree</th>
       </tr>
     </thead>
     <?php foreach($grades as $std) : ?>
       <?php if($std['degree'] == ''){
         continue;
       }
        ?>
     <tbody>
       <tr>
         <td scope="row"><?php echo $std['id']; ?></td>
         <td> <span class="h4 text-dark my-3"> <?php echo $std['student_id'] ?> </span> </td>
         <td> <span class="h4 text-dark my-3"> <?php echo $std['course_id'] ?> </span> </td>
         <td> <span class="h4 text-dark my-3"> <?php echo $std['degree'] ?> </span> </td>
         <td><a href="ginfo.php?id=<?php echo $std["id"]; ?>" class="btn btn-primary mr-3 mb-3">Info</a>
         <a href="" class="btn btn-danger mb-3 delete" id="<?php echo $std["id"]; ?>" class= >Delete</a></td>
       </tr>
     </tbody>
   <?php endforeach; ?>
   </table>
 </div>
 <script
   src="https://code.jquery.com/jquery-3.3.1.min.js"
   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
   crossorigin="anonymous"></script>
 <script type="text/javascript">
 $(document).ready(function(){
   $(".delete").click(function(){
     var anchor = $(this);
     var id = anchor.attr('id');
     var xmh = new XMLHttpRequest();
     xmh.open("GET" , 'inccc/deletegrade.php?id='+id ,false);
     xmh.send();
   });

 });
 </script>


<?php include_once('./inc/footer.php'); ?>
