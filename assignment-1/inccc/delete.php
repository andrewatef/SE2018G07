<?php
    include 'student.php';
    $id = $_REQUEST["id"];
    $student = new Student();
    $student->delete($id);
    
 ?>
