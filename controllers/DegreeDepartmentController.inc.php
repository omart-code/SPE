<?php
include_once '../models/DegreeDepartmentModel.inc.php';

class DegreeDepartmentController {

    public function insertDegreeDepartment($conn, $id_departamento, $id_grado){
        
        DegreeDepartmentModel::insertDegreeDepartment($conn, $id_departamento, $id_grado);
     
        }

}
?>