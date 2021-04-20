<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../includes/libraries.inc.php';
     include_once '../controllers/TaskController.inc.php';
     include_once '../app/Connection.inc.php'; 
    $title = 'TASK'; ?>
</head>
<body>
    <?php include '../includes/navbar.inc.php'; ?>
    <div class="container h-100">
    <h1>VISTA DE UNA TASCA</h1>
        <div class="card text-center">
                <div class="card-body">
                <?php
                   Connection::openConnection();
                   $task = TaskController::getTaskById(Connection::getConnection(), $_GET['task']);
                ?>
                    <h2 class="card-text"><b>Informació del pas - <?php echo $task->getTaskName(); ?></b> </h2>
                   
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
         <div class="message">
         <?php /* echo $task->getTaskMessage(); */ ?>
         </div>
       
    </div>

</body>
</html>