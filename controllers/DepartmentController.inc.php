<?php
include_once '../models/DepartmentModel.inc.php';

class DepartmentController {

    public function insertDepartment($conn, $nombre, $siglas){
        
    DepartmentModel::insertDepartment($conn, $nombre, $siglas);
 
    }

    public function getDepartments($conn){
       $departments = DepartmentModel::getDepartments($conn);
       return $departments;
    }

}
?>