<?php
include_once '../controllers/InternshipController.inc.php';
include_once '../app/Connection.inc.php'; 


$id_estancia = $_POST['id_estancia'];

if($id_estancia){
    Connection::openConnection();
    InternshipController::removeInternship(Connection::getConnection(), $id_estancia);
}










?>