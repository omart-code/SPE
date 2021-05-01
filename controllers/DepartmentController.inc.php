<?php
include_once '../models/DepartmentModel.inc.php';

class DepartmentController {

    public function insertDepartment($conn, $nombre, $siglas, $identificador){
        
    DepartmentModel::insertDepartment($conn, $nombre, $siglas, $identificador);
 
    }

    public function getDepartments($conn){
       $departments = DepartmentModel::getDepartments($conn);
       return $departments;
    }

    public function  getDepartmentByName($conn, $nombre){
        $department = DepartmentModel:: getDepartmentByName($conn, $nombre);
        return $department;
    }

    public function  getDepartmentByDegree($conn, $id_grado){
        $departments = DepartmentModel:: getDepartmentByDegree($conn, $id_grado);
        return $departments;
    }

}
?>