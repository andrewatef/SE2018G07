<?php
    include 'Gradesclass.php';
    $id = $_REQUEST["id"];
    $course = new Grades();
    $course->delete($id);


 ?>
