<?php
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../includes/libraries.inc.php';
include_once '../controllers/TeacherController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../controllers/DegreeCourseTeacherController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../app/Redirection.inc.php';


      $niuProfessor =  htmlentities( $_POST["niuProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8');
      $nomProfessor =  htmlentities( $_POST["nomProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8');
      $cognomProfessor =  htmlentities( $_POST["cognomProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8');
      $emailProfessor =  htmlentities( $_POST["emailProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8');
      $telefonProfessor =  htmlentities( $_POST["telefonProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8');
      $departamentProfessor =  htmlentities( $_POST["departamentProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8');
      $maximAlumnesProfessor =  htmlentities( $_POST["maximAlumnesProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8');
      
      if(filter_var($_POST['emailProfessor'], FILTER_VALIDATE_EMAIL)){

     
      Connection::openConnection(); 
     //modificar de profesores
     TeacherController::updateTeacher(Connection::getConnection(),$niuProfessor, $nomProfessor,
     $cognomProfessor, $emailProfessor, $telefonProfessor, $departamentProfessor);
     //modificar en usuarios
     UserController::updateTeacherByNiu(Connection::getConnection(), $niuProfessor,$nomProfessor,
     $cognomProfessor,$telefonProfessor, $emailProfessor, 1);
     DegreeCourseTeacherController::updateDegreeCourseTeacherMaxStudents(Connection::getConnection(), $_POST['cursoGrado'], $niuProfessor, $maximAlumnesProfessor);
     echo '<div class="container"><div class="alert alert-success text-center" style="padding:40px; margin-top:20px;">
                <strong style="font-size: 20px;">Professor/a modificat/da correctament!</strong>
                 </div></div> ';
  
                 echo '<script> setTimeout(function(){ window.location.href= "'.TEACHERS.'";}, 2000)();</script>';
      }else{
            echo '<div class="container"><div class="alert alert-danger text-center" style="padding:40px; margin-top:20px;">
                <strong style="font-size: 20px;">Professor/a no modificat/da perquè el correu es erroni.</strong>
              </div></div> ';
              
                echo '<script> setTimeout(function(){ window.location.href= "'.TEACHERS.'";}, 2000)();</script>';
      }

?>