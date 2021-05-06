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
       
       
    }

?>