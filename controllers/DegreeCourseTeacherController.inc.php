
<?php
include_once '../models/DegreeCourseTeacherModel.inc.php';

class DegreeCourseTeacherController {

    public function getDegreeCourseTeacherByNiu($conn, $niu_profesor){
   
    $teachers = DegreeCourseTeacherModel::getDegreeCourseTeacherByNiu($conn, $niu_profesor);
    return $teachers;
        
    }

}
?>

