<?php
include_once '../models/TemplateMessageModel.inc.php';
class TemplateMessageController {

    public function getTemplateMessageById($conn, $id_tarea){
  
    $message = TemplateMessageModel::getTemplateMessageById($conn, $id_tarea);
    return $message;
        
    }

  

}



?>