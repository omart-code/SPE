<?php
include_once '../app/Connection.inc.php';
include_once '../includes/libraries.inc.php';
include_once '../controllers/DegreeController.inc.php';

$nombre = $_POST['nomGrau'];
$siglas = $_POST['siglesGrau'];
$codigo_assignatura = $_POST['assignaturaGrau'];

Connection::openConnection();
$degree = DegreeController::getDegreeByName(Connection::getConnection(), $nombre);

if($degree == null){
    DegreeController::insertDegree(Connection::getConnection(), $nombre, $siglas, $codigo_assignatura);
    echo '<div class="container"><div class="alert alert-success text-center" style="padding:40px; margin-top:20px;">
    <strong style="font-size: 20px;">Grau afegit correctament!</strong>
  </div></div> ';
  
    echo '<script> setTimeout(function(){ window.location.href= "'.DEGREES.'";}, 2000)();</script>';
       
}else{
    echo '<div class="container"><div class="alert alert-danger text-center" style="padding:40px; margin-top:20px;">
    <strong style="font-size: 20px;">Grau ja existent! No serà introduit.</strong>
  </div></div> ';
  
    echo '<script> setTimeout(function(){ window.location.href= "'.DEGREES.'";}, 2000)();</script>';
}


?>