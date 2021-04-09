<?php

    class CourseModel{

        //Inserta un nuevo curso en la bd
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

        //Obtener todos los cursos disponibles
        public static function getCourses($conn){
           
    
            $courses = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Course.inc.php';
                    $sql = "SELECT * FROM cursos";
                    $stmt = $conn -> prepare($sql);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
                    if(count($res)){
                        foreach($res as $course){
                            $courses[] = new Course(
                                $course['id_curso'], $course['nombre'], $course['fecha_inicio'], $course['fecha_fin']);
                        } 
                     }else{
                            print 'No hi ha cursos disponibles';
                        }
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
            return $courses;
    
           
        }
       
       
    }

?>