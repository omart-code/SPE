<?php 
include_once '../includes/libraries.inc.php';
$title = 'ADD INTERNSHIP';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
include_once '../controllers/TeacherController.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../includes/navbar.inc.php';
?>
<!-- AL FINAL ESTA PAGINA NO SE USA, SE USA UN MODAL -->
       
        <div class="container">
            <h1>VISTA DE AFEGIR NOVA ESTADA</h1>

            <br>
            <br>

            <div class="card text-center">
                <div class="card-body">
                   
                    <p class="card-text"><h5>Afegeix una nova estada</h5></p>
                    
                </div>
            </div>

            
            <br>
            <br>
           

        
            <?php
            Connection::openConnection();
            $coordinator = CoordinatorController::getCoordinatorByNiu( Connection::getConnection() , $_SESSION['niu']);
            ?>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            
         
            <div> <!-- Recoge los cursos de la bd, haz entity, model y controller y inserta en las options -->
            <label><b>Sel·lecciona Grau i Curs:</b></label>
            <?php Connection::openConnection();
            $degreeCoursesByDegree = DegreeCourseController::getDegreeCoursesByDegree(Connection::getConnection(), $coordinator->getCoordinatorDegreeId()); 
           ?>
        
            <select name="grauCursSelec" class="form-control" aria-label=".form-select-lg example">
           <!--  ESTO YA ESTÁ BIEN, YA PILLAS EL ID CURSO GRADO DESDE EL POST -->
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
                <input type="text" class="form-control" name="nomDepartament" placeholder="ex: 1234567" pattern="[0-9]{7}" title="El niu ha de tenir 7 digits">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label"><b>Profesor:</b></label>
               <!--  SELECT CON TODOS LOS PROFESORES -->
               <select name="profesorSelec" class="form-control" aria-label=".form-select-lg example">
               <?php Connection::openConnection();
                $teachers = TeacherController::getTeachers(Connection::getConnection()) ?>
                    <option selected>Sel·lecciona un professor</option>
                    <?php foreach ($teachers as $teacher) { ?>
                    <option value="<?php echo $teacher->getTeacherNiu()?>"><?php echo $teacher->getTeacherName().' '. $teacher->getTeacherSurname()?></option>
                <?php }?>
               </select>
               <!-- REALMENTE INSERTARÁS EL NIU EN LA BD -->
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label"><b>Data d'inici:</b></label>
                <input type="date" class="form-control" id="fecha-inicio"  name="fechaInicio">
            </div>
            <div class="form-group">
            <label for="message-text" class="col-form-label"><b>Data de finalització:</b></label>
            <input class="form-control" type="date" id="fecha-final"  name="fechaFinal"></input>
            </div>
           <!--  <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label"><b>Empresa:</b></label>
                <input type="text" class="form-control" name="identificador" placeholder="ex: MAJESTY SL" ></input>
                <!-- HAY DUDAS, PERO SE DEBERIAN MOSTRAR LAS EMPRESAS YA REGISTRADAS Y INSERTAR SU ID
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label"><b>Tutor Empresa</b></label>
                <input type="text" class="form-control" name="identificador" placeholder="ex: Carles Vives" ></input>
                <!-- HAY DUDAS, PERO SE DEBERIAN MOSTRAR LOS NOMBRES DE LOS TUTOTES YA REGISTRADAS Y INSERTAR SU ID
            </div> -->
            <br>
            <br>
            <button type="submit" class="btn btn-success" name="enviarEstancia">Afegeix</button>
            </form>

         
        
        </div>

        <div class="container">
        <button type="button" class=" btn btn-secondary" onclick="history.back(-1)"><i class="fas fa-arrow-left"></i> Torna Enrere</button>
        </div>
        
       
      
