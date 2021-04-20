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

        //Devuelve la información de la tarea a partir de su id
        public static function getTaskById($conn, $id_tarea){ 
        
            $task = null;

            if(isset($conn)){
                try{
                    include_once '../entities/Task.inc.php';
                    $sql = "SELECT * FROM tareas t WHERE t.id_tarea = :id_tarea";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_tarea', $id_tarea, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();

                    if(!empty($res)){
                        $task = new Task(
                            $res['id_tarea'], $res['id_etapa'], $res['id_curso_grado'],$res['nombre'],$res['informacion'],
                            $res['mensaje'],$res['accion1'],$res['accion2'],$res['accion3'], $res['numero_acciones']);
                    }
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }

            return $task;
        }

        //Devuelve las acciones de una tarea
        public static function getTasksActions($conn, $id_tarea){ 
            $actions = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Action.inc.php';
                    $sql = "SELECT a.id_accion, a.descripcion
                    FROM tareas t
                    INNER JOIN acciones a ON a.id_accion = t.accion1 OR a.id_accion = t.accion2 OR a.id_accion = t.accion3
                    WHERE t.id_tarea = :id_tarea;";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_tarea', $id_tarea, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
    
                    if(count($res)){
                        foreach($res as $action){
                            $actions[] = new Action(
                                $action['id_accion'], $action['descripcion']);
                            }}else{
                                print '';
                            }
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
            return $actions;
        }
       
    }

?>


