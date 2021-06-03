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
      $_SESSION['niuStudent'] = $_GET['niu'];   ?>
      
    
       <div class="container-fluid" style="width:80%;">
       <br>
            <h1>Afegir un comentari</h1>

            <br>
            <br>

           

            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Nou Comentari</h5>
                    <p class="card-text">Afegeix un nou comentari a la estada</p>
                    
                </div>
            </div>

            
            <br>
            <br>

            
                    <form action="../proc/insertComment.php" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label"><b>Tipus de comentari:</b></label>
                        <select name="tipoComentario" class="form-control" aria-label=".form-select-lg example" required>
                            <option selected>Públic</option>
                            <option>Privat</option>
                        </select>
                        <label for="recipient-name" class="col-form-label"><b>Categoria del comentari:</b></label>
                        <select name="categoriaComentario" class="form-control" aria-label=".form-select-lg example" required>
                            <option selected>Estudiant</option>
                            <option>Empresa</option>
                            <option>Coordinació</option>
                        </select>
                    </div>
                    <div class="form-group mt-3 mb-5">
                        <label for="message-text" class="col-form-label"><b>Comentari:</b></label>
                        <textarea  id="summernote"  name="textoComentario"></textarea>
                    </div>
                    <input name="internshipId" hidden value="<?php echo $_SESSION['internshipId']?>" >
                    <input name="niuStudent" hidden value="<?php echo $_SESSION['niuStudent']?>" >
                  
                    
                    
                        
            <button type="submit" class="btn btn-success" name="enviarComentari">Afegeix</button>
            <br>
        </div>
        </form>
        
        <div class="container-fluid" style="width:80%;">
        <br>
        <button type="button" class=" btn btn-secondary" onclick="goBack(<?php echo $_SESSION['niuStudent'] ?>)"><i class="fas fa-arrow-left"></i> Torna Enrere</button>
        </div>


<script>
function goBack(niuStudent){
    window.location.replace("http://localhost/spe/views/v_view-internship.php?niu="+niuStudent);
}
$('#summernote').summernote({
    toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
  ]
      })
</script>


