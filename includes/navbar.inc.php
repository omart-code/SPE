<?php
include_once __DIR__ . '/../app/Session.inc.php';
include_once __DIR__ . '/../includes/libraries.inc.php';
include_once __DIR__ . '/../app/config.inc.php'; ?>
<div class="header">
<!-- FALLA EL COLLAPSE DEL TOGGLER -->
    <div class="custom-navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><h1>SPE</h1></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <?php  if(ControlSession::sessionStarted()):
                            if($_SESSION['id_tipo_usuario'] == '1' && $_SESSION['id_tipo_usuario2'] == '0'): ?>
                            <a class="nav-link"  href="http://localhost/spe/views/v_teacher.php?rol=teacher"><h3>Inici</h3><span class="sr-only">(current)</span></a>
                            <?php elseif($_SESSION['id_tipo_usuario'] == '1' &&  $_SESSION['id_tipo_usuario2'] == '3'  && $_GET['rol'] == 'teacher'):?>
                                <a class="nav-link"  href="http://localhost/spe/views/v_teacher.php?rol=teacher"><h3>Inici</h3><span class="sr-only">(current)</span></a>
                            <?php elseif($_SESSION['id_tipo_usuario'] == '1' &&  $_SESSION['id_tipo_usuario2'] == '3'  && $_GET['rol'] == 'coordinator'):?>
                                <a class="nav-link"  href="http://localhost/spe/views/v_coordinator.php?rol=coordinator"><h3>Inici</h3><span class="sr-only">(current)</span></a>
                            <?php elseif($_SESSION['id_tipo_usuario'] == '3' && $_SESSION['id_tipo_usuario2'] == '0'):?>
                                <a class="nav-link"  href="http://localhost/spe/views/v_coordinator.php?rol=coordinator"><h3>Inici</h3><span class="sr-only">(current)</span></a>
                                <?php elseif($_SESSION['id_tipo_usuario'] == '3' && $_SESSION['id_tipo_usuario2'] == '1' && $_GET['rol'] == 'teacher'):?>
                                <a class="nav-link"  href="http://localhost/spe/views/v_teacher.php?rol=teacher"><h3>Inici</h3><span class="sr-only">(current)</span></a>
                            <?php else:?>
                                <a class="nav-link" href="http://localhost/spe/views/v_student.php?rol=student"><h3>Inici</h3><span class="sr-only">(current)</span></a>
                            <?php endif;?>
                        <?php endif;?>
                        
                    </li>
                    <?php if(ControlSession::sessionStarted()):
                        if($_SESSION['id_tipo_usuario'] == '1' && $_SESSION['id_tipo_usuario2'] == '0' || $_SESSION['id_tipo_usuario'] == '1' && $_SESSION['id_tipo_usuario2'] == '3' && $_GET['rol'] == 'teacher' || $_SESSION['id_tipo_usuario'] == '3' && $_SESSION['id_tipo_usuario2'] == '1' && $_GET['rol'] == 'teacher'  ):?>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/spe/views/v_view_internships_teacher.php?rol=teacher"><h3>Estades</h3></a>
                        </li>
                       <?php endif;?>
                       <?php if($_SESSION['id_tipo_usuario'] == '3' && $_SESSION['id_tipo_usuario2'] == '0' || $_GET['rol'] == 'coordinator'):?>
                       <li class="nav-item">
                       <a class="nav-link" href="http://localhost/spe/views/v_teachers.php?rol=coordinator"><h3>Administraci??</h3></a>
                        </li>
                        <?php endif;?>
                        <li class="nav-item">
                        <a class="nav-link" href="http://localhost/spe/views/logout.php"><h3>Logout</h3></a>
                        </li>
                    <?php else: ?>
                    <li class="nav-item">
                    <a class="nav-link" href="http://localhost/spe/views/login.php"><h3>Login</h3></a>
                    </li>
                   <?php endif;?>        
                </ul>
            </div>
         </div>
        </nav>
    </div>
</div>

