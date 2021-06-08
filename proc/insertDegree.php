<?php
include_once '../app/Connection.inc.php';
include_once '../controllers/DegreeController.inc.php';

$nombre = $_POST['nomGrau'];
$siglas = $_POST['siglesGrau'];
$codigo_assignatura = $_POST['assignaturaGrau'];

Connection::openConnection();
$degree = DegreeController::getDegreeByName(Connection::getConnection(), $nombre);

if($degree == null){
    DegreeController::insertDegree(Connection::getConnection(), $nombre, $siglas, $codigo_assignatura);
    echo "<script>alert('Grau afegit correctament')</script>";
    echo '<script>window.location.replace("'.DEGREES.'")</script>';
       
}else{
    echo "<script>alert('Grau ja existent, no s'ha afegit')</script>";
    echo '<script>window.location.replace("'.DEGREES.'")</script>';
}


?>