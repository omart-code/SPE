<?php

    class TeacherMessageModel{

        //Devuelve el mensaje a partir de la tarea
        public static function getTeacherMessageByNum($conn, $num_tarea, $niu_profesor){
            $message = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/TeacherMessage.inc.php';
                    $sql = "SELECT * FROM mensajes_profesor WHERE num_tarea = :num_tarea AND niu_profesor = :niu_profesor";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':num_tarea', $num_tarea, PDO::PARAM_STR);
                    $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
                    if(!empty($res)){
                        $message = new TeacherMessage( $res['id_mensaje_profesor'],$res['num_tarea'],$res['mensaje'], $res['niu_profesor']);
                    }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $message;
        }

        public static function insertTeacherMessage($conn, $num_tarea, $mensaje, $niu_profesor){
            
            if(isset($conn)){
                try{
                    
                    $sql = "INSERT INTO mensajes_profesor (num_tarea, mensaje, niu_profesor)
                    VALUES (:num_tarea, :mensaje, :niu_profesor)";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':num_tarea', $num_tarea, PDO::PARAM_STR);
                    $stmt ->bindParam(':mensaje', $mensaje, PDO::PARAM_STR);
                    $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                   
                    
                
                    $stmt -> execute();
                    
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
        }

        //Actualiza el mensaje de la tarea que el profesor ha modificado
        public static function updateTeacherMessageByNum($conn, $num_tarea, $mensaje, $niu_profesor){
    
            if(isset($conn)){
                try{
                    include_once '../entities/TeacherMessage.inc.php';
                    $sql = "UPDATE mensajes_profesor SET mensaje = :mensaje WHERE num_tarea = :num_tarea AND niu_profesor = :niu_profesor";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':num_tarea', $num_tarea, PDO::PARAM_STR);
                    $stmt ->bindParam(':mensaje', $mensaje, PDO::PARAM_STR);
                    $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                    $stmt -> execute();
                  
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
           
        }

       

        //Restablece el mensaje del profesor a su valor original
        public static function restoreMessageByTask($conn, $num_tarea, $niu_profesor, $id_curso_grado){
    
            if(isset($conn)){
                try{
                    include_once '../entities/TeacherMessage.inc.php';
                    $sql = "UPDATE mensajes_profesor mp INNER JOIN tareas t ON mp.num_tarea = t.num_tarea SET mp.mensaje = t.mensaje
                    WHERE mp.num_tarea = :num_tarea  AND mp.niu_profesor = :niu_profesor AND t.num_tarea = :num_tarea AND t.id_curso_grado = :id_curso_grado";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':num_tarea', $num_tarea, PDO::PARAM_STR);
                    $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                    $stmt ->bindParam(':id_curso_grado', $id_curso_grado, PDO::PARAM_STR);
                    $stmt -> execute();
                  
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
           
        }
       
    }

?>