<?php 
include_once '../includes/libraries.inc.php';
$title = 'COORDINATOR';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/InternshipController.inc.php';
include_once '../controllers/TaskController.inc.php';
include_once '../controllers/InternshipTaskController.inc.php';
?>

<?php include_once '../includes/navbar.inc.php'; ?>
    
        
<div class="container">
    <h1>VISTA DE ESTADES DE PRÀCTIQUES</h1>
    </div>
    <div class="container ">
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
                        $infos = InternshipController::getInfoInternships(Connection::getConnection());
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


        


</body>

        <script>

        $(document).ready(function() {
            $('#internships').DataTable();
        } );
        </script>
</html>