<?php
      include 'inccc/courses.php';
      include_once('./inc/header.php');
      $course = new Courses();
      $msg = '';
      $msgclass='';

    if(filter_has_var(INPUT_POST ,'submit')){
      $courses = $_POST["course"];
      $name= $courses['name'];
      $max= $courses["max_degree"];
      $stdy=$courses["study_year"];
      if(!empty($name)&& !empty($max)&& !empty($stdy)){
      $course->create($name , $max , $stdy);}
      else{
        $msg = "Fill all fileds";
        $msgclass = "alert-danger";
      }

}
    $crs =$course->all();
      //$course->create($name , $max , $studyy);
 ?>

    <div class="container">
      <h3 class="display-2">Courses section</h3>
      <?php if($msg != ''): ?>
        <div class="alert <?php echo $msgclass; ?> text-muted my-3">
          <?php echo $msg; ?>
        </div>
      <?php endif ?>
      <form class="form-group" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
        <input type="text" name="course[name]" class="form-control mb-3"value="" placeholder="name">
        <input type="number" name="course[max_degree]" class="form-control mb-3"value="" placeholder="max degree">
        <select class="form-control " value=""name="course[study_year]">
            <option class="disabled">study year</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
      <input type="submit" name="submit" class="btn btn-primary my-4"name="" value="Add coures">
      </form
    </div>
    <div class="container">
      <table class="table table-striped mt-4">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">Max Degree</th>
            <th scope="col">Study year</th>
          </tr>
        </thead>
        <?php foreach($crs as $std) : ?>
          <?php if($std['name'] == ''){
            continue;
          }
           ?>
        <tbody>
          <tr>
            <td scope="row"><?php echo $std['id']; ?></td>
            <td> <span class="h4 text-dark my-3"> <?php echo $std['name'] ?> </span> </td>
            <td> <span class="h4 text-dark my-3"> <?php echo $std['max_degree'] ?> </span> </td>
            <td> <span class="h4 text-dark my-3"> <?php echo $std['study_year'] ?> </span> </td>
            <td><a href="cinfo.php?id=<?php echo $std["id"]; ?>" class="btn btn-primary mr-3 mb-3">Info</a>
            <a href="" class="btn btn-danger mb-3 delete" id="<?php echo $std["id"]; ?>">Delete</a></td>
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
        xmh.open("GET" , 'inccc/deletecourse.php?id='+id ,false);
        xmh.send();
      });

    });
    </script>
 <?php include_once('./inc/footer.php'); ?>
