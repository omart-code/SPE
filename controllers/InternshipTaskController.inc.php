<?php
include_once '../models/InternshipTaskModel.inc.php';

class InternshipTaskController {

    public function getInternshipTasksByPhase($conn, $id_estancia, $id_etapa){
        $internshipTasks = [];
        $internshipTasks = InternshipTaskModel::getInternshipTasksByPhase($conn, $id_estancia, $id_etapa);
        return $internshipTasks;
        
    }
    public function getInternshipTasksByInternshipId($conn, $id_estancia){
        $internshipTasks = [];
        $internshipTasks = InternshipTaskModel::getInternshipTasksByInternshipId($conn, $id_estancia);
        return $internshipTasks;
    }


}
?>


