<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $title = 'TASK';
    include '../includes/libraries.inc.php';
     include '../includes/doc-declaration.inc.php';
     include_once '../controllers/TaskController.inc.php';
     include_once '../controllers/TeacherMessageController.inc.php';
     include_once '../controllers/TemplateMessageController.inc.php';
     include_once '../app/Redirection.inc.php';
     include_once '../app/Connection.inc.php'; 
    ?>
</head>
<body>
    <?php include '../includes/navbar.inc.php'; ?>
    <br>
    <div class="container-fluid" style="width:80%;">
    <br>
    <h1>Modificació de la tasca</h1>
    
        <div class="card text-center">
                <div class="card-body">
                <?php
                   Connection::openConnection();

                   $task = TaskController::getTaskById(Connection::getConnection(), $_GET['task']);
                   
                ?>
                    <h2 class="card-text"><b>Informació de la tasca - <?php echo $task->getTaskName(); ?></b> </h2>
                   
                </div>
    
         </div>
         <br>
         <br>
        
         
         
        
         <br>
         <br>
         <div >
             <?php
                Connection::openConnection();
                $teacherMessage = TeacherMessageController::getTeacherMessageById(Connection::getConnection(), $task->getTaskId(),$_SESSION['niu']);
               
                if($teacherMessage != null){
                    
                    echo $teacherMessage->getTeacherMessageMessage();
                }else{
                    $message = TemplateMessageController::getTemplateMessageById(Connection::getConnection(), $task->getTaskId());
                  
                    echo $message;
                }
               
               /*  $message = TeacherMessageController::getTeacherMessageById(Connection::getConnection(), $_GET['task'], $_SESSION["niu"]);
               
                echo $message->getTeacherMessageMessage(); */
               

            ?>

            <?php  if(isset($_POST['restablecer'])){
                     TeacherMessageController::restoreMessageByTask(Connection::getConnection(),$_GET['task'], $_SESSION['niu']);
                     echo '<script>window.location.replace("'.TASK."?task=".$_GET['task']."&niu=".$_GET['niu'].'")</script>';
            }

            ?>

         </div>
         <div class="buttons text-right">
         <button class="btn btn-success" id="editar" role="button">
              Editar
         </button>
         <br>
         <br>
         <form method="POST">
         <button class="btn btn-success" id="restablecer" name="restablecer" role="button" onClick="return restoreMessage()">
              Restablir
         </button>
         </form>
         <!-- TODO: AL HACER RESTABLECER SALE EL MODAL DE RESTABLECER, HACER QUE AL ACEPTAR UPDATE DE TABLA MENSAJES PROFESOR, POR EL CONTENIDO DE MENSAJES PLANTILLA + REFRESH -->
         </div>

        <br><br>

        </div>
         
        <?php 
        
             if(isset($_POST['aceptarMensaje'])){
               // TeacherMessageController::updateTeacherMessageByTask(Connection::getConnection(), $_GET['task'], $_POST['editordata'], $_SESSION["niu"]);
               $teacherMessage = TeacherMessageController::getTeacherMessageById(Connection::getConnection(), $task->getTaskId(),$_SESSION['niu']);
               
               if($teacherMessage != null){
                TeacherMessageController::updateTeacherMessageByTask(Connection::getConnection(), $_GET['task'], $_POST['editordata'], $_SESSION["niu"]);
                 
               }else{
                TeacherMessageController::insertTeacherMessage(Connection::getConnection(), $_GET['task'],$_POST['editordata'],$_SESSION["niu"]);
               }
               
                echo '<script>window.location.replace("'.TASK."?task=".$_GET['task']."&niu=".$_GET['niu'].'")</script>';
               
             }

        ?>

<div class="container-fluid" style="width:80%;">
         
            
                <div class="editor" style="display:none;">
                    <form class="form" method="post">
                    <label name="guia"><b>Guia:</b></label><br><br>
                        <textarea id="summernote" name="editordata">
                        <?php 
                        if($teacherMessage !=null){
                            echo $teacherMessage->getTeacherMessageMessage();
                        }else{
                            echo $message;
                        }
                       ?>
                        </textarea>
                
                    <br><br>
                    <div class="aceptar text-right">
                    <button type="submit" name="aceptarMensaje" class="btn btn-success">Acceptar</button> <br><br>
                    </div>
                   
                    </form>
                    <div class="cancelar text-right">
                    <button class="btn btn-secondary" id="cancelar" role="button">Cancelar</button>
                    </div>
                    
                </div>
                   
        </div>
        <div class="container-fluid" style="width:80%;">
        <button type="button" class=" btn btn-secondary" onclick="gotoInternshipPage()"><i class="fas fa-arrow-left"></i> Torna Enrere</button>
        </div>
       
    </div>

</body>
</html>

<script>
$('#summernote').summernote({
    toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
  ]
      })
</script>
<script>
function gotoInternshipPage(){
    console.log('se clica el boton');
    window.location.replace("<?php echo VIEWINTERNSHIP.'?niu='.$_GET['niu'] ?> ")
}
</script>

<script>
function  restoreMessage(){
    var respuesta = confirm("Realment desitja restablir a la plantilla original?");
    if(respuesta == true){
        return true
    }else{
        return false
    }
}

</script>
