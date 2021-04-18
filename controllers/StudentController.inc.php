<?php
include_once '../models/StudentModel.inc.php';

class StudentController {

    //Actualiza los datos de un estudiante en funcion del niu
    public function updateStudentByNiu($conn, $niu_estudiante, $nombre, $apellido, $email, $telefono){
  
    StudentModel:: updateStudentByNiu($conn, $niu_estudiante, $nombre, $apellido, $email, $telefono);
    
    }


}
?>
