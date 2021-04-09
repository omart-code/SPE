<?php
include_once '../models/DegreeModel.inc.php';

class DegreeController {

    public function getDegrees($conn){
    $degrees = [];
    $degrees = DegreeModel::getDegrees($conn);
    return $degrees;
        
    }

}
?>