<?php
include_once '../includes/doc-declaration.inc.php'; 
include_once '../includes/libraries.inc.php';
include_once '../app/Connection.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/DegreeDepartmentController.inc.php';
include_once '../app/Redirection.inc.php';







    Connection::openConnection(); 
    //inserto en departamento
    
    DepartmentController::insertDepartment(Connection::getConnection(), htmlentities($_POST["nomDepartament"], ENT_QUOTES | ENT_HTML5, 'UTF-8'),
     htmlentities($_POST["siglas"], ENT_QUOTES | ENT_HTML5, 'UTF-8'), htmlentities($_POST["identificador"], ENT_QUOTES | ENT_HTML5, 'UTF-8') );
    echo '<div class="container"><div class="alert alert-success text-center" style="padding:40px; margin-top:20px;">
    <strong style="font-size: 20px;">Departament afegit correctament!</strong>
  </div></div> ';
  
    echo '<script> setTimeout(function(){ window.location.href= "'.DEPARTMENTS.'";}, 2000)();</script>';
  


?>