<?php

    class TaskModel{

        //Devuelve todas las tareas que pertenecen a una fase
        public static function getTasksByPhase($conn, $id_etapa){ //TAL VEZ TAMBIEN DEBAS PASAR CURSO GRADO, NO?
            $tasks = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Task.inc.php';
                    $sql = "SELECT * FROM tareas WHERE id_etapa = :id_etapa";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_etapa', $id_etapa, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
    
                    if(count($res)){
                        foreach($res as $task){
                            $tasks[] = new Task(
                                $task['id_tarea'], $task['id_etapa'], $task['id_curso_grado'],$task['nombre'],$task['informacion'],
                                $task['mensaje'],$task['accion1'],$task['accion2'],$task['accion3'], $task['numero_acciones']);
                            }}else{
                                print '';
                            }
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
            return $tasks;
        }
       
    }

?>