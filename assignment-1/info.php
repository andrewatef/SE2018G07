<?php

      include 'inccc/database.php';
      include_once('./inc/header.php');
      $id = $_GET['id'];
 	    $db=new Database();

    $query = "SELECT students.name, courses.name as course,
              (100* grades.degree / courses.max_degree) as score,
              courses.id
              FROM grades
              JOIN students ON students.id =$id
              JOIN courses ON courses.id = grades.course_id AND grades.student_id=$id
              ORDER BY courses.id";

    $posts = $db->select($query);


    ;
 ?>


 <div class="container">
 		<h2 class="display-3">Welecome <span class="display-4 text-muted"> <?php echo $posts->fetch_assoc()['name'] ;?> </span></h2>
 		<table class="table table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">course</th>
      <th scope="col">degree %</th>

    </tr>
  </thead>
  <?php while ($row = $posts->fetch_assoc()) : ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?> </th>
      <td> <?php echo $row['course']; ?> </td>
      <td> <?php echo $row['score']; ?> </td>

    </tr>
  </tbody>
<?php endwhile ; ?>
</table>

 </div>






 <?php include_once('./inc/footer.php');

 ?>
