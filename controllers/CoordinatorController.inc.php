<?php
include_once '../models/CoordinatorModel.inc.php';

class CoordinatorController {

    public function getCoordinatorByNiu($conn, $niu_coordinador){

    $coordinator = CoordinatorModel::getCoordinatorByNiu($conn, $niu_coordinador);
    return $coordinator;
        
    }

    public function getCoordinatorsAndDegrees($conn){
        $coordinators = CoordinatorModel::getCoordinatorsAndDegrees($conn);
        return $coordinators;
    }

    public function insertCoordinator($conn, $niu_coordinador, $id_grado){
        CoordinatorModel::insertCoordinator($conn, $niu_coordinador, $id_grado);
    }


}
?>