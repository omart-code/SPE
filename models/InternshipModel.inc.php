<?php
class InternshipModel {

    //Muestra los datos de estancia relativos a un niu de estudiante
    public static function getStudentInternship($conn, $niu_estudiante){
        $internship = null;

            if(isset($conn)){
                try{
                    include_once '../entities/Internship.inc.php';
                    $sql = "SELECT * FROM estancias e WHERE e.niu_estudiante = :niu_estudiante";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':niu_estudiante', $niu_estudiante, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();

                    if(!empty($res)){
                        $internship = new Internship(
                            $res['id_estancia'], $res['niu_estudiante'], $res['niu_profesor'], $res['fecha_inicio'], 
                            $res['fecha_fin'], $res['id_tutor_externo'], $res['id_empresa'], $res['nota'], $res['finalizada'], $res['id_curso_grado'],
                            );
                    }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }

            return $internship;
     }

      //Actualiza los fechas de estancia en funcion del niu del estudiante que hace la estancia
      public static function updateInternshipDates($conn, $niu_estudiante, $fecha_inicio, $fecha_fin){
        $student = null;

        if(isset($conn)){
            try{
                include_once '../entities/Student.inc.php';
                $sql = "UPDATE estancias SET fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin WHERE niu_estudiante = :niu_estudiante";
                $stmt = $conn -> prepare($sql);
                $stmt ->bindParam(':niu_estudiante', $niu_estudiante, PDO::PARAM_STR);
                $stmt ->bindParam(':fecha_inicio', $fecha_inicio, PDO::PARAM_STR);
                $stmt ->bindParam(':fecha_fin', $fecha_fin, PDO::PARAM_STR);
                
                $stmt -> execute();
              
            }catch (PDOException $ex){
                echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
            }
        }

       
    }

     //Muestra las estancias 
     public static function getInternships($conn){
        $internships = null;

            if(isset($conn)){
                try{
                    include_once '../entities/Internship.inc.php';
                    $sql = "SELECT * FROM estancias";
                    $stmt = $conn -> prepare($sql);
                    
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
                    if(count($res)){
                        foreach($res as $intern){
                            $internships[] = new Internship(
                                $intern['id_estancia'], $intern['niu_estudiante'], $intern['niu_profesor'], $intern['fecha_inicio'], 
                                $intern['fecha_fin'], $intern['id_tutor_externo'], $intern['id_empresa'], $intern['nota'], $intern['finalizada'], $intern['id_curso_grado'],
                                );
                        } 
                     }else{
                            print 'No hi ha estancies disponibles';
                        }
                    
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }

            return $internships;
     }

     //Muestra las estancias que pertenecen a un profesor
     public static function getTeacherInternships($conn, $niu_profesor){
        $internships = null;
        $currentDate = date('Y-m-d');
       
            if(isset($conn)){
                try{
                    include_once '../entities/Internship.inc.php';
                    $sql = "SELECT e.id_estancia, e.niu_estudiante, e.niu_profesor, e.fecha_inicio, e.fecha_fin, e.finalizada, te.fecha_prevista_tarea, te.finalizada as tarea_finalizada FROM 
                    estancias e INNER JOIN tareas_estancias te ON te.id_estancia = e.id_estancia WHERE e.niu_profesor = :niu_profesor and e.finalizada = 0 AND te.fecha_prevista_tarea < :currentDate AND te.finalizada = 0 GROUP BY e.niu_estudiante";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                    $stmt ->bindParam(':currentDate', $currentDate, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
                    if(count($res)){
                        foreach($res as $intern){
                            $internships[] = $intern;
                        } 
                     }else{
                            print 'No hi ha estancies disponibles';
                        }
                    
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }

            return $internships;
     }

     public static function getInfoInternshipsByTeacher($conn, $niu_profesor, $id_curso_grado){
         $infos = null;
         if(isset($conn)){
            try{
                
                $sql = "SELECT es.nombre, es.apellido, es.niu_estudiante, e.id_estancia, e.finalizada FROM estancias e INNER JOIN estudiantes es ON es.niu_estudiante = e.niu_estudiante WHERE e.niu_profesor = :niu_profesor AND e.id_curso_grado = :id_curso_grado";
                $stmt = $conn -> prepare($sql);
                $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                $stmt ->bindParam(':id_curso_grado', $id_curso_grado, PDO::PARAM_STR);
                $stmt -> execute();
                $res = $stmt-> fetchAll();
                if(count($res)){
                    foreach($res as $info){
                        $infos[] = $info;
                    } 
                 }
                
            }catch (PDOException $ex){
                echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
            }
            return $infos;
     }
    }

    public static function getInfoInternships($conn, $id_curso_grado){
        $infos = null;
        if(isset($conn)){
           try{
               
               $sql = "SELECT es.nombre, es.apellido, p.nombre as nombre_profesor, p.apellido as apellido_profesor, es.niu_estudiante, e.id_estancia, e.finalizada, e.id_curso_grado FROM estancias e
               INNER JOIN estudiantes es ON es.niu_estudiante = e.niu_estudiante
               INNER JOIN profesores p ON p.niu_profesor = e.niu_profesor WHERE e.niu_profesor LIKE '1%' AND e.id_curso_grado = :id_curso_grado";
               $stmt = $conn -> prepare($sql);
               $stmt ->bindParam(':id_curso_grado', $id_curso_grado, PDO::PARAM_STR);
               $stmt -> execute();
               $res = $stmt-> fetchAll();
               if(count($res)){
                   foreach($res as $info){
                       $infos[] = $info;
                   } 
                }else{
                       print '';
                   }
               
           }catch (PDOException $ex){
            echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
           }
           return $infos;
         }

    }

    //función que inserta una nueva estancia, aunque no todos los campos..
    public static function insertInternship($conn, $niu_estudiante, $niu_profesor, $fecha_inicio, $fecha_fin, $id_curso_grado){
           
    
        if(isset($conn)){
            try{
                
                $sql = "INSERT INTO estancias (niu_estudiante, niu_profesor, fecha_inicio, fecha_fin, id_curso_grado)
                VALUES (:niu_estudiante, :niu_profesor, :fecha_inicio, :fecha_fin, :id_curso_grado)";
                $stmt = $conn -> prepare($sql);
                $stmt ->bindParam(':niu_estudiante', $niu_estudiante, PDO::PARAM_STR);
                $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                $stmt ->bindParam(':fecha_inicio', $fecha_inicio, PDO::PARAM_STR);
                $stmt ->bindParam(':fecha_fin', $fecha_fin, PDO::PARAM_STR);
                $stmt ->bindParam(':id_curso_grado', $id_curso_grado, PDO::PARAM_STR);
               
                $stmt -> execute();
                
            }catch (PDOException $ex){
                echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
            }
        }

       
    }

    public static function updateInternshipTeacherAndCompany($conn, $niu_estudiante, $id_tutor_externo, $id_empresa){
        
        if(isset($conn)){
            try{
              
                $sql = "UPDATE estancias SET id_tutor_externo=:id_tutor_externo, id_empresa=:id_empresa WHERE niu_estudiante = :niu_estudiante";
                $stmt = $conn -> prepare($sql);
                $stmt ->bindParam(':niu_estudiante', $niu_estudiante, PDO::PARAM_STR);
                $stmt ->bindParam(':id_tutor_externo', $id_tutor_externo, PDO::PARAM_STR);
                $stmt ->bindParam(':id_empresa', $id_empresa, PDO::PARAM_STR);
                
                $stmt -> execute();
              
            }catch (PDOException $ex){
                echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
            }
        }

       
    }

    public static function updateInternshipDone($conn, $id_estancia){
        
        if(isset($conn)){
            try{
              
                $sql = "UPDATE estancias SET finalizada='1' WHERE id_estancia = :id_estancia";
                $stmt = $conn -> prepare($sql);
                $stmt ->bindParam(':id_estancia', $id_estancia, PDO::PARAM_STR);
               
                
                $stmt -> execute();
              
            }catch (PDOException $ex){
                echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
            }
        }

       
    }

    

}
?>