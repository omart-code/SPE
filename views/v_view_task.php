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
     include_once '../app/Redirection.inc.php';
     include_once '../app/Connection.inc.php'; 
    ?>
</head>
<body>
    <?php include '../includes/navbar.inc.php'; ?>
    <br>
    <div class="container h-100">
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
         <div class="info">
         <h3>Accions a realitzar:</h3>
         <ol>
            <?php
              Connection::openConnection();
              $actions = TaskController::getTasksActions(Connection::getConnection(), $_GET['task']);
              
              foreach ($actions as $key => $act) {
                 echo "<li>".$act-> getActionDescription(). "</li>";
              }

            ?>
         </ol>
         
         
         </div>
         <br>
         <br>
         <div class="mensaje">
             <?php
                Connection::openConnection();
                $message = TeacherMessageController::getTeacherMessageById(Connection::getConnection(), $_GET['task'], $_SESSION["niu"]);
               
                echo $message->getTeacherMessageMessage();
               

            ?>
         </div>
         <div class="buttons text-right">
         <button class="btn btn-success" id="editar" role="button">
              Editar
         </button>
         <button class="btn btn-success restablecer" id="restablecer" role="button">
              Restablir
         </button>
         <!-- TODO: AL HACER RESTABLECER SALE EL MODAL DE RESTABLECER, HACER QUE AL ACEPTAR UPDATE DE TABLA MENSAJES PROFESOR, POR EL CONTENIDO DE MENSAJES PLANTILLA + REFRESH -->
         </div>

        <br><br>

        </div>
         
        <?php 
        
             if(isset($_POST['aceptarMensaje'])){
                TeacherMessageController::updateTeacherMessageByTask(Connection::getConnection(), $_GET['task'], $_POST['editordata'], $_SESSION["niu"]);
               
                //TODO: HACE MODIFICACION DEL COMENTARIO, PERO EL MISMO PROBLEMA DE SIEMPRE DE LA REDIRECCION Y REFRESH PAGINA
             }

        ?>

        <div class="container">
         
            
                <div class="editor" style="display:none;">
                    <form class="form" method="post">
                    <label name="guia"><b>Guia:</b></label><br><br>
                        <textarea id="summernote" name="editordata">
                        <?php echo $message->getTeacherMessageMessage() ?>
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
        <div class="container">
        <button type="button" class=" btn btn-secondary" onclick="history.back(-1)"><i class="fas fa-arrow-left"></i> Torna Enrere</button>
        </div>
       
    </div>

</body>
</html>

<script>
      $('#summernote').summernote({
        tabsize: 2,
        height: 200
      });
    </script>