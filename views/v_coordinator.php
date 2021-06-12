<?php 
include_once '../includes/libraries.inc.php';
$title = 'SPE';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/InternshipController.inc.php';
include_once '../controllers/TaskController.inc.php';
include_once '../controllers/TeacherController.inc.php';
include_once '../controllers/InternshipTaskController.inc.php';
include_once '../controllers/StudentController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../controllers/DegreeCourseTeacherController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
?>
<?php include_once '../includes/navbar.inc.php'; ?>
    
        
<div class="container-fluid" style="width:80%;">
<br>
<?php echo "<h4>Benvingut " . $_SESSION["nombre"]. "</h4>"?>
<br>
    <h1>Estades del curs</h1>
    <div class="text-right">
        <a  role="button" class="btn btn-success" data-toggle="modal" data-target="#modalEstancia" style="color:white;">Afegir nova estada </a>
    </div>
    <br>
    <br>
    <?php
    Connection::openConnection();
    $coordinator = CoordinatorController::getCoordinatorByNiu( Connection::getConnection() , $_SESSION['niu']);
    ?>

   
        
            <select id="cursosEstancias" class="selectpicker form-control" name="cursogradoEstancias" required="true">
            
                <?php 
            
                Connection::openConnection();
                $degreeCoursesByDegree = DegreeCourseController::getDegreeCoursesByDegree(Connection::getConnection(), $coordinator->getCoordinatorDegreeId());?>
                        <option value="null" selected>Sel·lecciona un curs i grau</option>
                    
                  <?php  foreach ($degreeCoursesByDegree as $degreeCourse) { ?>
                        <option value="<?php echo $degreeCourse->getDegreeCourseId()?>"><?php echo $degreeCourse->getDegreeCourseName()?></option>
                    <?php }?>
                
            </select>
            <br>
            <div class="text-right">
                 <button type="submit" niu="<?php echo $_SESSION['niu'];?>" class="btn btn-success" onClick="getInternshipsCoordinator()" id="cercaEstadesCoordinador" name="cercaEstadesCoordinador">Cerca Estades</button>
            </div>
            <br>

            <div id="estanciasCoordinador">
           <!--  Aqui s'inserta amb proc les estancias del curs grau -->
            </div>
       
        
        
</div>

    

<!-- MODAL INSERTAR ESTANCIA -->
<div id="insertarEstancia">
        <div class="modal fade" id="modalEstancia" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Afegir nova estada:</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <?php
                    Connection::openConnection();
                    $coordinator = CoordinatorController::getCoordinatorByNiu( Connection::getConnection() , $_SESSION['niu']);
                    ?>
                    
            
                    <form action="../proc/insertInternship.php" method="POST">
                    <div>
                        <label><b>Sel·lecciona Grau i Curs:</b></label>
                        <?php Connection::openConnection();
                        $degreeCoursesByDegree = DegreeCourseController::getDegreeCoursesByDegree(Connection::getConnection(), $coordinator->getCoordinatorDegreeId()); 
                         ?>
        
                        <select name="grauCursSelec" onChange="getTeachers()" class="form-control" aria-label=".form-select-lg example">
                       
                            <?php 
                    
                            Connection::openConnection();
                            $degreeCoursesByDegree = DegreeCourseController::getDegreeCoursesByDegree(Connection::getConnection(), $coordinator->getCoordinatorDegreeId()); ?>
                            <option selected>Sel·lecciona un grau i curs</option>
                                <?php foreach ($degreeCoursesByDegree as $degreeCourse) { ?>
                                <option value="<?php echo $degreeCourse->getDegreeCourseId()?>"><?php echo $degreeCourse->getDegreeCourseName()?></option>
                                <?php }?>
            
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label"><b>Niu Estudiant:</b></label>
                        <input type="text" class="form-control" name="niuEstudiant" placeholder="ex: 1234567" pattern="[0-9]{7}" title="El niu ha de tenir 7 digits">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label"><b>Nom Estudiant:</b></label>
                        <input type="text" class="form-control" name="nomEstudiant" placeholder="ex: Joan">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label"><b>Cognoms Estudiant:</b></label>
                        <input type="text" class="form-control" name="cognomEstudiant" placeholder="ex: Martínez Pérez">
                    </div>
                    <div id="teacherSelect" class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label"><b>Profesor:</b></label>
                       
                        <select  name="profesorSelec" class="form-control" aria-label=".form-select-lg example">
                            <?php Connection::openConnection();
                                $teachers = TeacherController::getTeachersInfo(Connection::getConnection(), $degreeCourse->getDegreeCourseId()) ?>
                                    <option selected>Sel·lecciona un professor</option>
                                    <?php foreach ($teachers as $teacher) { ?>
                                    <option value="<?php echo $teacher['niu_profesor']?>"><?php echo $teacher['nombre'].' '. $teacher['apellido']?></option>
                                <?php }?>
                        </select>
                      
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label"><b>Data d'inici:</b></label>
                        <input type="date" class="form-control" id="fecha-inicio"  name="fechaInicio">
                    </div>
                    <div class="form-group">
                    <label for="message-text" class="col-form-label"><b>Data de finalització:</b></label>
                    <input class="form-control" type="date" id="fecha-final"  name="fechaFinal"></input>
                    </div>
                   
                    <br>
                    <br>
                   
                    <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Tanca</button>
                                <button type="submit" id="enviarEstancia" class="btn btn-success" name="EnviarEstancia">Afegeix</button>
                               
                            
                    </div>
                    </form>
                   
                            
                        
                           
                       
                    </div>
                </div>
            </div>
        </div>
    </div>



        


</body>

<script src="../js/getInternshipsCoordinator.js"></script>
<script>
function getTeachers(){
    var cursoGrado = $('select[name=grauCursSelec] option').filter(':selected').val()
    console.log(cursoGrado);

    $.ajax({          
        	type: "POST",
        	url: "../proc/getDegreeCourseTeachers.php",
        	data:'cursoGrado='+cursoGrado,
        	success: async function(data){
           
                $("#teacherSelect").html(data);
           
          },
          error: function(err){
              console.log('error:'+err);
          }
	});  
}

</script>

</html>