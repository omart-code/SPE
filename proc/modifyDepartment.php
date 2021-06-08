<?php
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../includes/libraries.inc.php';
include_once '../controllers/TeacherController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/DegreeDepartmentController.inc.php';
include_once '../controllers/DegreeCourseTeacherController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../app/Redirection.inc.php';



     
            
            Connection::openConnection(); 
           //assignar un departamento a un grado
            $depart = DegreeDepartmentController::getDepartmentsByDegreeAndDepartment(Connection::getConnection(),$_POST['grau'], html_entity_decode($_POST['departament'], ENT_QUOTES, 'UTF-8'));
            if( $depart == null){
                DegreeDepartmentController::insertDegreeDepartment(Connection::getConnection(), $_POST['departament'], $_POST['grau'] );
                echo '<div class="container"><div class="alert alert-success text-center" style="padding:40px; margin-top:20px;">
                <strong style="font-size: 20px;">Departament assignat correctament!</strong>
                 </div></div> ';
  
                 echo '<script> setTimeout(function(){ window.location.href= "'.DEPARTMENTS.'";}, 2000)();</script>';
               
            }else{
               echo '<div class="container"><div class="alert alert-danger text-center" style="padding:40px; margin-top:20px;">
               <strong style="font-size: 20px;">Departament ja assignat a aquest grau!</strong>
                </div></div> ';
 
                echo '<script> setTimeout(function(){ window.location.href= "'.DEPARTMENTS.'";}, 2000)();</script>';
            }
          
          
          
          
   
       ?>