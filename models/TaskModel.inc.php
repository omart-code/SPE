<?php

    class TaskModel{

        //Devuelve todas las tareas que pertenecen a una fase
        public static function getTasksByPhase($conn, $id_etapa){ 
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
                                $task['id_tarea'], $task['id_etapa'],$task['nombre'],$task['informacion'],
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
                                $task['id_tarea'], $task['id_etapa'],$task['nombre'],$task['informacion'],
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
                            $res['id_tarea'], $res['id_etapa'],$res['nombre'],$res['informacion'],
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
                    
                    $sql = "INSERT IGNORE INTO tareas ( id_etapa, id_curso_grado, nombre, informacion, mensaje, accion1, accion2, accion3, numero_acciones, porcentaje)
                    VALUES 
                     ( '1', :id_curso_grado, 'Contacte inicial amb el estudiant', '1-Enviar mail al estudiant.
                        2-Rebre la seva resposta al nostre correu. ', '', '1', '2', '0', '2', '5'),
                        ( '1', :id_curso_grado, 'Contacte inicial amb la empresa', '1-Enviar mail al tutor de la empresa. 2-Rebre la seva resposta al nostre correu.',
                         ' ', '3', '4', '0', '2', '5'),
                        ( '2', :id_curso_grado, 'Primera entrevista de seguiment amb el estudiant', '1-Enviar mail o trucar al estudiant per quedar. 2-Rebre la seva resposta al nostre correu i concretar el dia de la trobada. 3-Entrevista de seguiment ',
                         ' ', '5', '6', '7', '3', '30'),
                        ( '2', :id_curso_grado, 'Seguiment amb el tutor extern', '1-Enviar mail al tutor extern per poder fer una trucada o entrevista online.
                        2-Rebre la seva resposta al nostre correu i concretar el dia de trobada.
                        3-Entrevista de seguiment', ' ', '8', '9', '10', '3', '50'),
                        ( '2', :id_curso_grado, 'Segona entrevista de seguiment amb el estudiant', '1-Enviar mail o trucar al estudiant per quedar. 2-Rebre la seva resposta al nostre correu i concretar el dia de la trobada.
                        3-Entrevista de seguiment', ' ', '11', '12', '13', '3', '60'),
                        ( '3', :id_curso_grado, 'Avís al estudiant de la finalització de la estada', '1-Enviar mail al estudiant.
                        2-Rebre memòria de la estada.
                        3-Confirmació de recepció.', ' ', '14', '15', '16', '3', '90'),
                        ( '3', :id_curso_grado, 'Avís al tutor extern de la finalització de la estada', '1-Enviar mail a la persona tutora de la entitat amb el informe que ha de omplir.
                        2-Rebre confirmació del correu.
                        3-Rebre informe de valoració de la estada del estudiant i enviar agraïment per el informe ', ' ', '17', '18', '19', '3', '90'),
                        ( '3', :id_curso_grado, 'Notificació de la nota final al alumne', 'Enviar mail amb la nota final. Per calcular la nota ha de fer servir el document Excel de càlcul de notes.',
                         ' ', '20', '', '', '1', '100'),
                        ( '3', :id_curso_grado, 'Enviament de informes al coordinador', '1-Enviar mail a la coordinació adjuntant els tres documents: memòria estudiant, informe entitat i informe nostre. ',
                         ' ', '21', '', '', '1', '100'); ";
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


