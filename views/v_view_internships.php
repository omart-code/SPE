<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../includes/libraries.inc.php'; ?>
    <?php include '../controllers/InternshipController.inc.php'; ?>
    <?php include '../controllers/TaskController.inc.php'; ?>
    <?php include '../controllers/InternshipTaskController.inc.php'; ?>
</head>
<body>
    <?php include '../includes/navbar.inc.php'; ?>
    <div class="container">
    <h1>VISTA DE ESTADES DE PRÀCTIQUES</h1>
    <br>
    <div>
    <table id="internships" class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Nom</th>
                        <?php Connection::openConnection();
                             $tasks = TaskController::getTasksByDegreeCourse(Connection::getConnection(), 1); //SE DEBE PASAR CURSO GRADO POR SELECT DE LA PÁGINA
                             foreach ($tasks as $task) {
                        
                               
                                echo "<th>" .$task->getTaskName();"</th>";
                            
                            } 
                               
                             ?> 

                    
                        </tr>
                    </thead>
                    <tbody>
    
                    <?php
                    
                       
                        Connection::openConnection(); 
                        $infos = InternshipController::getInfoInternshipsByTeacher(Connection::getConnection(), $_SESSION['niu']);
                        foreach ($infos as $info) { ?>
                        
                            <tr>
                            <th scope='row'><a style="text-decoration:none;" href="./v_view-internship.php?niu=<?php echo $info['niu_estudiante']?>"> <?php echo $info['nombre'].' '.$info['apellido'] ?> </a></td>
                            <?php $tasksInternship = InternshipTaskController::getInternshipTasksByInternshipId(Connection::getConnection(), $info['id_estancia']);
                            foreach ($tasksInternship as $taskInternship){ ?>
                                <td><?php echo $taskInternship->getTaskDate(); ?></td>
                            <?php } ?>
                             
                            <?php echo "</tr>";
                           


                        }
              
                    ?>
        </tbody>
    </table>   

    </div>
 </div>

        


</body>

        <script>

        $(document).ready(function() {
            $('#internships').DataTable();
        } );
        </script>
</html>