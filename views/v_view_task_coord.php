<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $title = 'SPE';
    include '../includes/libraries.inc.php';
     include '../includes/doc-declaration.inc.php';
     include_once '../controllers/TaskController.inc.php';
     include_once '../controllers/InternshipController.inc.php';
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
    <br>
        <div class="card text-center">
                <div class="card-body">
                <?php
                   Connection::openConnection();
                    $internship = InternshipController::getStudentInternship(Connection::getConnection(), $_GET['niu']);
                    $cursoGrado = $internship-> getIdDegreeCourse();
                  
                   $task = TaskController::getTaskByNumAndDegreeCourse(Connection::getConnection(), $_GET['task'], $cursoGrado);
                   
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
                $teacherMessage = TeacherMessageController::getTeacherMessageByNum(Connection::getConnection(), $_GET['task'],$_SESSION['niu']);
               
                if($teacherMessage != null){
                   
                    echo html_entity_decode($teacherMessage->getTeacherMessageMessage(), ENT_COMPAT, 'UTF-8'); //muestra el mensaje modificado si lo ha sido
                }else{
                  
                   //muestra el mensaje original de la tarea
                   echo html_entity_decode($task->getTaskMessage(), ENT_COMPAT, 'UTF-8');
                   
                }
               
               /*  $message = TeacherMessageController::getTeacherMessageById(Connection::getConnection(), $_GET['task'], $_SESSION["niu"]);
               
                echo $message->getTeacherMessageMessage(); */
               

            ?>


         </div>
         <div class="buttons text-right">
         <button class="btn btn-success" id="editar" role="button">
              Editar
         </button>
         <br>
         <br>

         <button class="btn btn-success restaurar" id="restablecer" name="restablecer" role="button" onClick="restoreMessage(<?php echo  $_GET['task']?>,<?php echo $_SESSION['niu'] ?>,<?php echo $cursoGrado ?>,<?php echo $_GET['niu'] ?>)">
              Restablir
         </button>
       
         </div>

        <br><br>

        </div>
         
        <?php 
        
            /*  if(isset($_POST['aceptarMensaje'])){
               // TeacherMessageController::updateTeacherMessageByTask(Connection::getConnection(), $_GET['task'], $_POST['editordata'], $_SESSION["niu"]);
               Connection::openConnection();
               $teacherMessage = TeacherMessageController::getTeacherMessageByNum(Connection::getConnection(),$_GET['task'],$_SESSION['niu']);
             
              if($teacherMessage != null){
                TeacherMessageController::updateTeacherMessageByNum(Connection::getConnection(),$_GET['task'], $_POST['editordata'], $_SESSION["niu"]); ?>
                <script>reload(<?php echo $_GET['task']?>, <?php echo $_GET['niu'] ?>)</script>
              <?php }else{
                TeacherMessageController::insertTeacherMessage(Connection::getConnection(), $_GET['task'],$_POST['editordata'],$_SESSION["niu"]); ?>
                <script>reload(<?php echo $_GET['task']?>, <?php echo $_GET['niu'] ?>)</script>
              <?php } ?>
               
              
               <!--  echo '<script>window.location.replace("'.TASK."?task=".$_GET['task']."&niu=".$_GET['niu']."&rol=teacher";'")</script>';
                echo '<script> window.location.replace("http://localhost/spe/views/v_view_task.php?task=".$_GET['task']."&niu=".$_GET['niu']."&rol=teacher")</script>'; -->
               
             <?php } */

        ?>

<div class="container-fluid" style="width:80%;">
         
            
                <div class="editor" style="display:none;">
                   
                    <label name="guia"><b>Guia:</b></label><br><br>
                        <textarea id="summernote" name="editordata">
                        <?php 
                        if($teacherMessage !=null){
                            echo $teacherMessage->getTeacherMessageMessage();
                        }else{
                            echo $task->getTaskMessage();
                        }
                       ?>
                        </textarea>
                
                    <br><br>
                    <div class="aceptar text-right">
                    <button type="submit" name="aceptarMensaje" onClick="editMessage(<?php echo  $_GET['task']?>,<?php echo $_SESSION['niu'] ?>, <?php echo $_GET['niu'] ?>)" class="btn btn-success">Acceptar</button> <br><br>
                    </div>
                   
                   
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
function editMessage(id_tarea, niu, niuEstudiante){

   var  mensaje = $('#summernote').val();
   
   $.confirm({
      title: "Atenció!",
      content:
        "Es modificarà el misstage original, estàs segur/a?",
      buttons: {
        accepta: {
          btnClass: "btn-success",
          action: function () {
            $.ajax({          
                type: "POST",
            url: "../proc/editMessage.php",
            data:'id_tarea='+id_tarea+'&niu='+niu+'&mensaje='+mensaje,
            success: async function(data){
               
               await window.location.replace("http://localhost/spe/views/v_view_task_coord.php?task="+id_tarea+"&niu="+niuEstudiante+"&rol=coordinator");
            },
            error: function(err){
                console.log('error:'+err);
            }
                });
         
          },
        },
        cancela: {
          btnClass: "btn-secondary",
          action: function () {
            $.alert("Cancel·lat!");
          },
        },
      },
    });

}
</script>
<script>

function restoreMessage(id_tarea, niu, cursoGrado, niuEstudiante){
 
    
    $.confirm({
      title: "Atenció!",
      content:
        "Es restablirà la plantilla del missatge al missatge original, estàs segur/a?",
      buttons: {
        accepta: {
          btnClass: "btn-success",
          action: function () {
            $.ajax({          
            type: "POST",
            url: "../proc/restoreMessage.php",
            data:'id_tarea='+id_tarea+'&niu='+niu+'&cursoGrado='+cursoGrado+'&niuEstudiante='+niuEstudiante,
            success: async function(data){
               
                await window.location.replace("http://localhost/spe/views/v_view_task_coord.php?task="+id_tarea+"&niu="+niuEstudiante+"&rol=coordinator");
            },
            error: function(err){
                console.log('error:'+err);
            }
                });
         
          },
        },
        cancela: {
          btnClass: "btn-secondary",
          action: function () {
            $.alert("Cancel·lat!");
          },
        },
      },
    });
 
};

</script>

<script>
function gotoInternshipPage(){
   
    window.location.replace("<?php echo VIEWINTERNSHIPCOORD.'&niu='.$_GET['niu']; ?> ")
}
</script>
