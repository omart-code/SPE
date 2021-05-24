
<?php
include_once '../models/DegreeCourseTeacherModel.inc.php';

class DegreeCourseTeacherController {

    public function getDegreeCourseTeacherByNiu($conn, $niu_profesor){
   
    $teachers = DegreeCourseTeacherModel::getDegreeCourseTeacherByNiu($conn, $niu_profesor);
    return $teachers;
        
    }
    public function  getTeacherByNiuAndDegreeCourse($conn, $id_curso_grado, $niu_profesor){
        $teacher = DegreeCourseTeacherModel::getTeacherByNiuAndDegreeCourse($conn, $id_curso_grado, $niu_profesor);
        return $teacher;
    }

    public function insertDegreeCourseTeacher($conn, $id_curso_grado, $niu_profesor){
        DegreeCourseTeacherModel::insertDegreeCourseTeacher($conn, $id_curso_grado, $niu_profesor);
    }

    public function removeDegreeCourseTeacher($conn, $id_curso_grado, $niu_profesor){
        DegreeCourseTeacherModel::removeDegreeCourseTeacher($conn, $id_curso_grado, $niu_profesor);
    }

}
?>

