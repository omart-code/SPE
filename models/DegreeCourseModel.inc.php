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
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
           
        }

        public static function getDegreeCoursesByDegree($conn, $id_grado){
           
    
            $degrees = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/DegreeCourse.inc.php';
                    $sql = "SELECT * FROM cursos_grados WHERE id_grado = :id_grado";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_grado', $id_grado, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
                    if(count($res)){
                        foreach($res as $degree){
                            $degrees[] = new DegreeCourse(
                                $degree['id_curso_grado'], $degree['id_curso'], $degree['id_grado'], $degree['nombre'], $degree['activo']);
                        } 
                     }else{
                            print 'No hi ha cursos graus disponibles';
                        }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $degrees;
    
           
        }


        public static function getDegreeCoursesById($conn, $id_curso_grado){
           
    
            $degrees = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/DegreeCourse.inc.php';
                    $sql = "SELECT * FROM cursos_grados WHERE id_curso_grado = :id_curso_grado";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_curso_grado', $id_curso_grado, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
                    if(count($res)){
                        foreach($res as $degree){
                            $degrees[] = new DegreeCourse(
                                $degree['id_curso_grado'], $degree['id_curso'], $degree['id_grado'], $degree['nombre'], $degree['activo']);
                        } 
                     }else{
                            print 'No hi ha cursos graus disponibles';
                        }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $degrees;
    
           
        }

    }

?>