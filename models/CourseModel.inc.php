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
         //Devuelve un curso a partir del nombre
         public static function getCourseByNameAndDate($conn, $nombre, $fecha_inicio, $fecha_fin){
            $course = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Course.inc.php';
                    $sql = "SELECT * FROM cursos WHERE nombre = :nombre AND fecha_inicio = :fecha_inicio AND fecha_fin = :fecha_fin";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                    $stmt ->bindParam(':fecha_inicio', $fecha_inicio, PDO::PARAM_STR);
                    $stmt ->bindParam(':fecha_fin', $fecha_fin, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
    
                    if(!empty($res)){
                        $course = new Course( $res['id_curso'],$res['nombre'],$res['fecha_inicio'], $res['fecha_fin']);
                    }
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
            return $course;
        }
       
       
       
    }

?>