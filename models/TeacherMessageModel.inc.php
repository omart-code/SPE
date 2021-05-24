<?php

    class TeacherMessageModel{

        //Devuelve el mensaje a partir de la tarea
        public static function getTeacherMessageById($conn, $id_tarea, $niu_profesor){
            $message = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/TeacherMessage.inc.php';
                    $sql = "SELECT * FROM mensajes_profesor WHERE id_tarea = :id_tarea AND niu_profesor = :niu_profesor";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_tarea', $id_tarea, PDO::PARAM_STR);
                    $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
                    if(!empty($res)){
                        $message = new TeacherMessage( $res['id_mensaje_profesor'],$res['id_tarea'],$res['mensaje'], $res['niu_profesor']);
                    }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $message;
        }

        public static function insertTeacherMessage($conn, $id_tarea, $mensaje, $niu_profesor){
            
            if(isset($conn)){
                try{
                    
                    $sql = "INSERT INTO mensajes_profesor (id_tarea, mensaje, niu_profesor)
                    VALUES (:id_tarea, :mensaje, :niu_profesor)";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_tarea', $id_tarea, PDO::PARAM_STR);
                    $stmt ->bindParam(':mensaje', $mensaje, PDO::PARAM_STR);
                    $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                   
                    
                
                    $stmt -> execute();
                    
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
        }

        //Actualiza el mensaje de la tarea que el profesor ha modificado
        public static function updateTeacherMessageByTask($conn, $id_tarea, $mensaje, $niu_profesor){
    
            if(isset($conn)){
                try{
                    include_once '../entities/TeacherMessage.inc.php';
                    $sql = "UPDATE mensajes_profesor SET mensaje = :mensaje WHERE id_tarea = :id_tarea AND niu_profesor = :niu_profesor";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_tarea', $id_tarea, PDO::PARAM_STR);
                    $stmt ->bindParam(':mensaje', $mensaje, PDO::PARAM_STR);
                    $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                    $stmt -> execute();
                  
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
           
        }

       

        //Restablece el mensaje del profesor a su valor original
        public static function restoreMessageByTask($conn, $id_tarea, $niu_profesor){
    
            if(isset($conn)){
                try{
                    include_once '../entities/TeacherMessage.inc.php';
                    $sql = "UPDATE mensajes_profesor mp INNER JOIN plantillas_mensajes p ON mp.id_tarea = p.id_tarea SET mp.mensaje = p.mensaje WHERE mp.id_tarea = :id_tarea AND mp.niu_profesor = :niu_profesor ";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_tarea', $id_tarea, PDO::PARAM_STR);
                    $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                    $stmt -> execute();
                  
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
           
        }
       
    }

?>