<?php 
include_once '../includes/libraries.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../app/Connection.inc.php';
$title = 'TEACHER';
include_once '../includes/doc-declaration.inc.php'; ?>

<?php include_once '../includes/navbar.inc.php'; ?>

        
      
       <?php echo "Bienvenido " . $_SESSION["niu"]. " " . $_SESSION["id_tipo_usuario"] ?> 
       <?php
        $listaUsersModificados[] = UserController::getUsersModificados(Connection::getConnection());
       ?>
        <div class="main-container">
        <h1>VISTA DEL ESTUDIANT</h1>
        <h5>INFORMACIÓ DE LA TEVA ESTANCIA</h5>
        </div>
        
      
<?php include_once '../includes/footer.inc.php'; ?>
