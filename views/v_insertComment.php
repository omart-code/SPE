<?php 
include_once '../includes/libraries.inc.php';
$title = 'ADD COMMENT';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Redirection.inc.php';
include_once '../app/Connection.inc.php';
include_once '../controllers/CommentController.inc.php';
include_once '../includes/navbar.inc.php';
?>


    
      <?php
      $_SESSION['internshipId'] = $_GET['id'];
      $_SESSION['niuStudent'] = $_GET['niu'];
      if(isset($_POST['enviarComentari'])){
         
            Connection::openConnection(); 
            CommentController::insertComment(Connection::getConnection(),$_POST['textoComentario'], $_POST['tipoComentario'],$_SESSION['internshipId'], 'especial');
            echo '<script> window.location.replace("'.VIEWINTERNSHIP."?niu=".$_SESSION['niuStudent'].'")</script>';
          }
      
      
       ?>
        <div class="container h-100">
            <h1>VISTA DE AFEGIR UN COMENTARI</h1>

            <br>
            <br>

           

            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Nou Comentari</h5>
                    <p class="card-text">Afegeix un nou comentari a la estancia</p>
                    
                </div>
            </div>

            
            <br>
            <br>

            <form method="POST">
          
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tipus de comentari:</label>
                        <select name="tipoComentario" class="form-control" aria-label=".form-select-lg example">
                            <option selected>Públic</option>
                            <option>Privat</option>
                        </select>
                    </div>
                    <div class="form-group mt-5 mb-5">
                        <label for="message-text" class="col-form-label">Comentari:</label>
                        <textarea  id="summernote" class="form-control" name="textoComentario"></textarea>
                    </div> 
                    
                    
                        
            <button type="submit" class="btn btn-success" name="enviarComentari">Afegeix</button>
            </form>
        </div>
        
        <div class="container">
        <button type="button" class=" btn btn-secondary" onclick="history.back(-1)"><i class="fas fa-arrow-left"></i> Torna Enrere</button>
        </div>


<script>
$('#summernote').summernote({
        tabsize: 2,
        height: 200
      });
</script>
        
</div>
        
      