<?php
    include 'courses.php';
    $id = $_REQUEST["id"];
    $course = new Courses();
    $course->delete($id);
    

 ?>
