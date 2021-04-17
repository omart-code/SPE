<?php
include_once '../models/PhaseModel.inc.php';

class PhaseController {

    public function getPhases($conn){
        $phases = [];
        $phases = PhaseModel::getPhases($conn);
        return $phases;
        
    }


}
?>