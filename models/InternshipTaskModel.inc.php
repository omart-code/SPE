<?php

    class InternshipTaskModel{

        //Devuelve los datos relativos a las tareas de una determinada fase de la estancia
        public static function getInternshipTasksByPhase($conn, $id_estancia, $id_etapa){
           $internshipTasks = [];
    
            if(isset($conn)){
                try{
                    include_once '../entities/InternshipTask.inc.php';
                    $sql = "SELECT t.id_tarea, te.fecha_prevista_tarea, te.fecha_realiz_accion1, te.fecha_realiz_accion2, te.fecha_realiz_accion3
                    FROM tareas t
                    INNER JOIN tareas_estancias te ON te.id_tarea = t.id_tarea
                    WHERE t.id_etapa = :id_etapa AND te.id_estancia = :id_estancia;";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_estancia', $id_estancia, PDO::PARAM_STR);
                    $stmt ->bindParam(':id_etapa', $id_etapa, PDO::PARAM_STR);     
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
                    if(count($res)){
                        foreach($res as $intTask){
                            $internshipTasks[] = new InternshipTask(null, null,
                                null, $intTask['id_tarea'],  $intTask['fecha_prevista_tarea'], $intTask['fecha_realiz_accion1'],$intTask['fecha_realiz_accion2'], 
                                $intTask['fecha_realiz_accion3'],
                                );
                        } 
                     }else{
                            print '';
                        }
                    
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
            return $internshipTasks;
           
        }

        public static function getInternshipTasksByInternshipId($conn, $id_estancia){
            $internshipTasks = [];
     
             if(isset($conn)){
                 try{
                     include_once '../entities/InternshipTask.inc.php';
                     $sql = "SELECT *
                     FROM tareas_estancias te
                     WHERE te.id_estancia = :id_estancia;";
                     $stmt = $conn -> prepare($sql);
                     $stmt ->bindParam(':id_estancia', $id_estancia, PDO::PARAM_STR);  
                     $stmt -> execute();
                     $res = $stmt-> fetchAll();
                     if(count($res)){
                         foreach($res as $intTask){
                             $internshipTasks[] = new InternshipTask(null, null,
                                 null, $intTask['id_tarea'],  $intTask['fecha_prevista_tarea'], $intTask['fecha_realiz_accion1'],$intTask['fecha_realiz_accion2'], 
                                 $intTask['fecha_realiz_accion3'],
                                 );
                         } 
                      }else{
                             print '';
                         }
                     
                 }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                 }
             }
             return $internshipTasks;
            
         }

         //Actualiza o setea las fechas previstas de realicación de las tareas en funcion de la tarea y la estancia
        public static function updateTaskDate($conn, $id_tarea, $id_estancia, $fecha_prevista){
            $student = null;
    
            if(isset($conn)){
                try{
                   
                    $sql = "UPDATE tareas_estancias SET fecha_prevista=:fecha_prevista WHERE id_tarea = :id_tarea AND id_estancia = :id_estancia";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_tarea', $id_tarea, PDO::PARAM_STR);
                    $stmt ->bindParam(':id_estancia', $id_estancia, PDO::PARAM_STR);
                    $stmt ->bindParam(':fecha_prevista', $fecha_prevista, PDO::PARAM_STR);
                   
                    $stmt -> execute();
                  
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
           
        }

 

    }

?>