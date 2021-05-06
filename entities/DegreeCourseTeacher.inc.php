<?php

class DegreeCourseTeacher {

    private $id_profesor_curso_grado;
    private $id_curso_grado;
    private $niu_profesor;
    private $max_estudiantes;
    private $estudiantes_asignados;
   
    
 

    public function __construct($id_profesor_curso_grado, $id_curso_grado, $niu_profesor, $max_estudiantes, $estudiantes_asignados){
        $this -> id_profesor_curso_grado = $id_profesor_curso_grado;
        $this -> id_curso_grado = $id_curso_grado;
        $this -> niu_profesor = $niu_profesor;
        $this -> max_estudiantes = $max_estudiantes;
        $this -> estudiantes_asignados = $estudiantes_asignados;
        
    }

    public function getDegreeCourseTeacherId(){
        return $this -> id_profesor_curso_grado;
    }

    public function getDegreeCourseTeacherCourseDegree(){
        return $this -> id_curso_grado;
    }

    public function getDegreeCourseTeacherNiu(){
        return $this -> niu_profesor;
    }

    public function getDegreeCourseTeacherMaxStudents(){
        return $this -> max_estudiantes;
    }

    public function getDegreeCourseTeacherAssignedStudents(){
        return $this -> estudiantes_asignados;
    }



    

    public function setDegreeCourseTeacherId($id_profesor_curso_grado){
        $this->$id_profesor_curso_grado = $$id_profesor_curso_grado;
    }

    public function setDegreeCourseTeacherCourseDegree($id_curso_grado){
        $this->id_curso_grado = $id_curso_grado;
    }

    public function setDegreeCourseTeacherNiu($niu_profesor){
        $this->niu_profesor = $niu_profesor;
    }

    public function setDegreeCourseTeacherMaxStudents($max_estudiantes){
        $this->max_estudiantes = $max_estudiantes;
    }

    public function setDegreeCourseTeacher($estudiantes_asignados){
        $this->estudiantes_asignados = $estudiantes_asignados;
    }


}

?>