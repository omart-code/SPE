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
                            $degrees = new DegreeCourse(
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

        public static function getDegreeCourseByCourseAndDegree($conn, $id_curso, $id_grado){
           
    
            $degree = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/DegreeCourse.inc.php';
                    $sql = "SELECT * FROM cursos_grados WHERE id_curso = :id_curso AND id_grado = :id_grado";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_curso', $id_curso, PDO::PARAM_STR);
                    $stmt ->bindParam(':id_grado', $id_grado, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
                    
                    if(!empty($res)){
                        $degree = new DegreeCourse( $res['id_curso_grado'],$res['id_curso'],$res['id_grado'], $res['nombre'], $res['activo']);
                    }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $degree;
    
           
        }


         //Devuelve los nombres de cursos grados que tiene asignados un profesor
         public static function getDepartmentByDegree($conn, $niu_profesor){
            $degreeCourses = null;
    
            if(isset($conn)){
                try{
                   
                    $sql = "SELECT cg.nombre, cg.id_curso_grado, cg.id_grado FROM profesores_curso_grado pc INNER JOIN cursos_grados cg ON
                     cg.id_curso_grado = pc.id_curso_grado WHERE pc.niu_profesor = :niu_profesor";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
                    if(count($res)){
                        foreach($res as $dg){
                            $degreeCourses[] = $dg;
                        } 
                     }else{
                            print 'No hi ha departaments disponibles';
                        }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $degreeCourses;
        }
       

    }

?>