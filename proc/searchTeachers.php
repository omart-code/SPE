<?php include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/CourseController.inc.php';
include_once '../controllers/TeacherController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';

                             if($_POST['cursoGrado'] !== 'null'){?>
                            <table id="teachersTable" class="table  table-bordered  dt-responsive" style="width:100%">
                                    <thead>
                                    <tr>
                                     <th scope="col">Nom</th>
                                     <th scope="col">Departament</th>
                                     <th scope='col'>Curs/Grau</th>
                                     <th scope="col">Alumnes Assignats</th>
                                     <th scope="col">Màxim Alumnes</th>
          
                                     </tr>
                                     </thead>
                                <tbody>
                             <?php
                                    Connection::openConnection(); 
                                    $teachers = TeacherController::getTeachersInfo(Connection::getConnection(), $_POST['cursoGrado']); 
                                        if($teachers !=null){
                                        foreach ($teachers as $teacher) {
                                            $estudiantes_asignados = TeacherController::getNumStudents(Connection::getConnection(), $teacher['niu_profesor'], $_POST['cursoGrado']);
                                            $estudiantes_asignados = $estudiantes_asignados['estudiantes_asignados'];
                                            TeacherController::updateNumStudents(Connection::getConnection(), $teacher['niu_profesor'], $_POST['cursoGrado'],  $estudiantes_asignados);
                                        echo "<tr>";
                                        echo "<th scope='row'>".$teacher['nombre']. " " .$teacher['apellido']. "</td>";
                                        echo "<td>".$teacher['siglas']."</td>";
                                        echo "<td>".$teacher['curso_grado']."</td>";
                                        echo "<td>".$estudiantes_asignados."</td>";
                                        echo "<td>".$teacher['max_estudiantes']."</td>";
                                        
                                        echo "</tr>";
                                        }
                                    }
                    ?>
                                </tbody>
                            </table>   
                        
                        <?php }else{ 
                            echo "<b>No hi ha professors a mostrar</b><br><br><br><br>";
                         } ?>
                        <script>
                         $(document).ready(function() {
                            $('#teachersTable').DataTable({
                                        "language": {
                                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Catalan.json"
                                     }
                                    });
                                   
                                } );;
                        </script>