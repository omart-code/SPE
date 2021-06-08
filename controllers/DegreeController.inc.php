<?php
include_once '../models/DegreeModel.inc.php';

class DegreeController {

    public function getDegrees($conn){
    $degrees = [];
    $degrees = DegreeModel::getDegrees($conn);
    return $degrees;
        
    }

    public function getDegreeByName($conn, $nombre){
        $degree = DegreeModel::getDegreeByName($conn, $nombre);
        return $degree;
    }

    public function  getDegreeById($conn, $id_grado){
        $degree =  DegreeModel::getDegreeById($conn, $id_grado);
        return $degree;
    }

    public function  insertDegree($conn, $nombre, $siglas, $codigo_asignatura){
        DegreeModel::insertDegree($conn, $nombre, $siglas, $codigo_asignatura);
    }

}
?>