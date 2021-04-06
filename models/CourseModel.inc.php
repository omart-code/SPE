<?php

    class CourseModel{

        //Inserta un nuevo curso
        public static function insertCourse($conn, $nombre, $fecha_inicio, $fecha_fin){
           
    
            if(isset($conn)){
                try{
                    include_once '../entities/Course.inc.php';
                    $sql = "INSERT INTO cursos (nombre, fecha_inicio, fecha_fin)
                    VALUES (:nombre, :fecha_inicio, :fecha_fin)";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                    $stmt ->bindParam(':fecha_inicio', $fecha_inicio, PDO::PARAM_STR);
                    $stmt ->bindParam(':fecha_fin', $fecha_fin, PDO::PARAM_STR);
                   
                    $stmt -> execute();
                    
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
           
        }
       
    }

?>