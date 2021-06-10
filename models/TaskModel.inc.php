<?php

    class TaskModel{

        //Devuelve todas las tareas que pertenecen a una fase
        public static function getTasksByPhase($conn, $id_etapa, $id_curso_grado){ 
            $tasks = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Task.inc.php';
                    $sql = "SELECT * FROM tareas WHERE id_etapa = :id_etapa AND id_curso_grado = :id_curso_grado";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_etapa', $id_etapa, PDO::PARAM_STR);
                    $stmt ->bindParam(':id_curso_grado', $id_curso_grado, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
    
                    if(count($res)){
                        foreach($res as $task){
                            $tasks[] = new Task(
                                $task['id_tarea'], $task['num_tarea'], $task['id_etapa'],$task['nombre'],
                                $task['mensaje'],$task['accion1'],$task['accion2'],$task['accion3'], $task['numero_acciones'], $task['porcentaje']);
                            }}else{
                                print '';
                            }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $tasks;
        }

        //Devuelve todas las tareas en función del curso grado correspondiente
        public static function getTasksByDegreeCourse($conn, $id_curso_grado){
            $tasks = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Task.inc.php';
                    $sql = "SELECT * FROM tareas WHERE id_curso_grado = :id_curso_grado";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_curso_grado', $id_curso_grado, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
    
                    if(count($res)){
                        foreach($res as $task){
                            $tasks[] = new Task(
                                $task['id_tarea'], $task['num_tarea'], $task['id_etapa'],$task['nombre'],
                                $task['mensaje'],$task['accion1'],$task['accion2'],$task['accion3'], $task['numero_acciones'], $task['porcentaje']);
                            }}else{
                                print '';
                            }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
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
                            $res['id_tarea'], $task['num_tarea'], $res['id_etapa'],$res['nombre'],
                            $res['mensaje'],$res['accion1'],$res['accion2'],$res['accion3'], $res['numero_acciones'], $res['porcentaje']);
                    }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }

            return $task;
        }

        public static function getTaskByNumAndDegreeCourse($conn, $num_tarea, $id_curso_grado){ 
        
            $task = null;

            if(isset($conn)){
                try{
                    include_once '../entities/Task.inc.php';
                    $sql = "SELECT * FROM tareas t WHERE t.num_tarea = :num_tarea AND id_curso_grado = :id_curso_grado";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':num_tarea', $num_tarea, PDO::PARAM_STR);
                    $stmt ->bindParam(':id_curso_grado', $id_curso_grado, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();

                    if(!empty($res)){
                        $task = new Task(
                            $res['id_tarea'], $task['num_tarea'], $res['id_etapa'],$res['nombre'],
                            $res['mensaje'],$res['accion1'],$res['accion2'],$res['accion3'], $res['numero_acciones'], $res['porcentaje']);
                    }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
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
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $actions;
        }

        //Inserta 9 tareas para un curso grado
        public static function insertTasksByDegreeCourse($conn, $id_curso_grado){
            if(isset($conn)){
                try{
                    
                    $sql = "INSERT INTO tareas
                    (num_tarea, id_etapa, nombre, mensaje, accion1, accion2, accion3, numero_acciones, porcentaje, id_curso_grado)
                    SELECT num_tarea, id_etapa, nombre, mensaje, accion1, accion2, accion3, numero_acciones, porcentaje, :id_curso_grado
                    FROM plantillas_tareas";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_curso_grado', $id_curso_grado, PDO::PARAM_STR);
                    $stmt -> execute();
                    
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
        }
       
    }

?>


