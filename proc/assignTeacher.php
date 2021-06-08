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
      
    <?php   echo '<div class="container"><div class="alert alert-success text-center" style="padding:40px; margin-top:20px;">
                <strong style="font-size: 20px;">Professor/a assignat/da correctament!</strong>
                 </div></div> ';
  
                 echo '<script> setTimeout(function(){ window.location.href= "'.TEACHERS.'";}, 2000)();</script>';
     
    }else{
        echo '<div class="container"><div class="alert alert-danger text-center" style="padding:40px; margin-top:20px;">
                <strong style="font-size: 20px;">Professor/a no assginat/da perque ja està assignat/da a un curs grau!</strong>
                 </div></div> ';
  
                 echo '<script> setTimeout(function(){ window.location.href= "'.TEACHERS.'";}, 2000)();</script>';
    }
   
    
  



?>