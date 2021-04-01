<?php

    class StudentModel{

        //Devuelve un estudiante por su niu
        public static function getStudentByNiu($conn, $niu_estudiante){
            $student = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Student.inc.php';
                    $sql = "SELECT * FROM estudiantes e WHERE e.niu_estudiante = :niu_estudiante";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':niu_estudiante', $niu_estudiante, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
    
                    if(!empty($res)){
                        $student = new Student( $res['niu_estudiante'],$res['nombre'],$res['apellido'], $res['email'], $res['telefono'] ,$res['id_mencion'] ,$res['id_grado']);
                    }
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
            return $student;
        }
       
    }

?>