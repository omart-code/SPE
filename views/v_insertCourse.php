<?php 
include_once '../includes/libraries.inc.php';
$title = 'ADD COURSE';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/CourseController.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/TaskController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../includes/navbar.inc.php';
?>


    
    <!-- LÓGICA DE AÑADIR UN NUEVO CURSO -->
      <?php
      if(isset($_POST['enviarCurs'])){
        Connection::openConnection(); 
        //inserto un curso en la tabla cursos
       
        CourseController::insertCourse(Connection::getConnection(), $_POST["nomCurs"], $_POST["dataIniciCurs"], $_POST["dataFiCurs"]);
        //obtengo grado seleccioando en el option
        $degree = DegreeController::getDegreeByName(Connection::getConnection(), $_POST["grauSelec"]);
        //obtengo su id
        $degreeId = $degree->getDegreeId();
        //obtengo id  del curso antes insertado
        $course = CourseController:: getCourseByNameAndDate(Connection::getConnection(), $_POST["nomCurs"], $_POST["dataIniciCurs"], $_POST["dataFiCurs"]);
        $courseId = $course ->getCourseId();
        //genero la concatenación para el nombre del curso_grado
        $degreeCourseName = $degree->getDegreeName(). ' / ' . $course->getCourseName();
        //inserto curso grado
        DegreeCourseController::insertDegreeCourse(Connection::getConnection(), $courseId, $degreeId, $degreeCourseName, 0);
        //Obtengo el curso grado acabado de crear
        $degreeCourse = DegreeCourseController::getDegreeCourseByCourseAndDegree(Connection::getConnection(), $courseId, $degreeId);
        //Para este curso grado, añado 9 tareas
        TaskController::insertTasksByDegreeCourse(Connection::getConnection(),  $degreeCourse->getDegreeCourseId());

        echo '<script>window.location.replace("'.COURSES.'")</script>';
         
      }
       ?>
        <div class="container-fluid" style="width:80%;">
        <br>
            <h1>Afegir un curs</h1>

            <br>
            <br>

            <ul class="nav nav-tabs ">
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" aria-current="page" href="<?php echo TEACHERS?>"><h6>Professorat</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo COORDINATORS?>"><h6>Coordinadors</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo DEPARTMENTS?>"><h6>Departaments</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  active" style="color: #28a745;" href="<?php echo COURSES?>"><h6>Nou Curs</h6></a>
                    </li>
                
             </ul>

            <div class="card text-center">
                <div class="card-body">
                   
                    <p class="card-text"><h5>Afegeix un nou curs a aquest grau</h5></p>
                    
                </div>
            </div>

            
            <br>
            <br>

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <?php Connection::openConnection(); 
            $degrees = DegreeController::getDegrees(Connection::getConnection());  ?>
            <div> <!-- Recoge los cursos de la bd, haz entity, model y controller y inserta en las options -->
            <label><b>Sel·lecciona Grau</b></label>
            <select name="grauSelec" class="form-control" aria-label=".form-select-lg example">
            <option selected>Sel·lecciona un grau</option>
            <?php foreach ($degrees as $key => $degree) { ?>
                <option value="<?php echo $degree->getDegreeName()?>"><?php echo $degree->getDegreeName() ?></option>
            <?php } ?>
            
            </select>
            </div>
            <br>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><b>Nom</b></label>
                <input type="text" class="form-control" name="nomCurs" placeholder="ex: 2020-2021">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"><b>Data d'inici</b></label>
                <input type="date" class="form-control" name="dataIniciCurs" placeholder="ex: 09/09/2020" ></input>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><b>Data de finalització</b></label>
                <input type="date" class="form-control" name="dataFiCurs" placeholder="ex: 09/07/2021">
            </div>
            
            <button type="submit" class="btn btn-success" name="enviarCurs">Afegeix</button>
            </form>
      
        </div>

        <div class="container-fluid" style="width:80%;">
        <button type="button" class=" btn btn-secondary" onclick="history.back(-1)"><i class="fas fa-arrow-left"></i> Torna Enrere</button>
        </div>
        
      
