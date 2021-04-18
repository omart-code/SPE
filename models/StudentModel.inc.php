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

        //Actualiza los datos de un estudiante en funcion de su niu
        public static function updateStudentByNiu($conn, $niu_estudiante, $nombre, $apellido, $email, $telefono){
            $student = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Student.inc.php';
                    $sql = "UPDATE estudiantes SET nombre=:nombre, apellido=:apellido, email=:email, telefono=:telefono WHERE niu_estudiante = :niu_estudiante";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':niu_estudiante', $niu_estudiante, PDO::PARAM_STR);
                    $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                    $stmt ->bindParam(':apellido', $apellido, PDO::PARAM_STR);
                    $stmt ->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt ->bindParam(':telefono', $telefono, PDO::PARAM_STR);
                    $stmt -> execute();
                  
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
           
        }

        
       
    }

?>