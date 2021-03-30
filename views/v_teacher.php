<?php 
include_once '../includes/libraries.inc.php';
$title = 'TEACHER';
include_once '../includes/doc-declaration.inc.php'; ?>

<?php include_once '../includes/navbar.inc.php'; ?>
    
        
      <?php echo "Bienvenido " . $_SESSION["niu"]. " " . $_SESSION["id_tipo_usuario"] ?>
        <div class="main-container">
        <h1>VISTA DEL PROFESOR</h1>
        <h5>ESTADES PENDENTS DE REVISAR</h5>
        </div>
        
      
<?php include_once '../includes/footer.inc.php'; ?>

