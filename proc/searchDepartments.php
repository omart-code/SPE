
 <?php  

include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/CourseController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../controllers/TeacherController.inc.php';



        
                        if($_POST['cursoGrado'] !== 'null'){?>
                            <table id="departaments" class="table  table-bordered  dt-responsive" style="width:100%">
                                    <thead>
                                    <tr>
                                     <th scope="col">Nom</th>
                                     <th scope="col">Sigles</th>
                                     <th scope="col">Curs/Grau</th>
                                     <th scope="col">Alumnes Assignats</th>
                                     <th scope="col">Màxim Alumnes</th>
          
                                     </tr>
                                     </thead>
                                <tbody>
                     <?php
                                    Connection::openConnection(); 
                                    $depts = DepartmentController::getDepartmentsInfo(Connection::getConnection(), $_POST['cursoGrado']); 
                                        if($depts !=null){
                                            foreach ($depts as $dept) {
                                            
                                            
                                            echo "<tr>";
                                            echo "<th scope='row'>".$dept['nombre_departamento']."</td>";
                                            echo "<td>".$dept['siglas']."</td>";
                                            echo "<td>".$dept['curso_grado']."</td>";
                                            echo "<td>".$dept['estudiantes_asignados']."</td>";
                                            echo "<td>".$dept['max_estudiantes']."</td>";
                                            
                                            echo "</tr>";
                                        }
                                    }   
                    ?>
                                </tbody>
                            </table>   
                        
                        <?php }else{ 
                            echo "<b>No hi ha professors a mostrar</b><br><br><br><br>";
                         }
          ?>

<script>

$(document).ready(function() {
    $('#departaments').DataTable({
        "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Catalan.json"
     }
    });
   
} );
</script>