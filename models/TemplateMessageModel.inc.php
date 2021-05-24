<?php

    class TemplateMessageModel{

        //Devuelve todas las fases de la bd
        public static function getTemplateMessageById($conn, $id_tarea){
            $templateMessage = null;
    
            if(isset($conn)){
                try{
                 
                    $sql = "SELECT mensaje FROM plantillas_mensajes WHERE id_tarea= :id_tarea";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_tarea', $id_tarea, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
                    if(!empty($res)){
                        $templateMessage = $res['mensaje'];
                    }
                    
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
           return $templateMessage;
        }
       
    }

?>