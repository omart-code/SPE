<?php
include_once '../models/StudentModel.inc.php';

class StudentController {

    //Actualiza los datos de un estudiante en funcion del niu
    public function updateStudentByNiu($conn, $niu_estudiante, $nombre, $apellido, $email, $telefono, $id_mencion){
  
    StudentModel:: updateStudentByNiu($conn, $niu_estudiante, $nombre, $apellido, $email, $telefono, $id_mencion);
    
    }

    //Obtiene el nombre de mención de un estudiante
    public function getStudentMention($conn, $id_mencion){
        $mention = StudentModel::getStudentMention($conn, $id_mencion);
        return $mention;
    }

    //Obtiene las menciones que existen en el grado de un estudiante
    public function getMentionsByStudentDegree($conn, $id_grado){
        $mentions = StudentModel::getMentionsByStudentDegree($conn, $id_grado);
        return $mentions;

    }

    public function getMentionId($conn, $nombre){
        $mentionId = StudentModel::getMentionId($conn, $nombre);
        return $mentionId;
    }
}
?>
