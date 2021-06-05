<?php
include_once '../app/Connection.inc.php';
include_once '../controllers/CommentController.inc.php';


            $tipoComentario=$_POST['tipoComentario'];
            $categoriaComentario=$_POST['categoriaComentario'];
            $comentario = htmlentities($_POST['textoComentario'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $internshipId=$_POST['internshipId'];
            $niuStudent=$_POST['niuStudent'];



            Connection::openConnection(); 
            if($comentario != null){
                CommentController::insertComment(Connection::getConnection(),$comentario, $tipoComentario,$internshipId, $categoriaComentario);
            }
           
            echo '<script> window.location.replace("'.VIEWINTERNSHIP."&niu=".$niuStudent.'")</script>';

?>