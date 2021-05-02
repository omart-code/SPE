<?php
include_once '../models/CoordinatorModel.inc.php';

class CoordinatorController {

    public function getCoordinatorByNiu($conn, $niu_coordinador){

    $coordinator = CoordinatorModel::getCoordinatorByNiu($conn, $niu_coordinador);
    return $coordinator;
        
    }


}
?>