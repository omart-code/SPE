<?php

    class DegreeCourseModel{

        //Inserta un nuevo departamento_grado
        public static function insertDegreeCourse($conn, $id_curso, $id_grado, $nombre, $activo ){
           
    
            if(isset($conn)){
                try{
                    include_once '../entities/DegreeCourse.inc.php';
                    $sql = "INSERT INTO cursos_grados (id_curso, id_grado, nombre, activo)
                    VALUES (:id_curso, :id_grado, :nombre, :activo)";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_curso', $id_curso, PDO::PARAM_STR);
                    $stmt ->bindParam(':id_grado', $id_grado, PDO::PARAM_STR);
                    $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                    $stmt ->bindParam(':activo', $activo, PDO::PARAM_STR);
                   
                    $stmt -> execute();
                    
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
           
        }

    }

?>