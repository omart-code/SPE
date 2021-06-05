<?php
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/DegreeDepartmentController.inc.php';
include_once '../app/Redirection.inc.php';







    Connection::openConnection(); 
    //inserto en departamento
    
    DepartmentController::insertDepartment(Connection::getConnection(), htmlentities($_POST["nomDepartament"], ENT_QUOTES | ENT_HTML5, 'UTF-8'),
     htmlentities($_POST["siglas"], ENT_QUOTES | ENT_HTML5, 'UTF-8'), htmlentities($_POST["identificador"], ENT_QUOTES | ENT_HTML5, 'UTF-8') );
     echo "<script>alert('Departament afegit correctament')</script>";
    echo '<script>window.location.replace("'.DEPARTMENTS.'")</script>';



   /*  ESTO VA A ASSIGNAR UN DEPARTAMENTO A UN GRADO */
   /*  //obtengo grado a partir de su nombre
    $degree = DegreeController::getDegreeByName(Connection::getConnection(), $_POST["grauSelec"]);
    //obtengo su id
    $degreeId = $degree->getDegreeId();
    //obtengo id  del departamento antes insertado
    $department = DepartmentController::getDepartmentByName(Connection::getConnection(), $_POST["nomDepartament"]);
    $departmentId = $department ->getDepartmentId();
    //inserto en departamentos_grado su id departamento y su id grado
    DegreeDepartmentController::insertDegreeDepartment(Connection::getConnection(), $departmentId, $degreeId); */
  


?>