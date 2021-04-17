<?php

include_once __DIR__ . '/../app/Session.inc.php';
include_once __DIR__ . '/../app/config.inc.php';
?>
<div class="header">
    <div class="custom-navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><h1>SPE</h1></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                        <a class="nav-link" <?php  if(ControlSession::sessionStarted()){
                        if($_SESSION['id_tipo_usuario'] == '1'){ ?>
                            href="<?php echo TEACHER ?>"><h3>Inici</h3><span class="sr-only">(current)</span></a>
                        <?php } else if ($_SESSION['id_tipo_usuario'] == '3') { ?>
                            href=" <?php echo COORDINATOR ?>"><h3>Inici</h3><span class="sr-only">(current)</span></a>
                        <?php } else { ?>
                             href=" <?php echo SERVER ?>"><h3>Inici</h3><span class="sr-only">(current)</span></a>
                       <?php } ?>
                        <?php } ?>
                       
                    </li>
                    <?php
                    if(ControlSession::sessionStarted()){
                        if($_SESSION['id_tipo_usuario'] == '1' || $_SESSION['id_tipo_usuario'] == '3' || $_SESSION['id_tipo_usuario'] == '4'){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo INTERNSHIPS?>"><h3>Estades</h3></a>
                        </li>
                       <?php }?>
                       <?php 
                        if($_SESSION['id_tipo_usuario'] == '3' || $_SESSION['id_tipo_usuario'] == '4'){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo TEACHERS?>"><h3>Administració</h3></a>
                        </li>
                        <?php } ?>
                        <?php
                        if ($_SESSION['id_tipo_usuario'] == '2'){
                        ?>
                        
                        <?php }?>
                    <?php } ?>
                    <?php 
                    if(ControlSession::sessionStarted()){
                        ?>
                        <li class="nav-item">
                        <a class="nav-link" href="<?php echo LOGOUT ?>"><h3>Logout</h3></a>
                        </li>
                    <?php
                    }else{
                        ?>
                        <li class="nav-item">
                        <a class="nav-link" href="<?php echo LOGIN ?>"><h3>Login</h3></a>
                        </li>
                        <?php
                    }
                    ?>
                    
                  
                </ul>
            </div>
        </nav>
    </div>
</div>