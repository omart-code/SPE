<?php
include_once '../models/DegreeDepartmentModel.inc.php';

class DegreeDepartmentController {

    public function insertDegreeDepartment($conn, $id_departamento, $id_grado){
        
        DegreeDepartmentModel::insertDegreeDepartment($conn, $id_departamento, $id_grado);
     
        }

    public function getDepartmentsByDegree($conn, $id_grado){
        $departaments = DegreeDepartmentModel::getDepartmentsByDegree($conn, $id_grado);
        return $departaments;
    }

    public function removeDegreeDepartment($conn, $id_departamento){
        DegreeDepartmentModel::removeDegreeDepartment($conn, $id_departamento);
    }

}
?>