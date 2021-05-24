<?php

    class DegreeCourseTeacherModel{

        public static function getDegreeCourseTeacherByNiu($conn, $niu_profesor){
            $teachers = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/DegreeCourseTeacher.inc.php';
                    $sql = "SELECT id_curso_grado FROM profesores_curso_grado p WHERE p.niu_profesor = :niu_profesor";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                    $stmt -> execute();
                    $resp = $stmt-> fetchAll();
                    if(count($resp)){
                        foreach($resp as $res){
                            $teachers[] = $res['id_curso_grado'];
                        }
                    } 
                   
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $teachers;
        }
        public static function getTeacherByNiuAndDegreeCourse($conn, $id_curso_grado, $niu_profesor){
            $teacher = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/DegreeCourseTeacher.inc.php';
                    $sql = "SELECT * FROM profesores_curso_grado p WHERE p.niu_profesor = :niu_profesor AND id_curso_grado = :id_curso_grado";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                    $stmt ->bindParam(':id_curso_grado', $id_curso_grado, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
                    if(count($res)){
                        
                            $teacher = $res;
                        
                    } 
                   
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $teacher;
        }

       

          //Inserta un nuevo departamento_grado
          public static function insertDegreeCourseTeacher($conn, $id_curso_grado, $niu_profesor){
           
    
            if(isset($conn)){
                try{
                  
                    $sql = "INSERT INTO profesores_curso_grado (id_curso_grado, niu_profesor, max_estudiantes)
                    VALUES (:id_curso_grado, :niu_profesor, 15)";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_curso_grado', $id_curso_grado, PDO::PARAM_STR);
                    $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                   
                    $stmt -> execute();
                    
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
           
        }

        //Elimina a un profesor de profesores curso grado, es de decir como profesor en un curso grado determinado
        public static function removeDegreeCourseTeacher($conn, $id_curso_grado, $niu_profesor){
            if(isset($conn)){
                $sql = "DELETE FROM profesores_curso_grado WHERE niu_profesor = :niu_profesor AND id_curso_grado = :id_curso_grado";
                $stmt = $conn -> prepare($sql);
                $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                $stmt ->bindParam(':id_curso_grado', $id_curso_grado, PDO::PARAM_STR);
                $stmt -> execute();
            }
        }
       
       
    }

?>