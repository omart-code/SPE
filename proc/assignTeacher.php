<?php

include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/DegreeCourseTeacherController.inc.php';
include_once '../controllers/DegreeDepartmentController.inc.php';
include_once '../app/Redirection.inc.php';
include '../includes/libraries.inc.php';



    Connection::openConnection();
    $teacher = DegreeCourseTeacherController::getTeacherByNiuAndDegreeCourse(Connection::getConnection(), $_POST['grauCursSelec'], $_POST['profesor']);
    if($teacher == null){
        DegreeCourseTeacherController::insertDegreeCourseTeacher(Connection::getConnection(), $_POST['grauCursSelec'], $_POST['profesor'], $_POST['maxEstudiants']);?>
      
      <?php echo "<script>alert('Professor assignat correctament')</script>";     
       echo '<script>window.location.replace("'.TEACHERS.'")</script>';
     
    }else{
        echo "<script>alert('Professor no assignat perque ja està assignat a un curs i grau')</script>";    
        echo '<script>window.location.replace("'.TEACHERS.'")</script>';
    }
   
    
  



?>